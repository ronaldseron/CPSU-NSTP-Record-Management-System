<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
});

const page = usePage();
const isActive = computed(() => props.href === page.url);
</script>

<template>
    <Link :href="href" :class="[{ 'bg-accent': isActive }]">
        <slot />
    </Link>
</template>
