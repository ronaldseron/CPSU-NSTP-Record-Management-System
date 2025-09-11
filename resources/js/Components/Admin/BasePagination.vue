<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    currentPage: {
        type: Number,
        required: true
    },
    lastPage: {
        type: Number,
        required: true
    },
    from: {
        
        type: [ Number, null ],
        required: true
    },
    to: {
        type: [ Number, null ],
        required: true
    },
    total: {
        type: Number,
        required: true
    },
    prevPageUrl: {
        type: String,
        default: null
    },
    nextPageUrl: {
        type: String,
        default: null
    },
    path: {
        type: String,
        required: true
    }
});

// Handle page navigation
function goToPage(page) {
    if (page && page !== props.currentPage) {
        router.get(props.path + '?page=' + page, {}, { preserveState: true, replace: true });
    }
}
</script>

<template>
    <div class="px-8 mt-6 pb-4 flex items-center bg-gray-100">
        <div class="h-20 w-full flex justify-between rounded-md shadow py-6 sm:px-6 bg-white">
            <div class="flex-1 flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Showing <span class="font-semibold">{{ from }}</span>
                    to <span class="font-semibold">{{ to }}</span>
                    of <span class="font-semibold">{{ total }}</span> entries
                </div>
                <div class="flex space-x-1">
                    <button
                        :disabled="!prevPageUrl"
                        @click="goToPage(currentPage - 1)"
                        class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-700 hover:bg-gray-50"
                    >Previous</button>
                    <button
                        v-for="page in lastPage"
                        :key="page"
                        @click="goToPage(page)"
                        :class="[
                            'px-3 py-1 rounded-md',
                            page === currentPage ? 'bg-blue-600 text-white' : 'bg-white border border-gray-300 text-gray-700 hover:bg-gray-50'
                        ]"
                    >{{ page }}</button>
                    <button
                        :disabled="!nextPageUrl"
                        @click="goToPage(currentPage + 1)"
                        class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-700 hover:bg-gray-50"
                    >Next</button>
                </div>
            </div>
        </div>
    </div>
</template>