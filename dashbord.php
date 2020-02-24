<?php
session_start();
require_once "error_handle.php";

if(!isset($_SESSION['userName'])) {
    header("location: index.php?error=nologedin");
}

include "view/header.php";
?>

    <?php include "view/nav.php"; ?>
    

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


<?php include "view/footer.php"; ?>