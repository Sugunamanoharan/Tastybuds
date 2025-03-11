<?php
include 'config.php';

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
        header("Location:  Order Read.php");
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
   <style>
    body {
    background-color: rgba(237, 188, 214, 0.8);
    font-family: 'Roboto', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.login-container {
    width: 350px;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    height:390px;
}
.login-container h2 {
    text-align: center;
    margin-bottom: 20px;
}
.input-group {
    margin-bottom: 15px;
    width: 100%;
    max-width: 300px;
    margin: auto;
}
.btn-login {
    width: 100%;
    background-color: rgb(231, 200, 225);
    border: none;
    padding: 10px;
    cursor: pointer;
}
.btn-login:hover {
    background-color: rgb(227, 153, 212);
}
   </style> 
    
</head>
<body>

<div class="login-container">
    <h2>For Booking</h2>
    <form action="Order Read.php" method="POST" onsubmit="return validateForm()">

    
        <div class="input-group">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" >
        </div><br>

        
        <div class="input-group">
            <input type="text" class="form-control" id="cakename" name="cakename" placeholder="Cake Name" >
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
