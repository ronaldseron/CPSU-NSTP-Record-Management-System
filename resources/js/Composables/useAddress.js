import { ref } from 'vue';
import axios from 'axios';

export function useAddress() {
    // State
    const provinces = ref([]);
    const cities = ref([]);
    const barangays = ref([]);
    const loadingProvinces = ref(false);
    const loadingCities = ref(false);
    const loadingBarangays = ref(false);

    // Helper for sorting by name
    const sortByName = arr => arr.sort((a, b) => a.name.localeCompare(b.name));

    // Fetchers
    const fetchProvinces = async () => {
        loadingProvinces.value = true;
        try {
            const { data } = await axios.get('https://psgc.cloud/api/provinces');
            provinces.value = sortByName(data);
        } catch (error) {
            console.error('Error fetching provinces:', error);
        } finally {
            loadingProvinces.value = false;
        }
    };

    const fetchCities = async provinceCode => {
        if (!provinceCode) return;
        loadingCities.value = true;
        cities.value = [];
        barangays.value = [];
        try {
            const { data } = await axios.get(`https://psgc.cloud/api/provinces/${provinceCode}/cities-municipalities`);
            cities.value = sortByName(data);
        } catch (error) {
            console.error('Error fetching cities:', error);
        } finally {
            loadingCities.value = false;
        }
    };

    const fetchBarangays = async cityCode => {
        if (!cityCode) return;
        loadingBarangays.value = true;
        barangays.value = [];
        try {
            const { data } = await axios.get(`https://psgc.cloud/api/cities-municipalities/${cityCode}/barangays`);
            barangays.value = sortByName(data);
        } catch (error) {
            console.error('Error fetching barangays:', error);
        } finally {
            loadingBarangays.value = false;
        }
    };

    // Return everything needed
    return {
        provinces,
        cities,
        barangays,
        loadingProvinces,
        loadingCities,
        loadingBarangays,
        fetchProvinces,
        fetchCities,
        fetchBarangays,
    };
}