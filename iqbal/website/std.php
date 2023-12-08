<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="sec1">
        <center>
            <form method="post" action="server.php" class="row g-3 needs-validation" novalidate>
            <?php
                include_once "connect.php";
                $sql = "SELECT MAX(id) AS max_id FROM students";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $nextMatricule = $row["max_id"] + 1;
                $conn->close();
                ?>

                <h1>Form Ajouter un Etudiant</h1>

                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Matricule</label>
                    <input type="text" class="form-control" id="validationCustom01" name="studentID" readonly value="<?php echo $nextMatricule; ?>" required>
                    <div class="valid-feedback"></div>
                </div>

                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="validationCustom01" name="first_name" required>
                    <div class="valid-feedback"></div>
                </div>

                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="validationCustom02" name="last_name" required>
                    <div class="valid-feedback"></div>
                </div>

                <div class="col-md-12">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>

                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label">Groupe</label>
                    <input type="text" class="form-control" id="validationCustom03" name="group" required>
                    <div class="valid-feedback"></div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Faire des Recours</button>
                </div>
            </form>
        </center>
    </div>
</body>

</html>
