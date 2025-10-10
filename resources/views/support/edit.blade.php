@extends('layouts.app')
@section('content')

<div class="container mx-auto px-4 py-8 max-w-3xl">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center">
            <i class="ri-edit-2-line mr-3 text-green-600"></i>
            Edit Service
        </h1>
        <div class="mt-2 h-1 w-24 bg-green-600 rounded"></div>
        <p class="mt-3 text-gray-600 dark:text-gray-400">Update the service information below</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
        <div class="p-6">
            <form action="{{ route('support.update', $support->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Service Name Field -->
                <div class="mb-6">
                    <label for="service" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Service Name <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ri-service-line text-gray-400"></i>
                        </div>
                        <input type="text" 
                               name="service" 
                               id="service" 
                               value="{{ old('service', $support->service) }}"
                               placeholder="Enter service name"
                               class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                    @error('service')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>
                
                <!-- Service Description Field -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Service Description <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                            <i class="ri-file-text-line text-gray-400 mt-1"></i>
                        </div>
                        <textarea name="description" 
                                  id="description" 
                                  rows="5"
                                  placeholder="Enter service description"
                                  class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">{{ old('description', $support->description) }}</textarea>
                    </div>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>
                
                <!-- Form Actions -->
                <div class="flex justify-between pt-4">
                    <a href="{{ route('support.index') }}" 
                       class="inline-flex items-center px-5 py-3 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-300">
                        <i class="ri-arrow-go-back-line mr-2"></i>
                        Cancel
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-300">
                        <i class="ri-save-line mr-2"></i>
                        Update Service
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
                <h3 class="text-sm font-medium text-green-800 dark:text-green-300">Editing Tips</h3>
                <div class="mt-2 text-sm text-green-700 dark:text-green-400">
                    <p>Make sure to update all necessary information before saving. Changes will be reflected immediately on the services page.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript to dynamically add/remove time inputs --}}
<script>
    document.getElementById('addTimeSlotBtn').addEventListener('click', function() {
        const wrapper = document.getElementById('timeSlotsWrapper');
        const newField = document.createElement('div');
        newField.classList.add('flex', 'items-center', 'space-x-3', 'mb-2');
        newField.innerHTML = `
            <input type="time" name="available_time_slots[]" class="rounded-lg border p-2 w-40" required>
            <button type="button" class="removeTimeSlotBtn bg-red-600 text-white px-3 py-1 rounded-lg">Remove</button>
        `;
        wrapper.insertBefore(newField, this); // insert before the Add button
    });

    document.getElementById('timeSlotsWrapper').addEventListener('click', function(e) {
        if (e.target.classList.contains('removeTimeSlotBtn')) {
            e.target.parentElement.remove();
        }
    });
</script>
@endsection