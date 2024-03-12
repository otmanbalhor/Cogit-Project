document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        const requiredFields = ['firstname', 'lastname', 'email', 'password', 'phone'];
        let isValid = true;

        requiredFields.forEach(function (fieldName) {
            const inputField = document.querySelector(`[name="${fieldName}"]`);
            const value = inputField.value.trim();

            if (value === '') {
                alert(`Please enter a value for ${fieldName}`);
                isValid = false;
            }
        });

        return isValid;
    }
});