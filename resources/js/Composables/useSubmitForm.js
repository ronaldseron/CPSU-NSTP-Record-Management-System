function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

export function useSubmitForm(validateCurrentStep, formData, validationErrors) {
    return async () => {
        if (!validateCurrentStep()) return;

        try {
            await fetch('/sanctum/csrf-cookie', { credentials: 'include' });

            const csrfToken = getCookie('XSRF-TOKEN');

            const response = await fetch('/api/form-registration', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-XSRF-TOKEN': decodeURIComponent(csrfToken)
                },
                body: JSON.stringify(formData),
                credentials: 'include'
            });

            const data = await response.json();

            if (response.ok) {
                console.log('Form submitted successfully:', data);
            } else if (data.errors) {
                Object.entries(data.errors).forEach(([key, messages]) => {
                    validationErrors[key] = messages[0];
                });
            } else {
                alert('An error occurred while submitting the form.');
            }
        } catch (error) {
            console.error('Error submitting form:', error);
            alert('An error occurred while submitting the form.');
        }
    };
}