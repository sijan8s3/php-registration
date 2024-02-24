// main.js

function validateForm() {
    var name = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var phone = document.getElementById('phone').value.trim();
    var address = document.getElementById('address').value.trim();
    var dob = document.getElementById('dob').value.trim();
    var password = document.getElementById('password').value.trim();

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phoneRegex = /^[0-9]{10}$/; 
    var dobRegex = /^\d{4}-\d{2}-\d{2}$/;

    if (name === "") {
        alert('Please enter your name');
        return false;
    }

    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address');
        return false;
    }

    if (!phoneRegex.test(phone)) {
        alert('Please enter a valid 10-digit phone number');
        return false;
    }

    if (address === "") {
        alert('Please enter your address');
        return false;
    }

    if (dob === "" || !dobRegex.test(dob)) {
        alert('Please enter a valid date of birth in the format YYYY-MM-DD');
        return false;
    }

    if (password.length < 8) {
        alert('Password must be at least 8 characters long');
        return false;
    }

    // Add any additional validations for other fields here

    return true; 
}
