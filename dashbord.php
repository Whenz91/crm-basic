<?php
include "view/header.php";
?>

    <?php include "view/nav.php"; ?>
    

    <header class="container py-5">
        <div class="row">
            <a href="customer.php" class="btn btn-lg btn-primary" role="button" aria-pressed="true"><i class="fas fa-user-plus"></i> Új ügyfél felvétele</a>
        </div>

        <div class="row">
            <form class="form-inline col-6 mx-auto my-3">
                <input class="form-control col-8 mr-sm-2" type="search" placeholder="Keresés" name="search" id="search" aria-label="Search">
                <button class="btn btn-outline-primary col-2 my-2 my-sm-0" type="submit" name="submitSearch" id="submitSearch">Keresés</button>
            </form>
        </div>
    </header>

    <main class="container">
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
        <div class="col mb-4">
            <div class="card h-100">
                <div class="card-header"><i class="fas fa-circle text-success" title="Aktív"></i> Cég neve</div>
                <div class="card-body">
                    <h5 class="card-title">Kontakt személy neve</h5>
                    <p class="card-text"><i class="fas fa-industry"></i> Iparág</p>
                    <p class="card-text"><i class='fas fa-city'></i> Város</p>
                    <p class="card-text"><i class="fas fa-briefcase"></i> Poziciója</p>
                    <p class="card-text"><i class='fas fa-phone'></i> Telefonszáma</p>
                    <p class="card-text"><i class='fas fa-envelope'></i> Email címe</p>
                    <p class="card-text"></p>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary mr-2 show-customer" data-id="" title="Adatok megtekintése"><i class="fas fa-user"></i></i></button>
                    <button type="button" class="btn btn-success edit-customer" data-id="" title="Adatok szerkesztése"><i class="fas fa-user-edit"></i></button>
                    <button type="button" class="btn btn-danger ml-2 delete-customer" data-id="" title="Adatok törlése"><i class="fas fa-user-minus"></i></button>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <div class="card-header"><i class="fas fa-circle text-danger" title="Passzív"></i> Cég neve</div>
                <div class="card-body">
                    <h5 class="card-title">Kontakt személy neve</h5>
                    <p class="card-text"><i class="fas fa-industry"></i> Iparág</p>
                    <p class="card-text"><i class='fas fa-city'></i> Város</p>
                    <p class="card-text"><i class="fas fa-briefcase"></i> Poziciója</p>
                    <p class="card-text"><i class='fas fa-phone'></i> Telefonszáma</p>
                    <p class="card-text"><i class='fas fa-envelope'></i> Email címe</p>
                    <p class="card-text"></p>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary mr-2"><i class="fas fa-user"></i></i></button>
                    <button type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></button>
                    <button type="button" class="btn btn-danger ml-2"><i class="fas fa-user-minus"></i></button>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <div class="card-header"><i class="fas fa-circle text-dark" title="Inaktív"></i> Cég neve</div>
                <div class="card-body">
                    <h5 class="card-title">Kontakt személy neve</h5>
                    <p class="card-text"><i class="fas fa-industry"></i> Iparág</p>
                    <p class="card-text"><i class='fas fa-city'></i> Város</p>
                    <p class="card-text"><i class="fas fa-briefcase"></i> Poziciója</p>
                    <p class="card-text"><i class='fas fa-phone'></i> Telefonszáma</p>
                    <p class="card-text"><i class='fas fa-envelope'></i> Email címe</p>
                    <p class="card-text"></p>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary mr-2"><i class="fas fa-user"></i></i></button>
                    <button type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></button>
                    <button type="button" class="btn btn-danger ml-2"><i class="fas fa-user-minus"></i></button>
                </div>
            </div>
        </div>
    </div>
    </main>


<?php include "view/footer.php"; ?>