<?php
session_start();

if(!isset($_SESSION['userName'])) {
    header("location: index.php?error=nologedin");
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
                <li class="nav-item active">
                    <a class="nav-link" href="dashbord.php">Főoldal <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profilom</a>
                </li>
                <?php
                    if($_SESSION['userRank'] == 1) {
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href="#">Új munkatárs felvétele</a>
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

    <header class="container py-5">
        <div class="row">
            <a href="#" class="btn btn-lg btn-primary" role="button" aria-pressed="true"><i class='fas fa-address-card'></i> Új ügyfél felvétele</a>
        </div>

        <div class="row">
            <form class="form-inline col-6 mx-auto my-3">
                <input class="form-control col-8 mr-sm-2" type="search" placeholder="Keresés" name="search" id="search" aria-label="Search">
                <button class="btn btn-outline-primary col-2 my-2 my-sm-0" type="submit" name="submitSearch" id="submitSearch">Keresés</button>
            </form>
        </div>
    </header>

    <main class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Cég</th>
                        <th scope="col">Kontakt</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">Email</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <a href="#" class="btn btn-success" role="button" aria-pressed="true"><i class='fas fa-edit'></i></a>
                            <a href="#" class="btn btn-danger" role="button" aria-pressed="true"><i class='fas fa-trash-alt'></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>
                            <a href="#" class="btn btn-success" role="button" aria-pressed="true"><i class='fas fa-edit'></i></a>
                            <a href="#" class="btn btn-danger" role="button" aria-pressed="true"><i class='fas fa-trash-alt'></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>