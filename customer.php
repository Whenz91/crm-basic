<?php
include "view/header.php";
?>

<main id="app" class="customer-main">
    <div class="side-indicator-bar">
        <ul class="steps-list">
            <li class="step">Kontakt infok</li>
            <li class="step">Cég alap adatok</li>
            <li class="step">Igény felmérés</li>
            <li class="step">Konkurencia felmérés</li>
            <li class="step">Ügyfél elégedetség</li>
            <li class="step">Észrevételek, megjegyzések</li>
        </ul>
        <a href="dashbord.php" class="back-link">&#8592; Mentés és vissza a főoldalra</a>
    </div>

    <div class="form-side">
        <form action="" method="POST" id="customerForm">
            <div class="form-tab">
                <h2>Kontakt személy adatai</h2>
                <div class="form-group">
                    <label for="name">Teljes név</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Kovács István" value="">
                </div>
                <div class="form-group">
                    <label for="post">Beosztás/Pozició</label>
                    <input type="text" class="form-control" id="post" name="post" placeholder="Laborvezető" value="">
                </div>
                <div class="form-group">
                    <label for="phone">Telefonszám</label>
                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="70-999-8888" value="">
                </div>
                <div class="form-group">
                    <label for="email">Email cím</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="k.istvan@gmail.com" value="">
                </div>
                <input type="text" name="userId" id="userId" value="<?php echo $_SESSION["userId"] ?>" class="d-none">
            </div>

            <div class="form-tab">
                <h2>Cég adatok</h2>
                <div class="form-group">
                    <label for="companyName">Cég neve</label>
                    <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Minta Kft" value="">
                </div>
                <div class="form-group">
                    <label for="companyAddress">Cég címe</label>
                    <input type="text" class="form-control" id="companyAddress" name="companyAddress" placeholder="Budapest" value="">
                    <small>Elég a város neve is.</small>
                </div>
                <div class="form-group">
                    <label for="industry">Iparág</label>
                    <input type="text" class="form-control" id="industry" name="industry" placeholder="Felületkezelés" value="">
                </div>
            </div>

            <div class="form-tab">
                <h2>Igény felmérés</h2>
                <div class="form-group">
                    <label for="whatMeasure">Milyen méréseket végeznek most?</label>
                    <textarea name="whatMeasure" id="whatMeasure" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="howMeasure">Hogyan végzik most a méréseket?</label>
                    <textarea name="howMeasure" id="howMeasure" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="whatInterested">Milyen műszerek érdeklik?</label>
                    <textarea name="whatInterested" id="whatInterested" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-tab">
                <h2>Konkurencia felmérés</h2>
                <div class="form-group">
                    <label for="competitorsName">Melyik cég(ek) műszereit használják most?</label>
                    <textarea name="competitorsName" id="competitorsName" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="competitorsProducts">Milyen műszereket használnak?</label>
                    <textarea name="competitorsProducts" id="competitorsProducts" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-tab">
                <h2>Ügyfél elégedetség</h2>
                <div class="form-group">
                    <label for="whatUsed">Milyen műszereket használnak a cégünktől?</label>
                    <textarea name="whatUsed" id="whatUsed" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="satisfaction">Mennyire elégedettek a cégünkkel/termékeinkkel?</label>
                    <input type="number" id="satisfaction" name="satisfaction" class="form-control" min="1" max="5">
                    <small>1-től 5-ig értékelje, ahol 1 a legrosszabb és 5 a legjobb</small>
                </div>
                <div class="form-group">
                    <label for="canWeHelp">Miben tudnánk segíteni nekik?</label>
                    <textarea name="canWeHelp" id="canWeHelp" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-tab">
                <h2>Észrevételek, megjegyzések</h2>
                <div class="form-group">
                    <label for="comment">Megjegyzések</label>
                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="active" value="1" checked>
                        <label class="form-check-label" for="active">
                            Aktív
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="passive" value="2">
                        <label class="form-check-label" for="passive">
                            Passzív
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inactive" value="3">
                        <label class="form-check-label" for="inactive">
                            Inaktív
                        </label>
                    </div>
                    <small>Az ügyfél érdeklődése alapján melyik csoportba sorolható?</small>
                </div>
            </div>

            <div class="form-footer">
                <button type="button" id="prevBtn" class="btn btn-outline-dark" onclick="nextPrev(-1)">Vissza</button>
                <button type="button" id="nextBtn" class="btn btn-primary" onclick="nextPrev(1)">Követekező</button>
            </div>
        </form>
    </div>
</main>


<?php include "view/footer.php"; ?>