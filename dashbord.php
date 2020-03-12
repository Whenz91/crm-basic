<?php
include "view/header.php";
?>

    <?php include "view/nav.php"; ?>
    

    <header class="container py-5" id="dashbordHeader">
        <div class="row">
            <a href="customer.php" class="btn btn-lg btn-primary" role="button" aria-pressed="true"><i class="fas fa-user-plus"></i> Új ügyfél felvétele</a>
        </div>

        <div class="row">
            <div class="form-inline col-6 mx-auto my-3">
                <input class="form-control col-8 mr-sm-2" type="search" placeholder="Keresés" name="search" id="search" aria-label="Search">
                <button class="btn btn-outline-primary col-2 my-2 my-sm-0" type="submit" name="submitSearch" id="submitSearch">Keresés</button>
            </div>
        </div>
    </header>

    <main id="mainContent">
        <div class="container" id="messageBox"></div>
        <div class="container" id="customerCardDeck"></div>
        <div class="container-fluid" id="customerProfile"></div>
    </main>


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