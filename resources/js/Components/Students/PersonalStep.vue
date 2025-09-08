<script setup>
    defineProps({
        formData: Object,
        validationErrors: Object,
        nextStep: Function,
        prevStep: Function,
    });
</script>

<template>
    <div class="step-content">
        <h2 class="text-xl font-bold text-gray-700 mb-4">Personal Information</h2>
        <!-- Personal information content remains the same -->
        <div class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="last_name" v-model="formData.last_name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        :class="{ 'border-red-500': validationErrors.last_name }">
                    <p v-if="validationErrors.last_name" class="mt-1 text-sm text-red-600">{{ validationErrors.last_name
                        }}</p>
                </div>
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="first_name" v-model="formData.first_name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        :class="{ 'border-red-500': validationErrors.first_name }">
                    <p v-if="validationErrors.first_name" class="mt-1 text-sm text-red-600">{{ validationErrors.first_name
                        }}</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="middle_initial" class="block text-sm font-medium text-gray-700">Middle Initial</label>
                    <input type="text" id="middle_initial" v-model="formData.middle_initial" maxlength="1"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label for="extensionName" class="block text-sm font-medium text-gray-700">Extension</label>
                    <input type="text" id="extensionName" v-model="formData.extension_name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Jr, Sr, III">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select id="gender" v-model="formData.gender"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        :class="{ 'border-red-500': validationErrors.gender }">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <p v-if="validationErrors.gender" class="mt-1 text-sm text-red-600">{{ validationErrors.gender }}
                    </p>
                </div>
                <div>
                    <label for="cp_number" class="block text-sm font-medium text-gray-700">CP Number</label>
                    <input type="tel" id="cp_number" v-model="formData.cp_number"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="09123456789" :class="{ 'border-red-500': validationErrors.cp_number }">
                    <p v-if="validationErrors.cp_number" class="mt-1 text-sm text-red-600">{{ validationErrors.cp_number
                        }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-between">
            <button type="button" @click="prevStep"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Back
            </button>
            <button type="button" @click="nextStep"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Continue
            </button>
        </div>
    </div>
</template>