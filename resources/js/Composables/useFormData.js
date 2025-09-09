import { reactive } from 'vue';

export const addressSelection = reactive({
    province: '',
    city: '',
    brgy: ''
});

export function useFormData(category) {
    return reactive({
        category: category,
        school_year: '',
        school_id: '',
        course: '',
        
        last_name: '',
        first_name: '',
        middle_initial: '',
        extension_name: '',
        gender: '',
        cp_number: '',
        
        province_name: '',
        city_name: '',
        brgy_name: '',
        
        hei_name: '',
        constitution_code: '',
        type_heis: '',
        program_level_code: ''
    });
}