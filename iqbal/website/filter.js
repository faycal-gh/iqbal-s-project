function searchStudents() {
    var nom = $("#searchBar-Nom").val();
    var prenom = $("#searchBar-Prenom").val();
    var email = $("#searchBar-Email").val();
    var groupe = $("#searchBar-Groupe").val();

    // Make an Ajax request
    $.ajax({
        type: "POST",
        url: "searchStudent.php",
        data: {
            search: true,
            nom: nom,
            prenom: prenom,
            email: email,
            groupe: groupe
        },
        success: function (response) {
            $("#studentList").html(response);
        }
    });
}
