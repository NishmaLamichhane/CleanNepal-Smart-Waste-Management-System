<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PickupRequest;
use Illuminate\Support\Facades\Auth;

class PickupRequestController extends Controller
{
    /**
     * Display all pickup requests for the logged-in user
     */
    public function index()
    {
        // Show only the requests of the logged-in user
        $pickupRequests = PickupRequest::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pickup_request.index', compact('pickupRequests'));
    }

    /**
     * Show the pickup request form
     */
    public function create()
    {
        return view('pickup_request.create');
    }

    /**
     * Handle form submission to store a new pickup request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'waste_type' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'pickup_time' => 'required|date|after:now',
        ]);

        // Add user_id automatically (so each request is linked to the logged-in user)
        $validated['user_id'] = Auth::id();
        $validated['status'] = 'Pending'; // default status

        PickupRequest::create($validated);

        return redirect()
            ->route('pickup_request.index')
            ->with('success', '✅ Your waste pickup request has been submitted successfully!');
    }

    /**
     * Optional - Edit existing request (if status is still pending)
     */
    public function edit($id)
    {
        $request = PickupRequest::findOrFail($id);

        // Prevent others from editing
        if ($request->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        return view('pickup_request.edit', compact('request'));
    }

    /**
     * Optional - Update a pending request
     */
    public function update(Request $request, $id)
    {
        $pickup = PickupRequest::findOrFail($id);

        if ($pickup->user_id !== Auth::id() || $pickup->status !== 'Pending') {
            abort(403, 'You cannot modify this request.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'waste_type' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'pickup_time' => 'required|date|after:now',
        ]);

        $pickup->update($validated);

        return redirect()
            ->route('pickup_request.index')
            ->with('success', '♻️ Pickup request updated successfully!');
    }

    /**
     * Cancel a request
     */
    public function destroy($id)
    {
        $pickup = PickupRequest::findOrFail($id);

        if ($pickup->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $pickup->delete();

        return redirect()
            ->route('pickup_request.index')
            ->with('success', '❌ Pickup request cancelled successfully.');
    }
}
