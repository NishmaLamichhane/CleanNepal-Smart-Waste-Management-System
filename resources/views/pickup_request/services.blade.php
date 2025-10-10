@extends('layouts.master')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 to-cyan-100 py-12 px-4 sm:px-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-emerald-900 mb-4">Our Environmental Services</h1>
            <p class="text-xl text-emerald-700 max-w-3xl mx-auto">CleanNepal offers comprehensive waste management solutions to help create a cleaner, greener future for our communities.</p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Waste Collection Service -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-6">
                    <div class="bg-white/20 p-4 rounded-xl inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mt-4">Waste Collection</h3>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Scheduled waste collection services for residential and commercial clients. Our eco-friendly fleet ensures timely and responsible waste removal.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Regular scheduled pickups</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">On-demand collection options</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Eco-friendly transportation</span>
                        </li>
                    </ul>
                    <a href="{{ route('pickup_requests.create') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition">
                        Request Service
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Recycling Service -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-6">
                    <div class="bg-white/20 p-4 rounded-xl inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mt-4">Recycling Services</h3>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Comprehensive recycling solutions to transform waste into valuable resources. We handle various recyclable materials with state-of-the-art processing facilities.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Paper, plastic, and metal recycling</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Glass and textile recycling</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Recycling bins and containers</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Hazardous Waste Disposal -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-6">
                    <div class="bg-white/20 p-4 rounded-xl inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mt-4">Hazardous Waste</h3>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Safe and compliant disposal of hazardous materials. Our certified team follows strict environmental guidelines to handle dangerous waste responsibly.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Chemical and industrial waste</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Medical and biohazard disposal</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Regulatory compliance assistance</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- E-waste Recycling -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-6">
                    <div class="bg-white/20 p-4 rounded-xl inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mt-4">E-waste Recycling</h3>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Responsible recycling of electronic waste to prevent toxic materials from harming our environment. We recover valuable components for reuse.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Computer and mobile recycling</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Battery and appliance disposal</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Data destruction services</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Composting Services -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-6">
                    <div class="bg-white/20 p-4 rounded-xl inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mt-4">Composting Services</h3>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Transform organic waste into nutrient-rich compost for agriculture and gardening. Our composting solutions help reduce landfill waste naturally.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Food waste collection</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Yard waste processing</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Compost sales and distribution</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Educational Programs -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-6">
                    <div class="bg-white/20 p-4 rounded-xl inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mt-4">Educational Programs</h3>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Community outreach and education initiatives to promote environmental awareness and sustainable waste management practices.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">School and community workshops</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Corporate sustainability training</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Online resources and guides</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl p-8 md:p-12 text-center text-white shadow-xl mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Make a Difference?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Join thousands of Nepalese who are already contributing to a cleaner environment through our sustainable waste management solutions.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('pickup_requests.create') }}" class="px-8 py-4 bg-white text-emerald-700 font-bold rounded-lg shadow-md hover:bg-gray-100 transition transform hover:-translate-y-1">
                    Request Service
                </a>
                <a href="#" class="px-8 py-4 bg-emerald-800 text-white font-bold rounded-lg shadow-md hover:bg-emerald-900 transition transform hover:-translate-y-1">
                    Become a Volunteer
                </a>
            </div>
        </div>

        <!-- Testimonials Section -->
        <!-- <div class="mb-16">
            <h2 class="text-3xl font-bold text-emerald-900 text-center mb-12">What Our Clients Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-emerald-900">Nirika Lamichhane</h4>
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"CleanNepal has transformed how our community handles waste. Their recycling program is easy to use and has made a noticeable difference in our neighborhood."</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-emerald-900">Swostika Adhikari</h4>
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"As a business owner, I appreciate CleanNepal's reliable waste collection services. They're professional, punctual, and truly committed to environmental sustainability."</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=688&q=80" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-emerald-900">Prabesh Acharya</h4>
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"The educational programs offered by CleanNepal have helped our school implement effective waste management practices. Our students are now more environmentally conscious!"</p>
                </div>
            </div>
        </div> -->

        <!-- Contact Section -->
        <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-emerald-900 mb-4">Have Questions?</h2>
                    <p class="text-gray-600 mb-6">Our team is ready to help you with any inquiries about our services or how you can contribute to a cleaner Nepal.</p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-emerald-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-emerald-900">Call Us</h3>
                                <p class="text-gray-600">+977 9865162745</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-emerald-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-emerald-900">Email Us</h3>
                                <p class="text-gray-600">support@cleannepal.org</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-emerald-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-emerald-900">Visit Us</h3>
                                <p class="text-gray-600">Ratnanagar-1, Bakulahar, Chitwan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <form action="#" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <input type="text" name="name" placeholder="Your Name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" required>
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Your Email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" required>
                        </div>
                        <div>
                            <textarea name="message" rows="4" placeholder="Your Message" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:from-emerald-600 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection