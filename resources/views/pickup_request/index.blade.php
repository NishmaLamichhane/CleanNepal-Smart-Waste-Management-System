
<!-- resources/views/pickup_requests/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Pickup Requests</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Requests Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Id</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Contact</th>
                    <th class="px-4 py-2 text-left">Address</th>
                    <th class="px-4 py-2 text-left">Waste Type</th>
                    <th class="px-4 py-2 text-left">Quantity</th>
                    <th class="px-4 py-2 text-left">Pickup Time</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Collector</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($requests as $request)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $request->id }}</td>
                        <td class="px-4 py-2">{{ $request->name }}</td>
                        <td class="px-4 py-2">{{ $request->contact }}</td>
                        <td class="px-4 py-2">{{ $request->address }}</td>
                        <td class="px-4 py-2">{{ $request->waste_type }}</td>
                        <td class="px-4 py-2">{{ $request->quantity }}</td>
                        <td class="px-4 py-2">{{ $request->pickup_time }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded text-xs
                                @if($request->status === 'pending') bg-yellow-100 text-yellow-700
                                @elseif($request->status === 'completed') bg-green-100 text-green-700
                                @elseif($request->status === 'cancelled') bg-red-100 text-red-700
                                @else bg-blue-100 text-blue-700
                                @endif">
                                {{ ucfirst($request->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            {{ $request->collector ? $request->collector->name : 'Not Assigned' }}
                        </td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <!-- Assign Collector Form -->
                            <form action="" method="POST" class="inline-block">
                                @csrf
                                <select name="collector_id" class="border rounded px-2 py-1 text-sm">
                                    <option value="">-- Select --</option>
                                    @foreach(\App\Models\User::where('role', 'collector')->get() as $collector)
                                        <option value="{{ $collector->id }}" {{ $request->collector_id == $collector->id ? 'selected' : '' }}>
                                            {{ $collector->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded text-sm">
                                    Assign
                                </button>
                            </form>

                            <!-- Update Status Form -->
                            <form action="" method="POST" class="inline-block">
                                @csrf
                                <select name="status" class="border rounded px-2 py-1 text-sm">
                                    <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $request->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="assigned" {{ $request->status == 'assigned' ? 'selected' : '' }}>Assigned</option>
                                    <option value="in_progress" {{ $request->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $request->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
                                    Update
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="px-4 py-4 text-center text-gray-500">No pickup requests found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
