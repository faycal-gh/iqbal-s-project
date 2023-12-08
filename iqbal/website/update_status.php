<?php
include_once "connect.php";

$id_student = $_POST['id_student'];
$new_status = $_POST['new_status'];

$sql = "UPDATE recours SET status = '$new_status' WHERE id_student = '$id_student'";
$result = $conn->query($sql);

if ($result) {
    echo "Status updated successfully";
} else {
    echo "Error updating status: " . $conn->error;
}

$conn->close();
?>
