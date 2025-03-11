document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript Loaded!"); // Debugging line

    document.querySelector("form").addEventListener("submit", function (event) {
        console.log("Form submitted!"); // Debugging line

        if (!validateForm()) {
            console.log("Validation failed!"); // Debugging line
             // Prevent form submission
        } else {
            console.log("Validation passed!"); // Debugging line
            alert("✅ Login Successful! Redirecting to Login page...");

            // 🔹 Delay redirection so user sees the success message
            setTimeout(function () {
                window.location.href = "Login.php"; // Ensure this path is correct
            }, 1500);

            // Prevent actual form submission
            event.preventDefault();
        }
    });
});


    
    function validateForm() {
        var username = document.getElementById("username").value.trim();
        var email = document.getElementById("email").value.trim();
        var password = document.getElementById("password").value.trim();
        var phone = document.getElementById("phone").value.trim();
       

        const nameRegex = /^[a-zA-Z ]{1,30}$/;
        const emailRegex =  /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const passwordRegex = /^.{8,}$/;
        const phoneRegex = /^[0-9]{10}$/;
        

        if (!nameRegex.test(username)) {
            alert("❌ Username is invalid. It should contain only alphabets (max 30 characters).");
            return false;
        }
        if (!emailRegex.test(email)) {
            alert("❌ Please enter a valid email .");
            return false;
        }
        if (!passwordRegex.test(password)) {
            alert("❌ Password must be at least 8 characters long.");
            return false;
        }
        
        if (!phoneRegex.test(phone)) {
            alert("❌ Phone number must be exactly 10 digits.");
            return false;
        }
        
        return true;
    }