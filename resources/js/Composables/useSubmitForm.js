export function useSubmitForm(validateCurrentStep, formData, validationErrors) {
    return async () => {
        if (validateCurrentStep()) {
            try {
                const response = await fetch('/form-registration', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(formData)
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