<script setup>
    defineProps({
        formData: Object,
        validationErrors: Object,
        nextStep: Function,
        programLevelCodes: Array,
        constitutionCodes: Array,
    });
</script>

<template>
    <div class="step-content">
        <h2 class="text-xl font-bold text-gray-700 mb-4">Institution Information</h2>
        <!-- Institution information content remains the same -->
        <div class="space-y-4">
            <div>
                <label for="heiName" class="block text-sm font-medium text-gray-700">HEI Name</label>
                <select id="heiName" v-model="formData.heiName"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    :class="{ 'border-red-500': validationErrors.heiName }">
                    <option value="">Select HEI Name</option>
                    <option v-for="hei in heiNames" :key="hei.value" :value="hei.value">
                        {{ hei.label }}
                    </option>
                </select>
                <p v-if="validationErrors.heiName" class="mt-1 text-sm text-red-600">{{ validationErrors.heiName }}</p>
            </div>
            <div>
                <label for="constitutionCode" class="block text-sm font-medium text-gray-700">Constitution Code</label>
                <select id="constitutionCode" v-model="formData.constitutionCode"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    :class="{ 'border-red-500': validationErrors.constitutionCode }">
                    <option value="">Select Constitution Code</option>
                    <option v-for="code in constitutionCodes" :key="code.value" :value="code.value">
                        {{ code.label }}
                    </option>
                </select>
                <p v-if="validationErrors.constitutionCode" class="mt-1 text-sm text-red-600">{{
                    validationErrors.constitutionCode }}</p>
            </div>
            <div>
                <label for="typeHeis" class="block text-sm font-medium text-gray-700">Type of HEIS</label>
                <select id="typeHeis" v-model="formData.typeHeis"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    :class="{ 'border-red-500': validationErrors.typeHeis }">
                    <option value="">Select Type</option>
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                </select>
                <p v-if="validationErrors.typeHeis" class="mt-1 text-sm text-red-600">{{ validationErrors.typeHeis }}
                </p>
            </div>
            <div>
                <label for="programLevelCode" class="block text-sm font-medium text-gray-700">Program Level Code</label>
                <select id="programLevelCode" v-model="formData.programLevelCode"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    :class="{ 'border-red-500': validationErrors.programLevelCode }">
                    <option value="">Select Program Level Code</option>
                    <option v-for="code in programLevelCodes" :key="code.value" :value="code.value">
                        {{ code.label }}
                    </option>
                </select>
                <p v-if="validationErrors.programLevelCode" class="mt-1 text-sm text-red-600">{{
                    validationErrors.programLevelCode }}</p>
            </div>
        </div>

        <div class="mt-6 flex justify-between">
            <button type="button" @click="prevStep"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Back
            </button>
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Submit
            </button>
        </div>
    </div>
</template>