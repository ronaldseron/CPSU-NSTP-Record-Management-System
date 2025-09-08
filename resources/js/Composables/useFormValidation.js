export function useFormValidation(formData, currentStep, validationErrors) {
    return () => {
        Object.keys(validationErrors).forEach(key => delete validationErrors[key]);
        let isValid = true;

        if (currentStep.value === 0) {
            // Validate School Information
            if (!formData.school_year) {
                validationErrors.school_year = 'School Year is required';
                isValid = false;
            }
            if (!formData.school_id) {
                validationErrors.school_id = 'School ID No. is required';
                isValid = false;
            }
            if (!formData.course) {
                validationErrors.course = 'Course is required';
                isValid = false;
            }
        } else if (currentStep.value === 1) {
            // Validate Personal Information
            if (!formData.last_name) {
                validationErrors.last_name = 'Last Name is required';
                isValid = false;
            }
            if (!formData.first_name) {
                validationErrors.first_name = 'First Name is required';
                isValid = false;
            }
            if (!formData.gender) {
                validationErrors.gender = 'Gender is required';
                isValid = false;
            }
            if (!formData.cp_number) {
                validationErrors.cp_number = 'CP Number is required';
                isValid = false;
            }
        } else if (currentStep.value === 2) {
            // Validate Address Information
            if (!formData.province_name) {
                validationErrors.province_name = 'Province is required';
                isValid = false;
            }
            if (!formData.city_name) {
                validationErrors.city_name = 'City is required';
                isValid = false;
            }
            if (!formData.brgy_name) {
                validationErrors.brgy_name = 'Barangay is required';
                isValid = false;
            }
        } else if (currentStep.value === 3) {
            // Validate Institution Information
            if (!formData.hei_name) {
                validationErrors.hei_name = 'HEI Name is required';
                isValid = false;
            }
            if (!formData.constitution_code) {
                validationErrors.constitution_code = 'Constitution Code is required';
                isValid = false;
            }
            if (!formData.type_heis) {
                validationErrors.type_heis = 'Type of HEIS is required';
                isValid = false;
            }
            if (!formData.program_level_code) {
                validationErrors.program_level_code = 'Program Level Code is required';
                isValid = false;
            }
        }

        return isValid;
    }

};