<?php
session_start();

if(!isset($_SESSION['userName'])) {
    header("location: index.php?error=nologedin");
}

include "view/header.php";
?>

    <?php include "view/nav.php"; ?>

    <main class="container mt-3">
        <button type="button" id="addUser" class="btn btn-primary" data-toggle="modal" data-target="#userModal">
            Új munkatárs felvétele
        </button>

        <hr>

        <div class="row mt-5 row-cols-1 row-cols-md-3 row-cols-lg-4" id="usersCardDeck"></div>

    </main>


    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalTitle">Új munkatárs felvétele</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="userForm">
                        <input type="text" class="d-none" id="hiddenId" value="">
                        <div class="form-group">
                            <label for="name">Teljes név</label>
                            <input type="text" class="form-control" id="name" name="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email cím</label>
                            <input type="email" class="form-control" id="email" name="email" value="">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefonszám</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="">
                        </div>
                        <div class="form-group">
                            <label for="location">Város</label>
                            <input type="text" class="form-control" id="location" name="location" value="">
                        </div>
                        <div class="form-group">
                            <label for="password">Jelszó</label>
                            <input type="password" class="form-control" id="password" name="password" value="">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" id="showPass" aria-label="Checkbox for following text input">
                                </div>
                            </div>
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ablak bezárása</button>
                    <button type="button" id="create" class="btn btn-primary">Munkatárs felvétele</button>
                    <button type="button" id="update" class="btn btn-primary d-none">Adatok módosítása</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom confirmation window -->
    <div id="customConfirmation" class="shadow-lg">
        <h3 class="confirm-title"></h3>
        <p class="confirm-message"></p>
        <div class="text-center my-3">
            <button class="btn btn-danger" id="yes">Igen</button>
            <button class="btn btn-secondary" id="no">Nem</button>
        </div>
    </div>

<?php include "view/footer.php"; ?>