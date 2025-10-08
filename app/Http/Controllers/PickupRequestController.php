<?php

namespace App\Http\Controllers;

use App\Models\PickupRequest;
use Illuminate\Http\Request;

class PickupRequestController extends Controller
{

    public function services()
    {
        return view('pickup_request.services');
    }

    public function create()
    {
        return view('pickup_request.create');
    }

    public function store(Request $request)
    {
        // Validate and store the pickup request
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'waste_type' => 'required|string|max:100',
            'quantity' => 'required|integer|min:1',
            'pickup_time' => 'required|date',
        ]);
        // Store logic here...
        PickupRequest::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
            'waste_type' => $request->waste_type,
            'quantity' => $request->quantity,
            'pickup_time' => $request->pickup_time,
            'status' => 'pending',
        ]);

        return redirect()->route('pickup_requests.create')->with('success', 'Pickup request created successfully.');
    }
    public function index()
    {
        $requests = PickupRequest::latest()->get(); // fetch all pickup requests
        return view('pickup_request.index', compact('requests'));
    }

    //Admin : assign collector to request
    public function assignCollector(Request $request, PickupRequest $pickupRequest)
    {
        $request->validate([
            'collector_id' => 'required|exists:users,id',
        ]);

        $pickupRequest->update([
            'collector_id' => $request->collector_id,
            'status'       => 'assigned',
        ]);

        return back()->with('success', 'Collector assigned successfully.');
    }

    // Admin/Collector can update status
    public function updateStatus(Request $request, PickupRequest $pickupRequest)
    {
        $request->validate([
            'status' => 'required|string|in:pending,approved,assigned,in_progress,completed,cancelled',
        ]);

        $pickupRequest->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Pickup request status updated.');
    }
}
