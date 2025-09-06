<script setup>
import { Link } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed, reactive, onMounted } from 'vue';
import axios from 'axios';

// Form data state
const currentStep = ref(0);
const totalSteps = 4;

// Category
const category = 'CWTS';

const formData = reactive({
    category: category,
    // School Information
    schoolYear: '',
    schoolId: '',
    course: '',
    
    // Personal Information
    lastName: '',
    firstName: '',
    middleInitial: '',
    extensionName: '',
    gender: '',
    cpNumber: '',
    
    // Address Information
    province: '',
    city: '',
    brgy: '',
    provinceName: '',
    cityName: '',
    brgyName: '',
    
    // Institution Information
    heiName: '',
    constitutionCode: '',
    typeHeis: '',
    programLevelCode: ''
});

const validationErrors = reactive({});

// Reactive address data
const provinces = ref([]);
const cities = ref([]);
const barangays = ref([]);

// Loading states
const loadingProvinces = ref(false);
const loadingCities = ref(false);
const loadingBarangays = ref(false);

// Institution data
const heiNames = [
    { value: 'university1', label: 'University 1' },
    { value: 'university2', label: 'University 2' }
];

const constitutionCodes = [
    { value: 'code1', label: 'Code 1' },
    { value: 'code2', label: 'Code 2' }
];

const programLevelCodes = [
    { value: 'level1', label: 'Level 1' },
    { value: 'level2', label: 'Level 2' }
];

// Computed properties
const progressWidth = computed(() => {
    return `${((currentStep.value + 1) / totalSteps) * 100}%`;
});

// Methods
const getStepLabelClass = (step) => {
    let baseClasses = 'text-sm font-medium';
    
    if (step === currentStep.value) {
        return `${baseClasses} text-blue-600`;
    } else if (step < currentStep.value) {
        return `${baseClasses} text-green-600`;
    } else {
        return `${baseClasses} text-gray-400`;
    }
};

const validateCurrentStep = () => {
    Object.keys(validationErrors).forEach(key => delete validationErrors[key]);
    let isValid = true;

    if (currentStep.value === 0) {
        // Validate School Information
        if (!formData.schoolYear) {
            validationErrors.schoolYear = 'School Year is required';
            isValid = false;
        }
        if (!formData.schoolId) {
            validationErrors.schoolId = 'School ID No. is required';
            isValid = false;
        }
        if (!formData.course) {
            validationErrors.course = 'Course is required';
            isValid = false;
        }
    } else if (currentStep.value === 1) {
        // Validate Personal Information
        if (!formData.lastName) {
            validationErrors.lastName = 'Last Name is required';
            isValid = false;
        }
        if (!formData.firstName) {
            validationErrors.firstName = 'First Name is required';
            isValid = false;
        }
        if (!formData.gender) {
            validationErrors.gender = 'Gender is required';
            isValid = false;
        }
        if (!formData.cpNumber) {
            validationErrors.cpNumber = 'CP Number is required';
            isValid = false;
        }
    } else if (currentStep.value === 2) {
        // Validate Address Information
        if (!formData.province) {
            validationErrors.province = 'Province is required';
            isValid = false;
        }
        if (!formData.city) {
            validationErrors.city = 'City is required';
            isValid = false;
        }
        if (!formData.brgy) {
            validationErrors.brgy = 'Barangay is required';
            isValid = false;
        }
    } else if (currentStep.value === 3) {
        // Validate Institution Information
        if (!formData.heiName) {
            validationErrors.heiName = 'HEI Name is required';
            isValid = false;
        }
        if (!formData.constitutionCode) {
            validationErrors.constitutionCode = 'Constitution Code is required';
            isValid = false;
        }
        if (!formData.typeHeis) {
            validationErrors.typeHeis = 'Type of HEIS is required';
            isValid = false;
        }
        if (!formData.programLevelCode) {
            validationErrors.programLevelCode = 'Program Level Code is required';
            isValid = false;
        }
    }

    return isValid;
};

const nextStep = () => {
    if (validateCurrentStep()) {
        if (currentStep.value < totalSteps - 1) {
            currentStep.value++;
        }
    }
};

const prevStep = () => {
    if (currentStep.value > 0) {
        currentStep.value--;
    }
};

const submitForm = () => {
    if (validateCurrentStep()) {
        axios.post('/form-registration', formData)
            .then(response => {
                console.log('Form submitted successfully:', response.data);
            })
            .catch(error => {
                console.error('Error submitting form:', error);
                if (error.response && error.response.data && error.response.data.errors) {
                    // Populate validation errors from the server
                    Object.keys(error.response.data.errors).forEach(key => {
                        validationErrors[key] = error.response.data.errors[key][0];
                    });
                } else {
                    alert('An error occurred while submitting the form.');
                }
            });
    }
};

// API methods for fetching location data
const fetchProvinces = async () => {
    loadingProvinces.value = true;
    try {
        const response = await axios.get('https://psgc.cloud/api/provinces');
        // Sort provinces alphabetically by name
        provinces.value = response.data.sort((a, b) => a.name.localeCompare(b.name));
    } catch (error) {
        console.error('Error fetching provinces:', error);
    } finally {
        loadingProvinces.value = false;
    }
};

const fetchCities = async (provinceCode) => {
    if (!provinceCode) return;
    
    loadingCities.value = true;
    cities.value = [];
    barangays.value = [];
    
    try {
        const response = await axios.get(`https://psgc.cloud/api/provinces/${provinceCode}/cities-municipalities`);
        // Sort cities alphabetically by name
        cities.value = response.data.sort((a, b) => a.name.localeCompare(b.name));
    } catch (error) {
        console.error('Error fetching cities:', error);
    } finally {
        loadingCities.value = false;
    }
};

const fetchBarangays = async (cityCode) => {
    if (!cityCode) return;
    
    loadingBarangays.value = true;
    barangays.value = [];
    
    try {
        const response = await axios.get(`https://psgc.cloud/api/cities-municipalities/${cityCode}/barangays`);
        // Sort barangays alphabetically by name
        barangays.value = response.data.sort((a, b) => a.name.localeCompare(b.name));
    } catch (error) {
        console.error('Error fetching barangays:', error);
    } finally {
        loadingBarangays.value = false;
    }
};

// Handle province selection
const handleProvinceChange = async (event) => {
    const provinceCode = event.target.value;
    if (provinceCode) {
        const selectedProvince = provinces.value.find(p => p.code === provinceCode);
        formData.provinceName = selectedProvince ? selectedProvince.name : '';
        await fetchCities(provinceCode);
    }
    
    // Reset city and barangay
    formData.city = '';
    formData.cityName = '';
    formData.brgy = '';
    formData.brgyName = '';
};

// Handle city selection
const handleCityChange = async (event) => {
    const cityCode = event.target.value;
    if (cityCode) {
        const selectedCity = cities.value.find(c => c.code === cityCode);
        formData.cityName = selectedCity ? selectedCity.name : '';
        await fetchBarangays(cityCode);
    }
    
    // Reset barangay
    formData.brgy = '';
    formData.brgyName = '';
};

// Handle barangay selection
const handleBarangayChange = (event) => {
    const barangayCode = event.target.value;
    if (barangayCode) {
        const selectedBarangay = barangays.value.find(b => b.code === barangayCode);
        formData.brgyName = selectedBarangay ? selectedBarangay.name : '';
    }
};

// Fetch provinces on component mount
onMounted(async () => {
    await fetchProvinces();
});
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

                <form @submit.prevent="submitForm" class="mt-4 pb-6">
                    <!-- Step 1: School Information -->
                    <div v-show="currentStep === 0" class="step-content">
                        <h2 class="text-xl font-bold text-gray-700 mb-4">School Information</h2>
                        <!-- School information content remains the same -->
                        <div class="space-y-4">
                            <div>
                                <label for="schoolYear" class="block text-sm font-medium text-gray-700">School Year</label>
                                <input 
                                    type="text" 
                                    id="schoolYear" 
                                    v-model="formData.schoolYear" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                    placeholder="2023-2024"
                                    :class="{'border-red-500': validationErrors.schoolYear}"
                                >
                                <p v-if="validationErrors.schoolYear" class="mt-1 text-sm text-red-600">{{ validationErrors.schoolYear }}</p>
                            </div>
                            <div>
                                <label for="schoolId" class="block text-sm font-medium text-gray-700">School ID No.</label>
                                <input 
                                    type="text" 
                                    id="schoolId" 
                                    v-model="formData.schoolId" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    :class="{'border-red-500': validationErrors.schoolId}"
                                >
                                <p v-if="validationErrors.schoolId" class="mt-1 text-sm text-red-600">{{ validationErrors.schoolId }}</p>
                            </div>
                            <div>
                                <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                                <select 
                                    id="course" 
                                    v-model="formData.course" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    :class="{'border-red-500': validationErrors.course}"
                                >
                                    <option value="">Select Course</option>
                                    <option value="bscs">BS Computer Science</option>
                                    <option value="bsit">BS Information Technology</option>
                                    <option value="bsed">BS Education</option>
                                </select>
                                <p v-if="validationErrors.course" class="mt-1 text-sm text-red-600">{{ validationErrors.course }}</p>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button 
                                type="button" 
                                @click="nextStep"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Continue
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Personal Information -->
                    <div v-show="currentStep === 1" class="step-content">
                        <h2 class="text-xl font-bold text-gray-700 mb-4">Personal Information</h2>
                        <!-- Personal information content remains the same -->
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <input 
                                        type="text" 
                                        id="lastName" 
                                        v-model="formData.lastName" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        :class="{'border-red-500': validationErrors.lastName}"
                                    >
                                    <p v-if="validationErrors.lastName" class="mt-1 text-sm text-red-600">{{ validationErrors.lastName }}</p>
                                </div>
                                <div>
                                    <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input 
                                        type="text" 
                                        id="firstName" 
                                        v-model="formData.firstName" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        :class="{'border-red-500': validationErrors.firstName}"
                                    >
                                    <p v-if="validationErrors.firstName" class="mt-1 text-sm text-red-600">{{ validationErrors.firstName }}</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="middleInitial" class="block text-sm font-medium text-gray-700">Middle Initial</label>
                                    <input 
                                        type="text" 
                                        id="middleInitial" 
                                        v-model="formData.middleInitial" 
                                        maxlength="1"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    >
                                </div>
                                <div>
                                    <label for="extensionName" class="block text-sm font-medium text-gray-700">Extension</label>
                                    <input 
                                        type="text" 
                                        id="extensionName" 
                                        v-model="formData.extensionName" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Jr, Sr, III"
                                    >
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                    <select 
                                        id="gender" 
                                        v-model="formData.gender" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        :class="{'border-red-500': validationErrors.gender}"
                                    >
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <p v-if="validationErrors.gender" class="mt-1 text-sm text-red-600">{{ validationErrors.gender }}</p>
                                </div>
                                <div>
                                    <label for="cpNumber" class="block text-sm font-medium text-gray-700">CP Number</label>
                                    <input 
                                        type="tel" 
                                        id="cpNumber" 
                                        v-model="formData.cpNumber" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="09123456789"
                                        :class="{'border-red-500': validationErrors.cpNumber}"
                                    >
                                    <p v-if="validationErrors.cpNumber" class="mt-1 text-sm text-red-600">{{ validationErrors.cpNumber }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-between">
                            <button 
                                type="button" 
                                @click="prevStep"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Back
                            </button>
                            <button 
                                type="button" 
                                @click="nextStep"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Continue
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Address Information -->
                    <div v-show="currentStep === 2" class="step-content">
                        <h2 class="text-xl font-bold text-gray-700 mb-4">Address Information</h2>
                        <div class="space-y-4">
                            <div>
                                <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                                <select 
                                    id="province" 
                                    v-model="formData.province" 
                                    @change="handleProvinceChange"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    :class="{'border-red-500': validationErrors.province}"
                                    :disabled="loadingProvinces"
                                >
                                    <option value="">Select Province</option>
                                    <option v-for="province in provinces" :key="province.code" :value="province.code">
                                        {{ province.name }}
                                    </option>
                                </select>
                                <p v-if="loadingProvinces" class="mt-1 text-sm text-blue-600">Loading provinces...</p>
                                <p v-if="validationErrors.province" class="mt-1 text-sm text-red-600">{{ validationErrors.province }}</p>
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">City/Municipality</label>
                                <select 
                                    id="city" 
                                    v-model="formData.city" 
                                    @change="handleCityChange"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    :class="{'border-red-500': validationErrors.city}"
                                    :disabled="!formData.province || loadingCities"
                                >
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
                                <select 
                                    id="brgy" 
                                    v-model="formData.brgy" 
                                    @change="handleBarangayChange"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    :class="{'border-red-500': validationErrors.brgy}"
                                    :disabled="!formData.city || loadingBarangays"
                                >
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
                            <button 
                                type="button" 
                                @click="prevStep"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Back
                            </button>
                            <button 
                                type="button" 
                                @click="nextStep"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Continue
                            </button>
                        </div>
                    </div>

                    <!-- Step 4: Institution Information -->
                    <div v-show="currentStep === 3" class="step-content">
                        <h2 class="text-xl font-bold text-gray-700 mb-4">Institution Information</h2>
                        <!-- Institution information content remains the same -->
                        <div class="space-y-4">
                            <div>
                                <label for="heiName" class="block text-sm font-medium text-gray-700">HEI Name</label>
                                <select 
                                    id="heiName" 
                                    v-model="formData.heiName" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    :class="{'border-red-500': validationErrors.heiName}"
                                >
                                    <option value="">Select HEI Name</option>
                                    <option v-for="hei in heiNames" :key="hei.value" :value="hei.value">
                                        {{ hei.label }}
                                    </option>
                                </select>
                                <p v-if="validationErrors.heiName" class="mt-1 text-sm text-red-600">{{ validationErrors.heiName }}</p>
                            </div>
                            <div>
                                <label for="constitutionCode" class="block text-sm font-medium text-gray-700">Constitution Code</label>
                                <select 
                                    id="constitutionCode" 
                                    v-model="formData.constitutionCode" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    :class="{'border-red-500': validationErrors.constitutionCode}"
                                >
                                    <option value="">Select Constitution Code</option>
                                    <option v-for="code in constitutionCodes" :key="code.value" :value="code.value">
                                        {{ code.label }}
                                    </option>
                                </select>
                                <p v-if="validationErrors.constitutionCode" class="mt-1 text-sm text-red-600">{{ validationErrors.constitutionCode }}</p>
                            </div>
                            <div>
                                <label for="typeHeis" class="block text-sm font-medium text-gray-700">Type of HEIS</label>
                                <select 
                                    id="typeHeis" 
                                    v-model="formData.typeHeis" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    :class="{'border-red-500': validationErrors.typeHeis}"
                                >
                                    <option value="">Select Type</option>
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                </select>
                                <p v-if="validationErrors.typeHeis" class="mt-1 text-sm text-red-600">{{ validationErrors.typeHeis }}</p>
                            </div>
                            <div>
                                <label for="programLevelCode" class="block text-sm font-medium text-gray-700">Program Level Code</label>
                                <select 
                                    id="programLevelCode" 
                                    v-model="formData.programLevelCode" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    :class="{'border-red-500': validationErrors.programLevelCode}"
                                >
                                    <option value="">Select Program Level Code</option>
                                    <option v-for="code in programLevelCodes" :key="code.value" :value="code.value">
                                        {{ code.label }}
                                    </option>
                                </select>
                                <p v-if="validationErrors.programLevelCode" class="mt-1 text-sm text-red-600">{{ validationErrors.programLevelCode }}</p>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-between">
                            <button 
                                type="button" 
                                @click="prevStep"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Back
                            </button>
                            <button 
                                type="submit" 
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </UserLayout>
</template>