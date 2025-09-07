<script setup>
defineProps({
    formData: Object,
    validationErrors: Object,
    provinces: Array,
    cities: Array,
    barangays: Array,
    loadingProvinces: Boolean,
    loadingCities: Boolean,
    loadingBarangays: Boolean,
    handleProvinceChange: Function,
    handleCityChange: Function,
    handleBarangayChange: Function,
    nextStep: Function,
    prevStep: Function,
});
</script>

<template>
    <div class="step-content">
        <h2 class="text-xl font-bold text-gray-700 mb-4">Address Information</h2>
        <div class="space-y-4">
            <div>
                <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                <select id="province" v-model="formData.province" @change="handleProvinceChange"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    :class="{ 'border-red-500': validationErrors.province }" :disabled="loadingProvinces">
                    <option value="">Select Province</option>
                    <option v-for="province in provinces" :key="province.code" :value="province.code">
                        {{ province.name }}
                    </option>
                </select>
                <p v-if="loadingProvinces" class="mt-1 text-sm text-blue-600">Loading provinces...</p>
                <p v-if="validationErrors.province" class="mt-1 text-sm text-red-600">{{ validationErrors.province }}
                </p>
            </div>
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">City/Municipality</label>
                <select id="city" v-model="formData.city" @change="handleCityChange"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    :class="{ 'border-red-500': validationErrors.city }" :disabled="!formData.province || loadingCities">
                    <option value="">Select City/Municipality</option>
                    <option v-for="city in cities" :key="city.code" :value="city.code">
                        {{ city.name }}
                    </option>
                </select>
                <p v-if="loadingCities" class="mt-1 text-sm text-blue-600">Loading cities...</p>
                <p v-if="validationErrors.city" class="mt-1 text-sm text-red-600">{{ validationErrors.city }}</p>
            </div>
            <div>
                <label for="brgy" class="block text-sm font-medium text-gray-700">Barangay</label>
                <select id="brgy" v-model="formData.brgy" @change="handleBarangayChange"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    :class="{ 'border-red-500': validationErrors.brgy }" :disabled="!formData.city || loadingBarangays">
                    <option value="">Select Barangay</option>
                    <option v-for="brgy in barangays" :key="brgy.code" :value="brgy.code">
                        {{ brgy.name }}
                    </option>
                </select>
                <p v-if="loadingBarangays" class="mt-1 text-sm text-blue-600">Loading barangays...</p>
                <p v-if="validationErrors.brgy" class="mt-1 text-sm text-red-600">{{ validationErrors.brgy }}</p>
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