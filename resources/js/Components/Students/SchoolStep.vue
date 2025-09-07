<script setup>
defineProps({
    formData: Object,
    validationErrors: Object,
    nextStep: Function,
});
</script>

<template>
    <div class="step-content">
        <h2 class="text-xl font-bold text-gray-700 mb-4">School Information</h2>
        <!-- School information content remains the same -->
        <div class="space-y-4">
            <div>
                <label for="schoolYear" class="block text-sm font-medium text-gray-700">School Year</label>
                <input type="text" id="schoolYear" v-model="formData.schoolYear"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="2023-2024" :class="{ 'border-red-500': validationErrors.schoolYear }">
                <p v-if="validationErrors.schoolYear" class="mt-1 text-sm text-red-600">{{ validationErrors.schoolYear
                    }}</p>
            </div>
            <div>
                <label for="schoolId" class="block text-sm font-medium text-gray-700">School ID No.</label>
                <input type="text" id="schoolId" v-model="formData.schoolId"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    :class="{ 'border-red-500': validationErrors.schoolId }">
                <p v-if="validationErrors.schoolId" class="mt-1 text-sm text-red-600">{{ validationErrors.schoolId }}
                </p>
            </div>
            <div>
                <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                <select id="course" v-model="formData.course"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    :class="{ 'border-red-500': validationErrors.course }">
                    <option value="">Select Course</option>
                    <option value="bscs">BS Computer Science</option>
                    <option value="bsit">BS Information Technology</option>
                    <option value="bsed">BS Education</option>
                </select>
                <p v-if="validationErrors.course" class="mt-1 text-sm text-red-600">{{ validationErrors.course }}</p>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="button" @click="nextStep"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Continue
            </button>
        </div>
    </div>
</template>