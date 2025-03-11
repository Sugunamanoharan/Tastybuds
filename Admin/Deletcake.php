<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch the image file name
    $sql = "SELECT image FROM cakes WHERE id=$id";
    $result = $conn->query($sql);
    $cake = $result->fetch_assoc();

    if ($cake) {
        // Delete image file
        $filePath = "uploads/" . $cake['image'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete database record
        $sql = "DELETE FROM cakes WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Cake deleted successfully!'); window.location='cake_list.php';</script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Cake not found.";
    }
}
?>
