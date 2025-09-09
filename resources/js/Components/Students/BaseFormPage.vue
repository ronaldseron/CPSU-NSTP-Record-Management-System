<script setup>
import SchoolStep from '@/Components/Students/SchoolStep.vue';
import PersonalStep from '@/Components/Students/PersonalStep.vue';
import AddressStep from '@/Components/Students/AddressStep.vue';
import InstitutionStep from '@/Components/Students/InstitutionStep.vue';
import { reactive, onMounted } from 'vue';
import { heiNames, constitutionCodes, programLevelCodes } from '@/Constants/institutions';
import { useAddress } from '@/Composables/useAddress';
import { useFormValidation } from '@/Composables/useFormValidation';
import { addressSelection, useFormData } from '@/Composables/useFormData';
import { currentStep, useNextStep, prevStep } from '@/Composables/useStepProgress';
import { useSubmitForm } from '@/Composables/useSubmitForm';

const props = defineProps({
    category: String
});

// Form data
const formData = useFormData(props.category);

const validationErrors = reactive({});

const {
    provinces,
    cities,
    barangays,
    loadingProvinces,
    loadingCities,
    loadingBarangays,
    fetchProvinces,
    fetchCities,
    fetchBarangays,
} = useAddress();

// Validation of Form
const validateCurrentStep = useFormValidation(formData, currentStep, validationErrors);

// Next Step
const nextStep = useNextStep(validateCurrentStep);

// Submission of Data
const submitForm = useSubmitForm(validateCurrentStep, formData, validationErrors);

// Handle province selection
const handleProvinceChange = async (event) => {
    const provinceCode = event.target.value;
    console.log(provinceCode);
    if (provinceCode) {
        const selectedProvince = provinces.value.find(p => p.code === provinceCode);
        formData.province_name = selectedProvince ? selectedProvince.name : '';
        await fetchCities(provinceCode);
    }
    
    formData.city_name = '';
};

// Handle city selection
const handleCityChange = async (event) => {
    const cityCode = event.target.value;
    if (cityCode) {
        const selectedCity = cities.value.find(c => c.code === cityCode);
        formData.city_name = selectedCity ? selectedCity.name : '';
        await fetchBarangays(cityCode);
    }
    
    formData.brgy_name = '';
};

// Handle barangay selection
const handleBarangayChange = (event) => {
    const barangayCode = event.target.value;
    if (barangayCode) {
        const selectedBarangay = barangays.value.find(b => b.code === barangayCode);
        formData.brgy_name = selectedBarangay ? selectedBarangay.name : '';
    }
};

onMounted(async () => {
    await fetchProvinces();
});
</script>

<template>
    <form @submit.prevent="submitForm">
        <SchoolStep
            v-if="currentStep === 0"
            :formData="formData"
            :validationErrors="validationErrors"
            :nextStep="nextStep"
        />
        <PersonalStep
            v-if="currentStep === 1"
            :formData="formData"
            :validationErrors="validationErrors"
            :nextStep="nextStep"
            :prevStep="prevStep"
        />
        <AddressStep
            v-if="currentStep === 2"
            :formData="formData"
            :validationErrors="validationErrors"
            :provinces="provinces"
            :cities="cities"
            :barangays="barangays"
            :loadingProvinces="loadingProvinces"
            :loadingCities="loadingCities"
            :loadingBarangays="loadingBarangays"
            :handleProvinceChange="handleProvinceChange"
            :handleCityChange="handleCityChange"
            :handleBarangayChange="handleBarangayChange"
            :nextStep="nextStep"
            :prevStep="prevStep"
            :addressSelection="addressSelection"
        />
        <InstitutionStep
            v-if="currentStep === 3"
            :formData="formData"
            :validationErrors="validationErrors"
            :heiNames="heiNames"
            :constitutionCodes="constitutionCodes"
            :programLevelCodes="programLevelCodes"
            :prevStep="prevStep"
        />
    </form>
</template>