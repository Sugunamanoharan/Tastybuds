document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript Loaded!"); // Debugging line

    document.querySelector("form").addEventListener("submit", function (event) {
        console.log("Form submitted!"); // Debugging line

        if (!validateForm()) {
            console.log("Validation failed!"); // Debugging line
            event.preventDefault(); // Prevent form submission
        } else {
            console.log("Validation passed!"); // Debugging line
        }
    });
});

function validateForm() {
    var name = document.getElementById("name").value.trim();
    var password = document.getElementById("password").value.trim();

    console.log("Username:", name); // Debugging line
    console.log("Password:", password); // Debugging line

    // Regular Expressions for Validation
    const nameRegex = /^[a-zA-Z ]{1,30}$/; // Allows only alphabets & spaces (1-30 chars)
    const passwordRegex = /^.{8,}$/; // At least 8 characters of any type

    if (!nameRegex.test(name)) {
        alert("❌ Username is invalid. It should contain only alphabets (max 30 characters).");
        return false;
    }

    if (!passwordRegex.test(password)) {
        alert("❌ The password must be at least 8 characters long.");
        return false;
    }

    alert("✅ Form submitted successfully!");
    return true;
}
