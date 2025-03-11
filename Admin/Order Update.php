<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM Bookingdetails WHERE id=$id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $username = $conn->real_escape_string($_POST['username']);
    $cakename = $conn->real_escape_string($_POST['cakename']);
    $description = $conn->real_escape_string($_POST['description']);
    $quantity = $conn->real_escape_string($_POST['quantity']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $deliverydate = $conn->real_escape_string($_POST['deliverydate']);



    $sql = "UPDATE Bookingdetails SET username='$username',cakename='$cakename', description='$description', quantity='$quantity', phone='$phone', deliverydate='$deliverydate'WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location:Order Read.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update Booking Form</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
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
    <form action="Order Update.php" method="POST" onsubmit="return validateForm()">
        
    <div class="input-group">
        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user['id'];?>" placeholder="Username">
        </div><br>
    
        <div class="input-group">
        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username'];?>" placeholder="Username">
        </div><br>

    
        <div class="input-group">
        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input type="text" class="form-control" id="cakename" name="cakename" placeholder="Cake Name" value="<?php echo $user['cakename'];?>">
        </div><br>

        <div class="input-group">
            <textarea name="description" class="form-control" placeholder="Description" id="description"value="<?php echo $user['description'];?>"></textarea>
        </div> <br>

        <div class="input-group">
            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="<?php echo $user['quantity'];?>">
        </div><br>

        
        <div class="input-group">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No" value="<?php echo $user['phone'];?>">
        </div><br>

    
        <div class="input-group">
            <input type="date" class="form-control" id="date" name="deliverydate" placeholder="Delivery date" value="<?php echo $user['deliverydate'];?>">
        </div><br>

        <button type="submit" class="btn btn-login">Update</button>

    </form>
</div>

<!-- JavaScript for Form Validation -->
<script>
    /*
    function validateForm() {
    var username = document.getElementById("username").value.trim();
    var cakeName = document.getElementById("cake_name").value.trim();
    var description = document.getElementById("description").value.trim();
    var quantity = document.getElementById("quantity").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var date = document.getElementById("date").value.trim();

    const phoneRegex = /^[0-9]{10}$/; // Ensures exactly 10 digits
    const quantityRegex = /^[1-9][0-9]*$/; // Ensures quantity is a positive number

    if (username === "" || cakeName === "" || description === "" || quantity === "" || phone === "" || date === "") {
        alert("❌ All fields are required!");
        return false;
    }

    if (!quantityRegex.test(quantity)) {
        alert("❌ Quantity must be a positive number.");
        return false;
    }

    if (!phoneRegex.test(phone)) {
        alert("❌ Phone number must be exactly 10 digits.");
        return false;
    }

    alert("✅ Form submitted successfully!");
    return true;
}*/

</script>

</body>
</html>


