<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table layout</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto');
        * {
            margin: 0;
            padding: 0;
            outline: 0;
        }
        .filter {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            z-index: 1;
            background: rgb(233, 76, 161);
            background: -moz-linear-gradient(90deg, rgba(233, 76, 161, 1) 0%, rgba(199, 74, 233, 1) 100%);
            background: -webkit-linear-gradient(90deg, rgba(233, 76, 161, 1) 0%, rgba(199, 74, 233, 1) 100%);
            background: linear-gradient(90deg, rgba(233, 76, 161, 1) 0%, rgba(199, 74, 233, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#e94ca1", endColorstr="#c74ae9", GradientType=1);
            opacity: .7;
        }
        table {
            position: absolute;
            z-index: 2;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            border-collapse: collapse;
            border-spacing: 0;
            box-shadow: 0 2px 15px rgba(64, 64, 64, .7);
            border-radius: 12px 12px 0 0;
            overflow: hidden;
        }
        td, th {
            padding: 15px 20px;
            text-align: center;
        }
        th {
            background-color: #ba68c8;
            color: #fafafa;
            font-family: 'Open Sans', Sans-serif;
            font-weight: 200;
            text-transform: uppercase;
        }
        tr {
            width: 100%;
            background-color: #fafafa;
            font-family: 'Montserrat', sans-serif;
        }
        tr:nth-child(even) {
            background-color: #eeeeee;
        }
    </style>
</head>
<body>
    <div class="filter"></div>
    <table>
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Module</th>
            <th>Note affiche</th>
            <th>Note reel</th>
            <th>Status</th>
        </tr>

        <?php
        include_once "connect.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_student = $_POST["id_student"];
            $new_status = $_POST["new_status"];
            $new_status = $new_status === '1' ? '2' : '1';

            $update_sql = "UPDATE recours SET status = '$new_status' WHERE id_student = '$id_student'";
            $update_result = $conn->query($update_sql);

            if ($update_result) {
                echo "Status updated successfully";
                exit();
            } else {
                echo "Error updating status: " . $conn->error;
                exit();
            }
        }

        $select_sql = "SELECT recours.*, students.id, students.nom, students.prenom FROM recours
                JOIN students ON recours.id_student = students.id";
        $result = $conn->query($select_sql);

        if (!$result) {
            die("Error: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_student"] . "</td>";
                echo "<td>" . $row["nom"] . "</td>";
                echo "<td>" . $row["prenom"] . "</td>";
                echo "<td>" . $row["module"] . "</td>";
                echo "<td>" . $row["note_affiche"] . "</td>";
                echo "<td>" . $row["note_reel"] . "</td>";
                echo "<td>";
                echo '<button class="btn btn-success" onclick="toggleStatus(' . $row["id_student"] . ', this)">' . "Favorable" . "</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <script>
        function toggleStatus(id_student, button) {
            var currentStatus = button.innerText === "Favorable" ? 1 : 2;
            var newStatus = currentStatus === 1 ? 2 : 1;

            $.ajax({
                type: "POST",
                url: "update_status.php",
                data: { id_student: id_student, new_status: newStatus },
                success: function(response) {
                    if (response === "Status updated successfully") {
                        button.innerText = newStatus === 1 ? "Favorable" : "Defavorable";
                        button.classList.toggle("btn-success");
                        button.classList.toggle("btn-danger");
                    } else {
                        alert("Error updating status");
                    }
                },
                error: function() {
                    alert("Error updating status");
                }
            });
        }
    </script>
</body>
</html>