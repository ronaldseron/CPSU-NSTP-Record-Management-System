<script setup>
import { Link } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue';
import { Head } from '@inertiajs/vue3';
import cwts from '~/images/cwts.png';
import lts from '~/images/lts.png';
import rotc from '~/images/rotc.png';
import Sidebar from '@/Components/Sidebar.vue';
</script>

<template>
    <Head title="Dashboard" />

    <UserLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                <!-- <Sidebar /> -->
            </h2>
        </template>

        <div class="py-12">

            <div class="w-full flex justify-center mb-8">
                <h1 class=" text-4xl font-extrabold">Choose your NSTP</h1>
            </div>
    
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-2xl"
                >
                    <div class="p-8 bg-gray-50">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- CWTS Card -->
                            <Link :href="route('dashboard.users.cwts')" class="group">
                                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105">
                                    <div class=" w-full py-4 grid place-content-center bg-slate-200 overflow-hidden">
                                        <img :src="cwts" alt="CWTS Program" class=" w-52" />
                                    </div>
                                    <div class="p-5">
                                        <h2 class="text-xl font-bold text-blue-600 mb-2">CWTS</h2>
                                        <p class="text-gray-600 mb-4">Civic Welfare Training Service</p>
                                        <p class="text-sm text-gray-500">Learn to contribute to community development through civic welfare activities.</p>
                                        <div class="mt-4 flex items-center text-blue-500 font-medium">
                                            <span>Learn more</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </Link>
    
                            <!-- ROTC Card -->
                            <Link :href="route('dashboard.users.rotc')" class="group">
                                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105">
                                    <div class=" w-full py-4 grid place-content-center bg-slate-200 overflow-hidden">
                                        <img :src="rotc" alt="CWTS Program" class=" w-52" />
                                    </div>
                                    <div class="p-5">
                                        <h2 class="text-xl font-bold text-red-600 mb-2">ROTC</h2>
                                        <p class="text-gray-600 mb-4">Reserve Officers' Training Corps</p>
                                        <p class="text-sm text-gray-500">Develop military and leadership skills while preparing to serve as reserve force.</p>
                                        <div class="mt-4 flex items-center text-red-500 font-medium">
                                            <span>Learn more</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </Link>
                    
                            <!-- LTS Card -->
                            <Link :href="route('dashboard.users.lts')" class="group">
                                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105">
                                    <div class=" w-full py-4 grid place-content-center bg-slate-200 overflow-hidden">
                                        <img :src="lts" alt="CWTS Program" class=" w-52" />
                                    </div>
                                    <div class="p-5">
                                        <h2 class="text-xl font-bold text-green-600 mb-2">LTS</h2>
                                        <p class="text-gray-600 mb-4">Literacy Training Service</p>
                                        <p class="text-sm text-gray-500">Teach literacy and numeracy skills to communities and contribute to educational development.</p>
                                        <div class="mt-4 flex items-center text-green-500 font-medium">
                                            <span>Learn more</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </Link>
                    
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </UserLayout>
</template>
