<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import BaseHeader from '@/Components/Admin/BaseHeader.vue';
import BaseProgramPage from '@/Components/Admin/BaseProgramPage.vue';
import BasePagination from '@/Components/Admin/BasePagination.vue';

defineProps({
    students: Object,
    perPage: Number
});
</script>

<template>
    <Head title="Students" />

    <AdminLayout>

        <!-- Header -->
        <template #header>
            <BaseHeader headerName="STUDENTS" />
        </template>
        <!-- Table -->
        <BaseProgramPage :students="students" :perPage="perPage"/>
        <!-- Pagination -->
        <BasePagination :students="students"/>

    </AdminLayout>
</template>
