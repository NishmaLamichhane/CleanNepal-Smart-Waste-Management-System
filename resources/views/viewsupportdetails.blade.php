@extends('layouts.master')
@section('content')

<!-- 🌿 CleanNepal - Service Details -->
<div class="min-h-screen bg-gradient-to-b from-green-50 to-white py-12 px-6 md:px-16">
    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-green-100">

        <!-- Image -->
        @if($support->image)
        <img src="{{ asset('uploads/supports/'.$support->image) }}" alt="{{ $support->service }}" 
             class="w-full h-80 object-cover">
        @else
        <img src="https://img.freepik.com/free-vector/eco-cleaning-concept-illustration_1284-17474.jpg" 
             alt="Default Image" class="w-full h-80 object-cover">
        @endif

        <!-- Content -->
        <div class="p-8">
            <h1 class="text-3xl font-bold text-green-700 mb-4">{{ $support->service }}</h1>
            <p class="text-gray-700 leading-relaxed mb-8">
                {{ $support->description }}
            </p>

            <div class="flex justify-end">
                <a href="{{ route('pickup_request.create', $support->id) }}"
                   class="inline-flex items-center px-5 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition">
                    <i class="ri-hand-heart-line mr-2 text-lg"></i> Request This Service
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
