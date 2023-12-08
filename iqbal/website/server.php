<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "isil";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["first_name"])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $group = $_POST["group"];

        $sql = "INSERT INTO students (nom, prenom, email, groupe) VALUES ('$first_name', '$last_name', '$email', '$group')";

        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST["studentID"])) {

        $matricule = $_POST["studentID"];
        $module = $_POST["module"];
        $nature = $_POST["nature"];
        $noteAffiche = $_POST["note-affiche"];
        $noteReel = $_POST["note-reel"];
        
        $recoursSql = "INSERT INTO recours (id_student, module, nature, note_affiche, note_reel) VALUES ('$matricule', '$module', '$nature', '$noteAffiche', '$noteReel')";
        if ($conn->query($recoursSql) === TRUE) {
            echo "Recours record inserted successfully";
        } else {
            echo "Error: " . $recoursSql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
