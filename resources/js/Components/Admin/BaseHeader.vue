<script setup>
defineProps({
    headerName: String
});
</script>

<template>
    <!-- Title/Breadcrumb -->
    <div class="mb-4 sm:mb-0">
        <h2 class="text-2xl font-bold text-gray-800">
            <span class="text-gray-500">DASHBOARD</span>
            <span class="mx-2 text-gray-400">/</span>
            <span>{{ headerName }}</span>
        </h2>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center space-x-3">
        <!-- Print Button -->
        <button
            class="flex items-center text-base px-4 py-1 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
            <i class='bx bx-printer text-xl mr-2 text-gray-600'></i>
            Print
        </button>

        <!-- Check All Button -->
        <button
            class="flex items-center text-base px-4 py-1 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
            <i class='bx bx-check-square text-xl mr-2 text-gray-600'></i>
            <h1>Check All</h1>
        </button>

        <!-- Export Button -->
        <button
            class="flex items-center text-base px-4 py-1 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-700 transition-colors focus:outline-none focus:ring-2 focus:ring-green-500">
            <i class='bx bx-arrow-out-down-left-square text-xl mr-2'></i>
            Export to Excel
        </button>
    </div>
</template>