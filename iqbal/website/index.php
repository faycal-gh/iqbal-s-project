<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="sec1">
    <img src="./imgg/jj.png" alt="" width=100px>
    <div class="first">
   <h1 style="color: antiquewhite;"> gestion de recours</h1>
    
    </div>
    <center>
        <form id="loginForm" onsubmit="redirectToPage(); return false;">
            <div class="mb-3">
                <label class="form-label">Login As</label>
                <select class="form-control" id="loginType">
                    <option value="admin">Admin</option>
                    <option value="student">Student</option>
                </select>
            </div>
            <button type="submit" class="form-label">Login</button>
        </form>
    </center>
    <script>
        function redirectToPage() {
            var selectedValue = document.getElementById("loginType").value;             
             if (selectedValue === "admin") {
                window.location.href = "admin.php"; 
            } else if (selectedValue === "student") {
                window.location.href = "std.php"; // Remplacez "page_student.html" par l'URL de la page Student
            }
        }
</script>

</div>
</body>
</html>