<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import BaseHeader from '@/Components/Admin/BaseHeader.vue';
import BaseProgramPage from '@/Components/Admin/BaseProgramPage.vue';
import BasePagination from '@/Components/Admin/BasePagination.vue';
import { useDeleteStudents } from '@/Composables/useDeleteStudents.js';

defineProps({
    students: Object,
    perPage: Number
});

function deleteStudents(id) {
    useDeleteStudents(id);
}
</script>

<template>
    <Head title="Students" />

    <AdminLayout>

        <!-- Header -->
        <template #header>
            <BaseHeader headerName="STUDENTS" />
        </template>
        <!-- Table -->
        <BaseProgramPage 
            :students="students" 
            :perPage="perPage"
            @delete="deleteStudents"
        />
        <!-- Pagination -->
        <BasePagination
            :current-page="students.current_page"
            :last-page="students.last_page"
            :from="students.from"
            :to="students.to"
            :total="students.total"
            :prev-page-url="students.prev_page_url"
            :next-page-url="students.next_page_url"
            :path="students.path"
        />

    </AdminLayout>
</template>
