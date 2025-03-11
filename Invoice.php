


<?php
// Include the configuration file
include 'Admin/config.php';

// Check if the "bookingId" key exists
if (isset($_GET['bookingId'])) {
    $bookingId = $_GET['bookingId'];

    // Retrieve the booking details from the database
    $stmt = $conn->prepare("SELECT * FROM Bookingdetails WHERE id = ?");
    $stmt->bind_param("i", $bookingId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query returned results
    if ($result && $result->num_rows > 0) {
        $bookingDetails = $result->fetch_assoc();

        // Calculate the total cost
        $totalCost = $bookingDetails['quantity'] * 500;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .invoice-container {
            width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            background-color: #f0f0f0;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .invoice-details {
            padding: 20px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .invoice-table th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h2>Invoice Bill</h2>
        </div>
        <div class="invoice-details">
            <?php if (isset($bookingDetails)) { ?>
                <p>Booking ID: <?php echo $bookingDetails['id']; ?></p>
                <p>Username: <?php echo $bookingDetails['username']; ?></p>
                <p>Cake Name: <?php echo $bookingDetails['cakename']; ?></p>
                <p>Description: <?php echo $bookingDetails['description']; ?></p>
                <p>Quantity: <?php echo $bookingDetails['quantity']; ?> kg</p>
                <p>Phone No: <?php echo $bookingDetails['phone']; ?></p>
                <p>Delivery Date: <?php echo $bookingDetails['deliverydate']; ?></p>
            <?php } else { ?>
                <p>No booking details found for the given ID.</p>
            <?php } ?>
        </div>
        <table class="invoice-table">
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
            </tr>
            <?php if (isset($bookingDetails)) { ?>
                <tr>
                    <td>Cake</td>
                    <td><?php echo $bookingDetails['quantity']; ?> kg</td>
                    <td>500/- per kg</td>
                    <td><?php echo $totalCost; ?>/-</td>
                </tr>
                <tr>
                    <th colspan="3">Total</th>
                    <th><?php echo $totalCost; ?>/-</th>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
