function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

export function useSubmitForm(validateCurrentStep, formData, validationErrors) {
    return async () => {
        if (validateCurrentStep()) {
            try {
                await fetch('/sanctum/csrf-cookie', { credentials: 'include' });

                // Get CSRF token from cookie
                const csrfToken = getCookie('XSRF-TOKEN');

                console.log(formData);

                const response = await fetch('/api/form-registration', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-XSRF-TOKEN': decodeURIComponent(csrfToken) // <-- Add this header
                    },
                    body: JSON.stringify(formData),
                    credentials: 'include'
                });

                const data = await response.json();

                if (response.ok) {
                    console.log('Form submitted successfully:', data);
                } else if (data.errors) {
                    Object.keys(data.errors).forEach(key => {
                        validationErrors[key] = data.errors[key][0];
                    });
                } else {
                    alert('An error occurred while submitting the form.');
                }
            } catch (error) {
                console.error('Error submitting form:', error);
                alert('An error occurred while submitting the form.');
            }
        }
    };
}