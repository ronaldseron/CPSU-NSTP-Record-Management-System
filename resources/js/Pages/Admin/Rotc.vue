<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Students" />

    <AdminLayout>
        <template #header>
                <!-- Title/Breadcrumb -->
                <div class="mb-4 sm:mb-0">
                    <h2 class="text-2xl font-bold text-gray-800">
                        <span class="text-gray-500">DASHBOARD</span>
                        <span class="mx-2 text-gray-400">/</span>
                        <span>ROTC</span>
                    </h2>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex items-center space-x-3">
                    <!-- Print Button -->
                    <button class="flex items-center text-base px-4 py-1 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class='bx bx-printer text-xl mr-2 text-gray-600'></i>
                        Print
                    </button>
                    
                    <!-- Check All Button -->
                    <button class="flex items-center text-base px-4 py-1 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class='bx bx-check-square text-xl mr-2 text-gray-600'></i>
                        <h1>Check All</h1>
                    </button>
                    
                    <!-- Export Button -->
                    <button class="flex items-center text-base px-4 py-1 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-700 transition-colors focus:outline-none focus:ring-2 focus:ring-green-500">
                        <i class='bx bx-arrow-out-down-left-square text-xl mr-2'></i>
                        Export to Excel
                    </button>
                </div>
        </template>

        <div class="flex-1 mx-8">
            <div class=" h-full">
                <div class=" h-full bg-white p-6 rounded-lg shadow">
                    <!-- Table Header with Controls -->
                    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                        <!-- Show Entries Dropdown -->
                        <div class="mb-4 md:mb-0">
                            <label class="flex items-center text-sm text-gray-700">
                                Show 
                                <select class=" text-sm mx-2 px-3 pr-8 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <!-- Search Box -->
                            <div class=" relative w-full">
                                <input 
                                    type="text" 
                                    placeholder="Search..." 
                                    class="w-full text-sm px-4 py-2 border border-gray-300 rounded-md pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                                <i class="bx bx-search w-4 h-4 absolute left-3 top-3 text-gray-500"></i>
                            </div>
    
                            <!-- Applied Students Button -->
                            <div class=" flex justify-end mt-4 md:mt-0">
                                <button class="flex items-center text-base bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-md transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 border border-blue-600">
                                    <i class="bx bx-user-check text-xl mr-2"></i>
                                    <h1 class=" whitespace-nowrap">View Applicants</h1>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="bg-gray-100 border-b">
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Course</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Gender</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Print</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">RONALD D. SERON</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">MALE</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        </label>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button class="text-blue-500 hover:text-blue-700">
                                            <i class="bx bx-edit text-xl"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">Ron</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">IT</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">M</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        </label>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button class="text-blue-500 hover:text-blue-700">
                                            <i class="bx bx-edit text-xl"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">Ron</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">IT</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">M</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        </label>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button class="text-blue-500 hover:text-blue-700">
                                            <i class="bx bx-edit text-xl"></i>
                                        </button>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div
            class="px-8 mt-6 pb-4 flex items-center bg-gray-100"
        >
            <div class=" h-20 w-full flex justify-between rounded-md shadow py-6 sm:px-6 bg-white">
                <div class="flex-1 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-semibold">1</span> to <span class="font-semibold">10</span> of <span class="font-semibold">100</span> entries
                    </div>
                    
                    <div class="flex space-x-1">
                        <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">Previous</button>
                        <button class="px-3 py-1 rounded-md bg-blue-600 text-white">1</button>
                        <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">2</button>
                        <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">3</button>
                        <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">Next</button>
                    </div>
                </div>
            </div>
        </div>


    </AdminLayout>
</template>
