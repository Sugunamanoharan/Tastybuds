<?php
// read.php
require 'config.php';

$sql = "SELECT id, username, email, phone FROM register";
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
    <h2> Register User List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                        <a href="Reg Update.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                        <a href="Reg Delete.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No users found.</td>
            </tr>
        <?php endif; ?>
    </table>
    <br>
    <a href=" Create Register.php">Add New User</a>
</body>
</html>
