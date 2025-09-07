import { reactive } from 'vue';

export function useFormData(category) {
    return reactive({
        category: category,
        schoolYear: '',
        schoolId: '',
        course: '',
        
        lastName: '',
        firstName: '',
        middleInitial: '',
        extensionName: '',
        gender: '',
        cpNumber: '',
        
        province: '',
        city: '',
        brgy: '',
        provinceName: '',
        cityName: '',
        brgyName: '',
        
        heiName: '',
        constitutionCode: '',
        typeHeis: '',
        programLevelCode: ''
    });
}