<script setup>
import { Head, Link } from '@inertiajs/vue3';
import cpsuLogo from '~/images/cpsu.png';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Home" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative flex min-h-screen flex-col items-center justify-center px-24"
        >
            <div class="relative flex-1 flex flex-col w-full">
                <header
                    class="flex items-center gap-2 pt-8"
                >
                    <nav v-if="canLogin" class=" flex flex-1 justify-between items-center">
                        <div class="flex items-center gap-4">
                            <img class=" w-16" :src="cpsuLogo"  alt="logo">
                            <h1 class=" text-3xl text-green-600">Central Philippines State University</h1>
                        </div>

                        <Link
                            v-if="$page.props.auth?.user.name"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <div class="flex gap-4 h-12">
                                <Link
                                    :href="route('login')"
                                    class="w-28 grid place-content-center font-medium bg-green-600 text-white rounded-md"
                                >
                                    Login
                                </Link>
    
                                <Link
                                    v-if="canRegister"
                                    :href="route('register')"
                                    class="w-28 grid place-content-center font-medium bg-green-600 text-white rounded-md"
                                >
                                    Register
                                </Link>
                            </div>
                        </template>
                    </nav>
                </header>

                <main class="flex-1 flex items-center px-12">
                    <div class="grid gap-6 grid-cols-2">
                        <div class="flex flex-col items-center justify-center gap-4">
                            <h1 class=" text-7xl font-black">National Service Training Program</h1>
                            <p class=" text-xl">Build skills with courses, certificates, and degrees online from world-class universities.</p>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </div>
</template>
