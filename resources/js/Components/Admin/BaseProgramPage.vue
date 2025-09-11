<script setup>
import { ref} from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    students: Object,
    perPage: Number
});

const emit = defineEmits([
    'delete'
]);

const perPage = ref(props.perPage || 10);

function updatePerPage() {
    router.get(props.students.path, { per_page: perPage.value }, {
        preserveState: true,
        replace: true,
    });
}

function handleDelete(id) {
    console.log('Emitting delete with ID:', id);
    emit('delete', id);
}
</script>

<template>    
    <div class="flex-1 mx-8">
        <div class=" h-full">
            <div class=" h-full bg-white p-6 rounded-lg shadow">
                <!-- Table Header with Controls -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                    <!-- Show Entries Dropdown -->
                    <div class="mb-4 md:mb-0">
                        <label class="flex items-center text-sm text-gray-700">
                            Show
                            <select
                                v-model="perPage"
                                @change="updatePerPage"
                                class=" text-sm mx-2 px-3 pr-8 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </label>
                    </div>

                    <div class="flex items-center gap-4">
                        <!-- Search Box -->
                        <div class=" relative w-full">
                            <input type="text" placeholder="Search..."
                                class="w-full text-sm px-4 py-2 border border-gray-300 rounded-md pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="bx bx-search w-4 h-4 absolute left-3 top-3 text-gray-500"></i>
                        </div>

                        <!-- Applied Students Button -->
                        <div class=" flex justify-end mt-4 md:mt-0">
                            <button
                                class="flex items-center text-base bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-md transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 border border-blue-600">
                                <i class="bx bx-user-check text-xl mr-2"></i>
                                <h1 class=" whitespace-nowrap">View Applicants</h1>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    #</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Course</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Gender</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Print</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            <tr v-for="student in students.data" :key="student.id" class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ student.first_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ student.course }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ student.gender }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox"
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    </label>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button class="text-blue-500 hover:text-blue-700">
                                        <i class="bx bx-edit text-xl"></i>
                                    </button>
                                    <button
                                        type="button"
                                        class="text-red-500 hover:text-red-700 ml-2"
                                        title="Delete"
                                        @click="handleDelete(student.id)"
                                    >
                                        <i class="bx bx-trash text-xl"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</template>