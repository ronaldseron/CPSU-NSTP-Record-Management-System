<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    students: Object
});

function goToPage(page) {
    if (page && page !== props.students.current_page) {
        router.get(props.students.path + '?page=' + page, {}, { preserveState: true, replace: true });
    }
}
</script>

<template>
    <div class="px-8 mt-6 pb-4 flex items-center bg-gray-100">
        <div class="h-20 w-full flex justify-between rounded-md shadow py-6 sm:px-6 bg-white">
            <div class="flex-1 flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Showing <span class="font-semibold">{{ students.from }}</span>
                    to <span class="font-semibold">{{ students.to }}</span>
                    of <span class="font-semibold">{{ students.total }}</span> entries
                </div>
                <div class="flex space-x-1">
                    <button
                        :disabled="!students.prev_page_url"
                        @click="goToPage(students.current_page - 1)"
                        class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-700 hover:bg-gray-50"
                    >Previous</button>
                    <button
                        v-for="page in students.last_page"
                        :key="page"
                        @click="goToPage(page)"
                        :class="[
                            'px-3 py-1 rounded-md',
                            page === students.current_page ? 'bg-blue-600 text-white' : 'bg-white border border-gray-300 text-gray-700 hover:bg-gray-50'
                        ]"
                    >{{ page }}</button>
                    <button
                        :disabled="!students.next_page_url"
                        @click="goToPage(students.current_page + 1)"
                        class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-700 hover:bg-gray-50"
                    >Next</button>
                </div>
            </div>
        </div>
    </div>
</template>