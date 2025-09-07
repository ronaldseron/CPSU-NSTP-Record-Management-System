export function useFormValidation(formData, currentStep, validationErrors) {
    return () => {
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
    }

};