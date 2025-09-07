import { ref, computed } from 'vue'

const totalSteps = 4;

export const currentStep = ref(0);

export const progressWidth = computed(() => {
    return `${((currentStep.value + 1) / totalSteps) * 100}%`;
});

export function useNextStep(validateCurrentStep) {
    return () => {
        if (validateCurrentStep()) {
            if (currentStep.value < totalSteps - 1) {
                currentStep.value++;
            }
        }
    };
};

export const prevStep = () => {
    if (currentStep.value > 0) {
        currentStep.value--;
    }
};

export const getStepLabelClass = (step) => {
    let baseClasses = 'text-sm font-medium';
    
    if (step === currentStep.value) {
        return `${baseClasses} text-blue-600`;
    } else if (step < currentStep.value) {
        return `${baseClasses} text-green-600`;
    } else {
        return `${baseClasses} text-gray-400`;
    }
};