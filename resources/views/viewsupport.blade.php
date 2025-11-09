@extends('layouts.master')
@section('content')

<!-- 🌱 CleanNepal - User Services Page -->
<div class="min-h-screen bg-gradient-to-b from-green-50 to-white py-12 px-6 md:px-16">
    <div class="max-w-7xl mx-auto">

        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-green-700 mb-3">
                Our Environmental Services
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Explore our sustainable solutions designed to make Nepal cleaner and greener.  
                Request any service that fits your need and our team will reach out to assist you.
            </p>
            <div class="mt-4 w-24 h-1 bg-green-600 mx-auto rounded-full"></div>
        </div>

        <!-- Services Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($supports as $support)
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-green-100 hover:border-green-300">
                
                <!-- Image Section -->
                @if($support->image)
                <img src="{{ asset('uploads/supports/'.$support->image) }}" alt="{{ $support->service }}"
                    class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                <img src="https://img.freepik.com/free-vector/eco-cleaning-concept-illustration_1284-17474.jpg"
                    alt="Default Service Image"
                    class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-300">
                @endif

                <!-- Card Content -->
                <div class="p-6 flex flex-col justify-between h-[260px]">
                    <div>
                        <h3 class="text-xl font-semibold text-green-700 mb-2">{{ $support->service }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ Str::limit($support->description, 120) }}
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 flex items-center justify-between">
                        <a href="{{ route('viewsupportdetails', $support->id) }}"
                            class="text-green-600 font-medium hover:text-green-700 transition">
                            View Details →
                        </a>
                        <a href="{{ route('pickup_request.create', $support->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg shadow-md transition-all duration-300">
                            <i class="ri-hand-heart-line mr-1 text-base"></i> Request
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 bg-white rounded-xl shadow-md p-12 text-center">
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center">
                        <i class="ri-emotion-sad-line text-4xl text-green-600"></i>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">No Services Found</h3>
                <p class="text-gray-600 mb-6">Currently, there are no active services available. Please check back soon!</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
