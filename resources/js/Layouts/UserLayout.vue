<script setup>
import Sidebar from '@/Components/Sidebar.vue';
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <!-- <Sidebar /> -->
        <header class="" 
            v-if="$slots.header"
        >
            <slot name="header" />
        </header>
        <main>
            <slot />
        </main>
    </div>
</template>