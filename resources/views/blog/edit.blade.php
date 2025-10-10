@extends('layouts.app')
@section('content')

<div class="container mx-auto px-4 py-8 max-w-3xl">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center">
            <i class="ri-edit-2-line mr-3 text-green-600"></i>
            Edit Blog
        </h1>
        <div class="mt-2 h-1 w-24 bg-green-600 rounded"></div>
        <p class="mt-3 text-gray-600 dark:text-gray-400">
            Update your blog post to share new insights, updates, or tips about waste management.
        </p>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
        <div class="p-6">
            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Blog Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Blog Title <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ri-file-text-line text-gray-400"></i>
                        </div>
                        <input type="text"
                            name="title"
                            id="title"
                            value="{{ old('title', $blog->title) }}"
                            placeholder="Enter blog title"
                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                    @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                        <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Blog Content -->
                <div>
                    <label for="summary" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Blog Content <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                            <i class="ri-file-list-3-line text-gray-400 mt-1"></i>
                        </div>
                        <textarea name="summary"
                            id="summary"
                            rows="6"
                            placeholder="Write your blog content here..."
                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">{{ old('summary', $blog->summary) }}</textarea>
                    </div>
                    @error('summary')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                        <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Optional Image Upload -->
                <div>
                    <label for="photopath" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Blog Image (optional)
                    </label>
                    <input type="file"
                        name="photopath"
                        id="photopath"
                        accept="image/*"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:outline-none"
                        onchange="previewImage(event)">
                    @error('photopath')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                        <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                    </p>
                    @enderror

                    <!-- Existing Image -->
                    @if($blog->photopath)
                    <div class="mt-4 flex justify-center">
                        <img src="{{ asset('images/blogs/' . $blog->photopath) }}"
                            alt="Existing Blog Image"
                            class="w-32 h-32 rounded-full object-cover border-4 border-green-500 shadow-md"
                            id="existingImage">
                    </div>
                    @endif

                    <!-- New Image Preview -->
                    <div class="mt-4 flex justify-center">
                        <img id="imagePreview"
                            class="hidden w-32 h-32 rounded-full object-cover shadow-md border border-gray-300"
                            alt="Image Preview">
                    </div>
                </div>

                <!-- Optional Video URL -->
                <div>
                    <label for="video_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        YouTube Video URL (optional)
                    </label>
                    <input type="url"
                        name="video_url"
                        id="video_url"
                        value="{{ old('video_url', $blog->video_url) }}"
                        placeholder="https://www.youtube.com/watch?v=example"
                        class="block w-full pl-3 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    @error('video_url')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                        <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex justify-between pt-4">
                    <a href="{{ route('blog.index') }}"
                        class="inline-flex items-center px-5 py-3 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-300">
                        <i class="ri-arrow-go-back-line mr-2"></i>
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-300">
                        <i class="ri-save-line mr-2"></i>
                        Update Blog
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Additional Info Card -->
    <div class="mt-6 bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-100 dark:border-green-800/30">
        <div class="flex">
            <div class="flex-shrink-0">
                <i class="ri-information-line text-green-600 dark:text-green-400 text-xl"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-green-800 dark:text-green-300">Blog Information</h3>
                <div class="mt-2 text-sm text-green-700 dark:text-green-400">
                    <p>Update your post to raise awareness about waste management, recycling, or eco-friendly habits. Add an image or video if available for better engagement.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const existingImage = document.getElementById('existingImage');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('hidden');
                if (existingImage) existingImage.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '';
            imagePreview.classList.add('hidden');
            if (existingImage) existingImage.classList.remove('hidden');
        }
    }
</script>

@endsection
