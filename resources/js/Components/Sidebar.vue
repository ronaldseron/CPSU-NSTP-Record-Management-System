<script setup>
import { Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import cpsuLogo from '~/images/cpsu.png';
import NavLink from '@/Components/NavLink.vue';

const isCollapsed = ref(false);

function toggleSidebar() {
    isCollapsed.value = !isCollapsed.value;
}

const sidebarNames = computed(() => (isCollapsed.value ? 'hidden' : ''));
</script>


<template>
    <div 
        class=" bg-primary transition-all duration-300 ease-in-out overflow-hidden"
        :class="isCollapsed ? 'w-16' : 'w-60'"
    >
    <div class="w-full h-full flex flex-col justify-between">
        <div class="flex flex-col">
            <!-- Header -->
            <div class=" h-20 flex justify-between p-4 border-b border-accent">
                <div class="flex gap-2 items-center" :class="isCollapsed ? 'hidden' : 'flex'">
                    <img :src="cpsuLogo" class="w-10" alt="Logo">
                    <h1 class=" text-primary font-semibold whitespace-nowrap">CPSU Admin</h1>
                </div>
                <button @click="toggleSidebar" class=" focus:outline-none c">
                    <i class="bx  bxs-menu text-3xl text-primary"  ></i> 
                </button>
            </div>
            
            <!-- Buttons -->
            <div class=" mt-8 flex flex-col gap-1 text-primary font-medium">
                <NavLink
                    href="/dashboard"
                    class="py-3 px-4 text-start hover:bg-accent  flex items-center gap-2"
                >
                    <i class="bx bxs-dashboard text-xl"></i>
                    <h1 :class="sidebarNames">Dashboard</h1>
                </NavLink>
                <NavLink
                    href="/dashboard/students"
                    class="py-3 px-4 text-start hover:bg-accent  flex items-center gap-2"
                >
                    <i class="bx bxs-community text-xl"></i>
                    <h1 :class="sidebarNames" >Students</h1>
                </NavLink>
                <NavLink
                    href="/dashboard/rotc"
                    class="py-3 px-4 text-start hover:bg-accent  flex items-center gap-2"
                >
                    <i class="bx bxs-medal-star text-xl"></i>
                    <h1 :class="sidebarNames" >Rotc</h1>
                </NavLink>
                <NavLink
                    href="/dashboard/cwts"
                    class="py-3 px-4 text-start hover:bg-accent  flex items-center gap-2"
                >
                    <i class="bx bxs-sapling text-xl"></i>
                    <h1 :class="sidebarNames" >Cwts</h1>
                </NavLink>
                <NavLink
                    href="/dashboard/lts"
                    class="py-3 px-4 text-start hover:bg-accent  flex items-center gap-2"
                >
                    <i class="bx bxs-reading text-xl"></i>
                    <h1 :class="sidebarNames" >Lts</h1>
                </NavLink>
            </div>
        </div>

        <!-- Log out -->
         <div class="h-20 flex justify-between p-4 border-t border-accent text-primary font-semibold">
             <Link
                 :href="route('logout')"
                 method="post"
                 as="button"
                 class="flex items-center gap-2 whitespace-nowrap"
             >
                <i class='bx  bx-arrow-out-left-square-half text-xl'  ></i> 
                <h1 :class="sidebarNames">Sign out</h1>
             </Link>
         </div>
    </div>
    </div>
</template>