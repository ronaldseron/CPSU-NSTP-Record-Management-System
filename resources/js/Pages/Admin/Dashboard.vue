<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps([
    'rotcMaleCount',
    'rotcFemaleCount',
    'rotcTotalCount',
    'cwtsMaleCount',
    'cwtsFemaleCount',
    'cwtsTotalCount', 
    'ltsMaleCount',
    'ltsFemaleCount', 
    'ltsTotalCount',
    'totalMaleCount' ,
    'totalFemaleCount',
    'totalStudentsCount'
])
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2
                class="text-2xl font-semibold leading-tight text-gray-800"
            >
                DASHBOARD
            </h2>
        </template>

        <div class=" mx-8 mb-8">
            <div class="">
                <div
                    class="overflow-hidden rounded-md"
                >
                    <div class=" grid grid-cols-[repeat(auto-fit,minmax(280px,1fr))] gap-6 text-gray-900">

                        <!-- ROTC -->
                        <div class="h-auto min-h-36 bg-white rounded-md shadow-sm overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300">
                            <!-- Card header with gradient background -->
                            <div class="bg-gradient-to-r from-red-600 to-red-700 p-4">
                                <h1 class="text-xl font-bold text-white">ROTC</h1>
                                <p class="text-blue-100 text-sm mt-1">Total Enrolled: {{ rotcTotalCount }}</p>
                            </div>
                        
                            <!-- Card body -->
                            <div class="p-4">
                                <!-- Stats section -->
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Male stats -->
                                    <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                        <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                            <i class="bx bx-male text-xl text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 font-medium">Male</p>
                                            <p class="text-lg font-bold text-gray-800">{{ rotcMaleCount }}</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Female stats -->
                                    <div class="flex items-center p-3 bg-pink-50 rounded-lg">
                                        <div class="p-2 bg-pink-100 rounded-lg mr-3">
                                            <i class="bx bx-female text-xl text-pink-600"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 font-medium">Female</p>
                                            <p class="text-lg font-bold text-gray-800">{{ rotcFemaleCount }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Optional footer with extra info or actions -->
                                <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                                    <span class="text-xs text-gray-500">Last updated: Today</span>
                                    <button class="text-xs text-blue-600 hover:text-blue-800 font-medium">View Details</button>
                                </div>
                            </div>
                        </div>
                    
                        <!-- CWTS -->
                        <div class="h-auto min-h-36 bg-white rounded-md shadow-sm overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300">
                            <!-- Card header with gradient background -->
                            <div class="bg-gradient-to-r from-green-500 to-green-600 p-4">
                                <h1 class="text-xl font-bold text-white">CWTS</h1>
                                <p class="text-blue-100 text-sm mt-1">Total Enrolled: {{ cwtsTotalCount }}</p>
                            </div>
                            
                            <!-- Card body -->
                            <div class="p-4">
                                <!-- Stats section -->
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Male stats -->
                                    <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                        <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                            <i class="bx bx-male text-xl text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 font-medium">Male</p>
                                            <p class="text-lg font-bold text-gray-800">{{ cwtsMaleCount }}</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Female stats -->
                                    <div class="flex items-center p-3 bg-pink-50 rounded-lg">
                                        <div class="p-2 bg-pink-100 rounded-lg mr-3">
                                            <i class="bx bx-female text-xl text-pink-600"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 font-medium">Female</p>
                                            <p class="text-lg font-bold text-gray-800">{{ cwtsFemaleCount }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Optional footer with extra info or actions -->
                                <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                                    <span class="text-xs text-gray-500">Last updated: Today</span>
                                    <button class="text-xs text-blue-600 hover:text-blue-800 font-medium">View Details</button>
                                </div>
                            </div>
                        </div>
                    
                        <!-- LTS -->
                        <div class="h-auto min-h-36 bg-white rounded-md shadow-sm overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300">
                            <!-- Card header with gradient background -->
                            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 p-4">
                                <h1 class="text-xl font-bold text-white">LTS</h1>
                                <p class="text-blue-100 text-sm mt-1">Total Enrolled: {{ ltsTotalCount }}</p>
                            </div>
                            
                            <!-- Card body -->
                            <div class="p-4">
                                <!-- Stats section -->
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Male stats -->
                                    <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                        <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                            <i class="bx bx-male text-xl text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 font-medium">Male</p>
                                            <p class="text-lg font-bold text-gray-800">{{ ltsMaleCount }}</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Female stats -->
                                    <div class="flex items-center p-3 bg-pink-50 rounded-lg">
                                        <div class="p-2 bg-pink-100 rounded-lg mr-3">
                                            <i class="bx bx-female text-xl text-pink-600"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 font-medium">Female</p>
                                            <p class="text-lg font-bold text-gray-800">{{ ltsFemaleCount }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Optional footer with extra info or actions -->
                                <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                                    <span class="text-xs text-gray-500">Last updated: Today</span>
                                    <button class="text-xs text-blue-600 hover:text-blue-800 font-medium">View Details</button>
                                </div>
                            </div>
                        </div>

                        <!-- TOTAL -->
                        <div class="h-auto min-h-36 bg-white rounded-md shadow-sm overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300">
                            <!-- Card header with gradient background -->
                            <div class="bg-gradient-to-r from-stone-500 to-stone-600 p-4">
                                <h1 class="text-xl font-bold text-white">TOTAL</h1>
                                <p class="text-blue-100 text-sm mt-1">Total Enrolled: {{ totalStudentsCount }}</p>
                            </div>
                            
                            <!-- Card body -->
                            <div class="p-4">
                                <!-- Stats section -->
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Male stats -->
                                    <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                        <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                            <i class="bx bx-male text-xl text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 font-medium">Male</p>
                                            <p class="text-lg font-bold text-gray-800">{{ totalMaleCount }}</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Female stats -->
                                    <div class="flex items-center p-3 bg-pink-50 rounded-lg">
                                        <div class="p-2 bg-pink-100 rounded-lg mr-3">
                                            <i class="bx bx-female text-xl text-pink-600"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 font-medium">Female</p>
                                            <p class="text-lg font-bold text-gray-800">{{ totalFemaleCount }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Optional footer with extra info or actions -->
                                <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                                    <span class="text-xs text-gray-500">Last updated: Today</span>
                                    <button class="text-xs text-blue-600 hover:text-blue-800 font-medium">View Details</button>
                                </div>
                            </div>
                        </div>

                        <!-- Male Count Card -->
                        <div class="h-auto min-h-36 bg-white rounded-md shadow-sm overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300">
                            <!-- Card header with gradient background -->
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4">
                                <h1 class="text-xl font-bold text-white">Male Students</h1>
                                <p class="text-blue-100 text-sm mt-1">Total Count</p>
                            </div>

                            <!-- Card body -->
                            <div class="p-4">
                                <!-- Stats section -->
                                <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                    <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                        <i class="bx bx-male text-xl text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">Male</p>
                                        <p class="text-lg font-bold text-gray-800">{{ totalMaleCount }}</p>
                                    </div>
                                </div>
                                        
                                <!-- Optional footer with extra info or actions -->
                                <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                                    <span class="text-xs text-gray-500">Last updated: Today</span>
                                    <button class="text-xs text-blue-600 hover:text-blue-800 font-medium">View Details</button>
                                </div>
                            </div>
                        </div>

                        <!-- Female Count Card -->
                        <div class="h-auto min-h-36 bg-white rounded-md shadow-sm overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300">
                            <!-- Card header with gradient background -->
                            <div class="bg-gradient-to-r from-pink-500 to-pink-600 p-4">
                                <h1 class="text-xl font-bold text-white">Female Students</h1>
                                <p class="text-blue-100 text-sm mt-1">Total Count</p>
                            </div>

                            <!-- Card body -->
                            <div class="p-4">
                                <!-- Stats section -->
                                <div class="flex items-center p-3 bg-pink-50 rounded-lg">
                                    <div class="p-2 bg-pink-100 rounded-lg mr-3">
                                        <i class="bx bx-female text-xl text-pink-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">Female</p>
                                        <p class="text-lg font-bold text-gray-800">{{ totalFemaleCount }}</p>
                                    </div>
                                </div>
                                        
                                <!-- Optional footer with extra info or actions -->
                                <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                                    <span class="text-xs text-gray-500">Last updated: Today</span>
                                    <button class="text-xs text-blue-600 hover:text-blue-800 font-medium">View Details</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
