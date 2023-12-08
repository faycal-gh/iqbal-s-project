<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "isil";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function executeQuery($sql) {
    global $conn;
    $result = $conn->query($sql);
    return $result;
}

function closeConnection() {
    global $conn;
    $conn->close();
}
?>
