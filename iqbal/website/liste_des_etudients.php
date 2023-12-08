<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h2>Search Page</h2>
    <form id="searchForm">
      <div class="form-group">
        <label for="searchInput">Search:</label>
        <input type="text" class="form-control" id="searchInput" placeholder="Enter search term">
      </div>
      <div class="form-group">
        <label>Select a property:</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="property" id="radioNom" value="nom" checked>
          <label class="form-check-label" for="radioNom">Nom</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="property" id="radioPrenom" value="prenom">
          <label class="form-check-label" for="radioPrenom">Prénom</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="property" id="radioEmail" value="email">
          <label class="form-check-label" for="radioEmail">Email</label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div id="searchResults" class="mt-4">
      <table class="table">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Groupe</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#searchForm').submit(function(event) {
        event.preventDefault();

        var searchTerm = $('#searchInput').val();
        var property = $('input[name=property]:checked').val();

        $.ajax({
          url: 'searchStudent.php',
          method: 'POST',
          data: {
            searchTerm: searchTerm,
            property: property
          },
          success: function(response) {
            $('#searchResults tbody').html(response);
          }
        });
      });
    });
  </script>
</body>

</html>