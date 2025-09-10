<script setup>
import { ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Sidebar from '@/Components/Sidebar.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);

</script>

<template>
    <div>
        <div class="min-h-screen flex bg-gray-100">

            <!-- Sidebar -->
            <Sidebar />

            <div class="flex-1 h-screen flex flex-col overflow-y-auto">
                <!-- Page Heading -->
                <header
                    class="px-8 pb-6 pt-4 sticky top-0 flex items-center bg-gray-100 z-50"
                    v-if="$slots.header"
                >
                    <div class=" h-20 w-full flex justify-between rounded-md shadow py-6 sm:px-6 bg-white">
                        <slot name="header" />
                    </div>
                </header>
    
                <!-- Page Content -->
                <main class="flex-1 flex flex-col justify-between">
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
