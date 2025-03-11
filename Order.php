<?php
include 'Admin/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $username = trim($_POST['username']);
    $cakename = trim($_POST['cakename']);
    $description = trim($_POST['description']);
    $quantity = intval($_POST['quantity']);
    $phone = trim($_POST['phone']);
    $deliverydate = trim($_POST['deliverydate']);

    // Prepare the SQL statement using prepared statements
    $stmt = $conn->prepare("INSERT INTO Bookingdetails (username, cakename, description, quantity, phone, deliverydate) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("❌ Error preparing statement: " . $conn->error);
    }

    // Bind parameters with appropriate data types
    $stmt->bind_param("sssiss", $username, $cakename, $description, $quantity, $phone, $deliverydate);

    // Execute the statement
    if ($stmt->execute()) {
        $newBookingId = $conn->insert_id;  // Get the last inserted ID
        header("Location: Invoice.php?bookingId=" . $newBookingId);
        exit();
    } else {
        die("❌ Error executing statement: " . $stmt->error);
    }

    // Close the statement
    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Order.css">
    

<body>

<div class="login-container">
    <h2>For Booking</h2>
    <form action="Order.php" method="POST" onsubmit="return validateForm()">

    
        <div class="input-group">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" >
        </div><br>

        
        <div class="input-group">
    
    <select class="form-control" id="cakename" name="cakename" onchange="updatePrice()">
        <option value="" data-price="0">Select Cake</option>
        <option value="Chocolate Cake" data-price="600">Chocolate Cake </option>
        <option value="Cofee Cake" data-price="600">Cofee Cake </option>
        <option value="Oreo Cake" data-price="600">Oreo Cake </option>

        <option value="Strawberry Cake" data-price="550">Strawberry Cake </option>
        <option value="Blueberry Cake" data-price="600">Blueberry Cake </option>
        <option value="Eggless Fruit Cake" data-price="600">Eggless Fruit Cake </option>

        <option value="Gulab Jamun Cake" data-price="600">Gulab Jamun Cake </option>
        <option value="Rasamalai Cake" data-price="600">Rasamalai Cake </option>
        <option value="Rosemilk Cake" data-price="600">Rosemilk Cake </option>

        <option value="Black forest Cake" data-price="600">Black forest Cake </option>
        <option value="Red Velvet Cake" data-price="600">Red Velvet Cake </option>
        <option value="White forest Cake" data-price="600">White forest Cake </option>

        <option value="Cream Cake" data-price="500">Cream Cake</option>
        <option value="Butterscotch Cake" data-price="500">Butterscotch Cake</option>
        <option value="Vanilla Cake" data-price="500">Vanilla Cake</option>
    </select>
</div><br>




    
        <div class="input-group">
            <textarea name="description" class="form-control" placeholder="Cake Description" id="description" ></textarea>
        </div> <br>


        <div class="input-group">
            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity in kg" >
        </div><br>

        
        <div class="input-group">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No" >
        </div><br>

        
        <div class="input-group">
            <input type="date" class="form-control" id="date" name="deliverydate" placeholder="Delivery Date" >
        </div><br>


        <button type="submit" class="btn btn-login">Submit</button>

    </form>
</div>

<script src="JS/Order.js">
</script>

</body>
</html>
