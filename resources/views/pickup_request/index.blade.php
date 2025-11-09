@extends('layouts.master')
@section('content')

<div class="min-h-screen bg-gradient-to-br from-emerald-50 to-cyan-100 py-12 px-4 sm:px-6">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 rounded-t-2xl p-8 shadow-xl mb-0">
            <div class="flex items-center justify-between flex-wrap">
                <div class="flex items-center space-x-4">
                    <div class="bg-white/20 p-3 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white">Pickup Requests</h1>
                        <p class="text-emerald-100 mt-1">Manage all your waste collection requests in one place</p>
                    </div>
                </div>
                <a href="{{ route('pickup_request.create') }}" 
                   class="mt-4 sm:mt-0 inline-flex items-center bg-white text-emerald-600 font-semibold px-5 py-2 rounded-lg shadow hover:bg-emerald-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New Request
                </a>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-b-2xl shadow-xl overflow-x-auto -mt-1">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-t-lg border-b border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-emerald-100 text-emerald-800 uppercase text-sm font-semibold">
                    <tr>
                        <th class="py-3 px-4 text-left border-b">Name</th>
                        <th class="py-3 px-4 text-left border-b">Contact</th>
                        <th class="py-3 px-4 text-left border-b">Address</th>
                        <th class="py-3 px-4 text-left border-b">Waste Type</th>
                        <th class="py-3 px-4 text-left border-b">Quantity (kg)</th>
                        <th class="py-3 px-4 text-left border-b">Pickup Time</th>
                        <th class="py-3 px-4 text-left border-b">Status</th>
                        <th class="py-3 px-4 text-center border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pickupRequests as $request)
                        <tr class="hover:bg-emerald-50 transition duration-200">
                            <td class="py-3 px-4 border-b">{{ $request->name }}</td>
                            <td class="py-3 px-4 border-b">{{ $request->contact }}</td>
                            <td class="py-3 px-4 border-b">{{ $request->address }}</td>
                            <td class="py-3 px-4 border-b">{{ $request->waste_type }}</td>
                            <td class="py-3 px-4 border-b">{{ $request->quantity }}</td>
                            <td class="py-3 px-4 border-b">{{ \Carbon\Carbon::parse($request->pickup_time)->format('d M Y, h:i A') }}</td>
                            <td class="py-3 px-4 border-b">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                    @if($request->status == 'Pending') bg-yellow-100 text-yellow-700 
                                    @elseif($request->status == 'Completed') bg-green-100 text-green-700 
                                    @else bg-red-100 text-red-700 @endif">
                                    {{ $request->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4 border-b text-center space-x-2">
                                @if($request->status == 'Pending')
                                    <a href="{{ route('pickup_request.edit', $request->id) }}" 
                                       class="text-emerald-600 hover:text-emerald-800 font-medium">Edit</a>
                                    <button onclick="showCancelPopup('{{ $request->id }}')" 
                                            class="text-red-600 hover:text-red-800 font-medium">Cancel</button>
                                @else
                                    <span class="text-gray-500 text-sm">No actions</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-6 text-gray-500">No pickup requests found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Cancel Confirmation Modal -->
<div id="cancelPopup" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <form id="cancelForm" method="POST" class="bg-white p-8 rounded-xl shadow-lg text-center">
        @csrf
        @method('DELETE')
        <h3 class="text-lg font-semibold text-gray-800 mb-6">Cancel this pickup request?</h3>
        <div class="flex justify-center gap-4">
            <button type="submit" 
                    class="bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2 rounded-lg transition">
                Yes, Cancel
            </button>
            <button type="button" onclick="hideCancelPopup()" 
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-5 py-2 rounded-lg transition">
                No, Go Back
            </button>
        </div>
    </form>
</div>

<script>
    function showCancelPopup(id) {
        document.getElementById('cancelPopup').classList.remove('hidden');
        document.getElementById('cancelPopup').classList.add('flex');
        document.getElementById('cancelForm').action = "/pickup-request/" + id;
    }

    function hideCancelPopup() {
        document.getElementById('cancelPopup').classList.add('hidden');
        document.getElementById('cancelPopup').classList.remove('flex');
    }
</script>
@endsection
