<?php
session_start();
require_once "add.php";

if(!isset($_SESSION['userName'])) {
    header("location: index.php?error=nologedin");
}
if(isset($_POST['submit'])) {
    $name = strip_tags($_POST["name"]);
    $email = strip_tags(strtolower(trim($_POST["email"])));
    $phone = strip_tags($_POST["phone"]);
    $location = strip_tags($_POST["city"]);
    $password = $_POST["password"];
    $rank = $_POST["userRank"];
    
    $AddUser = new Add();
    $AddUser->addUser($name, $email, $phone, $location, $password, $rank);
}

?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6c09380308.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Főoldal - HannaInstCRM</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="https://hannainst.hu/image/catalog/hanna-logo-250x80-min.jpeg" width="125" height="40" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashbord.php">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profilom</a>
                </li>
                <?php
                    if($_SESSION['userRank'] == 1) {
                        echo '
                        <li class="nav-item active">
                            <a class="nav-link" href="registration.php">Új munkatárs felvétele <span class="sr-only">(current)</span></a>
                        </li>
                        ';
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Kilépés</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container mt-3">
        <form method="POST" action="" class="col-8 mx-auto">
            <div class="form-group">
                <label for="name">Teljes név</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email cím</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Telefonszám</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="city">Város</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="form-group">
                <label for="password">Jelszó</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="userRank" id="admin" value="1" checked>
                <label class="form-check-label" for="admin">Admin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="userRank" id="trader" value="2">
                <label class="form-check-label" for="trader">Kereskedő</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="userRank" id="mechanic" value="3">
                <label class="form-check-label" for="mechanic">Szervizes</label>
            </div>
            <small class="form-text text-muted">
                Az Admin rank a legmagasabb és mindent megtehet. A kereskedő és a szervizes korlátozott jogokkal rendelkezik.
            </small>
            <br>
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Munkatárs felvétele</button>
        </form>
    </main>
    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>