@extends('layouts.app')
@section('content')

<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white flex items-center">
                <i class="ri-file-list-3-line text-2xl mr-3 text-green-600"></i>
                Blog Management
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Manage all your blog posts in one place</p>
            <div class="mt-3 h-1 w-32 bg-green-600 rounded-full"></div>
        </div>
        <a href="{{ route('blog.create') }}"
            class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-6 py-3 rounded-xl transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center">
            <i class="ri-add-line mr-2 text-lg"></i>
            <span class="font-medium">Add New Blog Post</span>
        </a>
    </div>

    <!-- Table Section -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                <i class="ri-database-2-line mr-2 text-emerald-500"></i>
                All Blog Posts
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-center">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 uppercase text-xs font-semibold tracking-wider">
                    <tr>
                        <th class="px-6 py-3">S.N</th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Image</th>
                        <th class="px-6 py-3">Video</th>
                        <th class="px-6 py-3">Author</th>
                        <th class="px-6 py-3">Summary</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($blogs as $blog)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all duration-300">
                        <!-- S.N -->
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center">
                                <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium">
                                    {{ $loop->iteration }}
                                </div>
                            </div>
                        </td>

                        <!-- Title -->
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $blog->title }}
                        </td>

                        <!-- Image -->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                @if($blog->photopath)
                                    <img src="{{ asset('images/blogs/' . $blog->photopath) }}"
                                        alt="Blog Photo"
                                        class="w-16 h-16 rounded-full object-cover border border-gray-300 dark:border-gray-600 shadow-sm hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-16 h-16 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-400 dark:text-gray-500">
                                        <i class="ri-image-line text-xl"></i>
                                    </div>
                                @endif
                            </div>
                        </td>

                        <!-- Video -->
                        <td class="px-6 py-4">
                            @if($blog->video_url)
                                <a href="{{ $blog->video_url }}" target="_blank" class="text-emerald-600 dark:text-emerald-400 hover:underline">View Video</a>
                            @else 
                                <span class="text-gray-400 dark:text-gray-500">No Video</span>
                            @endif
                        </td>

                        <!-- Author -->
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                            {{ $blog->author ?? 'Admin' }}
                        </td>

                        <!-- Summary -->
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                            {{ Str::limit($blog->summary, 100) }}
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-3">
                                <a href="{{ route('blog.edit', $blog->id) }}"
                                    class="inline-flex items-center px-3 py-1.5 rounded-md text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 transition-all duration-300 shadow-sm">
                                    <i class="ri-edit-line mr-1"></i> Edit
                                </a>
                                <button type="button" 
                                    data-id="{{ $blog->id }}" 
                                    class="delete-btn inline-flex items-center px-3 py-1.5 rounded-md text-white bg-red-600 hover:bg-red-700 transition-all duration-300 shadow-sm">
                                    <i class="ri-delete-bin-line mr-1"></i> Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-600 dark:text-gray-400">
                            No blog posts available.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div id="modalContent"
        class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md mx-4 p-6">
        <div class="flex flex-col items-center text-center">
            <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 dark:bg-red-900/30 rounded-full mb-4">
                <i class="ri-error-warning-line text-red-600 dark:text-red-400 text-3xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Delete Blog</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                Are you sure you want to delete this blog? This action cannot be undone.
            </p>
            <div class="flex gap-4 w-full">
                <form id="deleteForm" method="POST" class="w-1/2">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full py-3 px-4 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all duration-300 focus:outline-none">
                        Delete
                    </button>
                </form>
                <button id="cancelDelete"
                    class="w-1/2 py-3 px-4 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white font-semibold rounded-lg transition-all duration-300 focus:outline-none">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteModal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('modalContent');
    const deleteForm = document.getElementById('deleteForm');
    const cancelDelete = document.getElementById('cancelDelete');

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const blogId = this.getAttribute('data-id');
            deleteForm.action = `/blog/${blogId}`;
            deleteModal.classList.remove('hidden');
        });
    });

    cancelDelete.addEventListener('click', function() {
        deleteModal.classList.add('hidden');
        deleteForm.action = '';
    });

    // Close modal when clicking outside content
    deleteModal.addEventListener('click', function(event) {
        if(event.target === deleteModal) {
            deleteModal.classList.add('hidden');
            deleteForm.action = '';
        }
    });

    // Close modal on Escape
    document.addEventListener('keydown', function(event) {
        if(event.key === 'Escape') {
            deleteModal.classList.add('hidden');
            deleteForm.action = '';
        }
    });
});
</script>

@endsection
