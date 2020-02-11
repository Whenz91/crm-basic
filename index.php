<?php 
require_once "login.php";
require_once "error_handle.php";

if(isset($_POST['submit'])) {
    $email = strip_tags(strtolower(trim($_POST["email"])));
    $password = $_POST['password'];
    
    $Login = new Login();
    $Login->loginCheck($email, $password);
}
$ErrorHandle = new ErrorHandle();
?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belépés - HannaInstCRM</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-7 mx-auto py-5">
                <img src="https://hannainst.hu/image/catalog/hanna-logo-250x80-min.jpeg" alt="logo" class="mx-auto d-block">
            </div>

            <div class="col-7 mx-auto py-1">
                <?php 
                    if(isset($_GET['error'])) {
                        $ErrorHandle->errorLoginCheck($_GET['error']);
                    }
                    if(isset($_GET['message'])) {
                        $ErrorHandle->messageCheck($_GET['message']);
                    }                    
                ?>
            </div>

            <form method="POST" action="index.php" class="col-7 mx-auto">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Jelszó</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary">Belépés</button>
            </form>
        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>