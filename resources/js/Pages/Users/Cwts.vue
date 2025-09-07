<script setup>
import { Head } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue';
import BaseFormPage from '@/Components/Students/BaseFormPage.vue';
import { progressWidth, getStepLabelClass } from '@/Composables/useStepProgress';
</script>

<template>
    <Head title="CWTS" />

    <UserLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                <!-- Dashboard -->
            </h2>
        </template>

        <div class="py-6 bg-gray-50 min-h-screen">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 bg-white rounded-lg shadow">
                <div class="w-full flex justify-center py-4 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800">Fill up CWTS</h1>
                </div>

                <!-- Progress Bar -->
                <div class="w-full py-4">
                    <div class="flex items-center justify-between mb-2">
                        <span :class="getStepLabelClass(0)">School</span>
                        <span :class="getStepLabelClass(1)">Personal</span>
                        <span :class="getStepLabelClass(2)">Address</span>
                        <span :class="getStepLabelClass(3)">Institution</span>
                    </div>
                    <div class="overflow-hidden rounded-full bg-gray-200 h-2.5">
                        <div class="h-full bg-blue-600 rounded-full" :style="{ width: progressWidth }"></div>
                    </div>
                </div>

                <!-- Form Page -->
                <BaseFormPage category="CWTS"/>

            </div>
        </div>
    </UserLayout>
</template>