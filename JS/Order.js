function validateForm() {
    var username = document.getElementById("username").value.trim();
    var cakeName = document.getElementById("cakename").value.trim();
    var description = document.getElementById("description").value.trim();
    var quantity = document.getElementById("quantity").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var date = document.getElementById("date").value.trim();

    const phoneRegex = /^[0-9]{10}$/; // Ensures exactly 10 digits
    const quantityRegex = /^[1-9]\d*$/; // Ensures quantity is a positive number (no zero)

    if (!username || !cakeName || !description || !quantity || !phone || !date) {
        alert("❌ All fields are required!");
        return false;
    }

    if (cakeName === "") {
        alert("❌ Please select a cake.");
        return false;
    }

    if (!quantityRegex.test(quantity)) {
        alert("❌ Quantity must be a positive number (1 or more).");
        return false;
    }

    if (!phoneRegex.test(phone)) {
        alert("❌ Phone number must be exactly 10 digits.");
        return false;
    }

    alert("✅ Form submitted successfully!");
    return true;
}

// ✅ Move updatePrice() OUTSIDE of validateForm()
function updatePrice() {
    var select = document.getElementById("cakename");
    var price = select.options[select.selectedIndex].getAttribute("data-price");
    document.getElementById("price_per_kg").value = price;
}
