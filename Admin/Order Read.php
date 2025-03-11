<?php

require 'config.php';

$sql = "SELECT id, username, cakename, description, quantity, phone, deliverydate FROM Bookingdetails";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Users</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h2 {
    color:rgb(191, 149, 230);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background-color: rgb(191, 149, 230);
    color: white;
}

.delete{
    padding: 8px 12px;
    margin: 5px;
    text-decoration: none;
    color: white;
    background-color: rgb(245, 76, 15);
    border: none;
    cursor: pointer;
}
.edit{
    padding: 8px 12px;
    margin: 5px;
    text-decoration: none;
    color: white;
    background-color: rgb(68, 197, 115);
    border: none;
    cursor: pointer;
}

</style>

</head>
<body>
    <h2> Order List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Cakename</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Phone</th>
            <th>Deliverydate</th>
            <th>Actions</th>
        </tr>
            <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['cakename']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['deliverydate']; ?></td>

                    <td >
                        <a href="Order Update.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                        <a href="Order Delete.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="8">No users found.</td>
            </tr>
        <?php endif; ?>
    </table>
    <br>
    <a href="Create Order.php">Add New User</a>
</body>
</html>
