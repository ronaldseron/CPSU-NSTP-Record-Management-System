import { router } from '@inertiajs/vue3';

export function useDeleteStudents(id) {
    if (!id) {
        alert('No student ID provided for deletion.');
        return;
    }
    if (confirm("Are you sure you want to delete the selected students?")) {
        router.delete(`/dashboard/students/${id}`);
    }
}