<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Formulaire de recours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="sec1">
    <div class="container mt-5">
        <center>
            <h1>Formulaire de recours</h1>
        </center>
        

        <form method="post" action="server.php">            
            <div class="mb-3">
                <label for="studentID" class="form-label">Matricule</label>
                <input type="text" class="form-control" name="studentID" id="studentID" required>
            </div>
            <div class="mb-3">
                <label for="module" class="form-label">Module</label>
                <input type="text" class="form-control" name="module" id="module" required>
            </div>
            <div class="mb-3">
                <label for="nature" class="form-label">Nature</label>
                <select class="form-select" aria-label="Disabled select example" name="nature" id="nature" required>
                    <option selected>Selectionner la Nature</option>
                    <option value="CC">CC</option>
                    <option value="Examen">Examen</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="note-affiche" class="form-label">Note Affiche</label>
                <input type="text" class="form-control" name="note-affiche" id="note-affiche" required>
            </div>
            <div class="mb-3">
                <label for="note-reel" class="form-label">Note réel</label>
                <input type="text" class="form-control" name="note-reel" id="note-reel" required>
                <input type="submit" value="Envoyer" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
</body>
</html>