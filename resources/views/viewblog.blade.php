@extends('layouts.master')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg mb-6">
    <h2 class="text-3xl font-extrabold text-green-700 mb-4 text-center">Explore Our Latest Blog Articles</h2>
    <p class="text-lg text-gray-600 mb-6 text-center">
        Stay informed and inspired through our collection of articles and updates related to environmental awareness, 
        waste management, and sustainable living. 🌱
    </p>
</div>

<div class="container mx-auto my-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($blogs as $blog)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                
                {{-- Blog Image --}}
                @if($blog->photopath)
                    <img src="{{ asset('images/blogs/' . $blog->photopath) }}" 
                        alt="{{ $blog->title }}" 
                        class="w-full h-56 object-cover hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-56 bg-gray-100 flex items-center justify-center text-gray-400">
                        <i class="ri-image-line text-3xl"></i>
                    </div>
                @endif

                {{-- Blog Content --}}
                <div class="p-5">
                    <h3 class="font-bold text-xl text-green-800 mb-2">{{ $blog->title }}</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        {{ Str::limit($blog->summary ?? $blog->description, 120) }}
                    </p>

                    {{-- Optional Video --}}
                    @if($blog->video_url)
                        <div class="rounded-lg overflow-hidden mb-4">
                            <iframe width="100%" height="180" 
                                    src="{{ $blog->video_url }}" 
                                    frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    @endif

                    <div class="flex justify-between items-center">
                        <a href="" 
                            class="text-green-700 font-semibold hover:text-green-900 transition">
                            Read More →
                        </a>
                        <span class="text-sm text-gray-400">
                            {{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500 col-span-full">No blogs available yet. Check back soon!</p>
        @endforelse
    </div>
</div>
@endsection
