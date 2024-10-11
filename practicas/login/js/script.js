document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const toggleIcon = document.getElementById('toggleIcon');
    const toggleConfirmIcon = document.getElementById('toggleConfirmIcon');

    function togglePasswordVisibility(inputField, icon) {
        const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
        inputField.setAttribute('type', type);
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    }

    togglePassword.addEventListener('click', function () {
        togglePasswordVisibility(password, toggleIcon);
    });

    toggleConfirmPassword.addEventListener('click', function () {
        togglePasswordVisibility(confirmPassword, toggleConfirmIcon);
    });

    // document.getElementById('registerForm').addEventListener('submit', function (event) {
    //     if (password.value !== confirmPassword.value) {
    //         event.preventDefault();
    //         alert('Las contraseñas no coinciden');
    //     }
    // });
});