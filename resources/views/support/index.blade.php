@extends('layouts.app')
@section('content')

<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white flex items-center">
                <i class="ri-service-fill text-2xl mr-3 text-green-600"></i>
                Services Management
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Manage all your service offerings in one place</p>
            <div class="mt-3 h-1 w-32 bg-green-600 rounded-full"></div>
        </div>
        <a href="{{ route('support.create') }}"
            class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-6 py-3 rounded-xl transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center">
            <i class="ri-add-line mr-2 text-lg"></i>
            <span class="font-medium">Add New Service</span>
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="p-3 rounded-lg bg-green-100 dark:bg-green-900/30">
                    <i class="ri-service-line text-green-600 dark:text-green-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Services</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $supports->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="p-3 rounded-lg bg-blue-100 dark:bg-blue-900/30">
                    <i class="ri-file-text-line text-blue-600 dark:text-blue-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Active Services</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $supports->count() }}</p>
                </div>
            </div>
        </div>

    </div>
    <!-- Table Section -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                <i class="ri-database-2-line mr-2 text-emerald-500"></i>
                All Services
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 uppercase text-xs font-semibold tracking-wider">
                    <tr>
                        <th class="px-6 py-3 text-center">S.N</th>
                        <th class="px-6 py-3 text-center">Service</th>
                        <th class="px-6 py-3 text-center">Description</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($supports as $support)
                    <tr class="transition-all duration-300 hover:bg-gray-50 dark:hover:bg-gray-700/50 even:bg-gray-50 dark:even:bg-gray-900/40">
                        <td class="px-10 py-4 text-gray-800 dark:text-gray-200 text-center align-middle">
                            <div class="flex items-center justify-center">
                                <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
                                    <span class="font-medium">{{ $loop->iteration }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center font-semibold text-gray-900 dark:text-white">
                            {{ $support->service }}
                        </td>

                        <td class="px-6 py-4 text-center text-gray-700 dark:text-gray-300">
                            <div class="description-container">
                                <span class="description-preview">
                                    {{ Str::limit($support->description, 100) }}
                                    @if(strlen($support->description) > 100)
                                    <a href="javascript:void(0);" class="text-emerald-500 hover:text-emerald-600 dark:text-emerald-400 dark:hover:text-emerald-300 ml-1 read-more-toggle font-medium">Read More</a>
                                    @endif
                                </span>
                                <span class="description-full hidden">
                                    {{ $support->description }}
                                    <a href="javascript:void(0);" class="text-emerald-500 hover:text-emerald-600 dark:text-emerald-400 dark:hover:text-emerald-300 ml-1 read-more-toggle font-medium">Read Less</a>
                                </span>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-center font-medium">
                            <div class="flex justify-center space-x-3">
                                <a href="{{ route('support.edit', $support->id) }}"
                                    class="inline-flex items-center px-3 py-1.5 rounded-md text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 transition-all duration-300 shadow-sm">
                                    <i class="ri-edit-line mr-1"></i> Edit
                                </a>
                                <button class="inline-flex items-center px-3 py-1.5 rounded-md text-white bg-red-600 hover:bg-red-700 transition-all duration-300 shadow-sm delete-btn"
                                    data-id="{{ $support->id }}">
                                    <i class="ri-delete-bin-line mr-1"></i> Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-600 dark:text-gray-400">
                            No services available.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Empty State -->
    @if($supports->count() === 0)
    <div class="mt-12 bg-white dark:bg-gray-800 rounded-xl shadow-lg p-12 text-center">
        <div class="flex justify-center mb-6">
            <div class="w-24 h-24 rounded-full bg-green-100 dark:bg-green-900/20 flex items-center justify-center">
                <i class="ri-inbox-line text-4xl text-green-600 dark:text-green-400"></i>
            </div>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No services found</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Get started by adding your first service to showcase your offerings.</p>
        <a href="{{ route('support.create') }}"
            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300">
            <i class="ri-add-line mr-2"></i> Add Your First Service
        </a>
    </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden transition-opacity duration-300 ease-in-out">
    <div id="modalContent"
        class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md mx-4 transform transition-all duration-300 scale-95 opacity-0">
        <div class="p-6">
            <!-- Icon -->
            <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 dark:bg-red-900/30 rounded-full mb-4">
                <i class="ri-error-warning-line text-red-600 dark:text-red-400 text-3xl"></i>
            </div>

            <!-- Title -->
            <h3 class="text-xl font-bold text-center text-gray-900 dark:text-white mb-2">
                Delete Service
            </h3>

            <!-- Message -->
            <p class="text-gray-600 dark:text-gray-400 text-center mb-6">
                Are you sure you want to delete this service? This action cannot be undone.
            </p>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <form id="deleteForm" method="POST" class="w-full sm:w-1/2">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full py-3 px-4 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Delete
                    </button>
                </form>

                <button id="cancelDelete"
                    class="w-full sm:w-1/2 py-3 px-4 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white font-semibold rounded-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle description visibility
        document.querySelectorAll('.read-more-toggle').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const container = this.closest('.description-container');
                const preview = container.querySelector('.description-preview');
                const full = container.querySelector('.description-full');

                preview.classList.toggle('hidden');
                full.classList.toggle('hidden');
            });
        });

        // Delete functionality
        const deleteModal = document.getElementById('deleteModal');
        const modalContent = document.getElementById('modalContent');
        const deleteForm = document.getElementById('deleteForm');
        const cancelDelete = document.getElementById('cancelDelete');
        let currentId = null;

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                currentId = this.getAttribute('data-id');
                deleteForm.action = `/support/${currentId}`;

                // Show modal with animation
                deleteModal.classList.remove('hidden');
                setTimeout(() => {
                    deleteModal.classList.remove('opacity-0');
                    deleteModal.classList.add('opacity-100');
                    modalContent.classList.remove('scale-95', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }, 10);
            });
        });

        function closeModal() {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            deleteModal.classList.remove('opacity-100');
            deleteModal.classList.add('opacity-0');

            setTimeout(() => {
                deleteModal.classList.add('hidden');
                currentId = null;
            }, 300);
        }

        cancelDelete.addEventListener('click', closeModal);

        // Close modal when clicking outside
        deleteModal.addEventListener('click', function(event) {
            if (event.target === deleteModal) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !deleteModal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>
@endsection