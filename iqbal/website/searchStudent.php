<?php
include_once "connect.php";
$searchTerm = $_POST['searchTerm'];
$property = $_POST['property'];
$stmt = $conn->prepare("SELECT nom, prenom, email, groupe FROM students WHERE $property = ?");
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo '<table class="table">';    
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['nom'] . '</td>';
        echo '<td>' . $row['prenom'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['groupe'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
} else {
    echo 'No results found.';
}

$stmt->close();
$conn->close();
?>