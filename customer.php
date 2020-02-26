<?php
include "view/header.php";
?>

<main id="app" class="customer-main">
    <div class="side-indicator-bar">
        <ul id="v-pills-tab">
            <li><a href="#">Kontakt infok</a></li>
            <li><a href="#">Cég alap adatok</a></li>
            <li><a href="#">Igény felmérés</a></li>
            <li><a href="#">Konkurencia felmérés</a></li>
            <li><a href="#">Ügyfél elégedetség</a></li>
            <li><a href="#">Észrevételek, megjegyzések</a></li>
        </ul>
        <a href="dashbord.php" class="back-link">&#8592; Mentés és vissza a főoldalra</a>
    </div>

    <div class="form-side">
        <form action="" method="POST">
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
            </div>

            <div class="form-tab">
                <h2>Cég adatok</h2>
                <div class="form-group">
                    <label for="companyName">Cég neve</label>
                    <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Minta Kft" value="">
                </div>
                <div class="form-group">
                    <label for="companyAddress">Cím</label>
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
                    <textarea name="whatMeasure" id="whatMeasure" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="howMeasure">Hogyan végzik most a méréseket?</label>
                    <textarea name="howMeasure" id="howMeasure" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="whatInterested">Milyen műszerek érdeklik?</label>
                    <textarea name="whatInterested" id="whatInterested" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="form-tab">
                <h2>Konkurencia felmérés</h2>
                <div class="form-group">
                    <label for="competitorsName">Melyik cég(ek) műszereit használják most?</label>
                    <textarea name="competitorsName" id="competitorsName" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="competitorsProducts">Milyen műszereket használnak?</label>
                    <textarea name="competitorsProducts" id="competitorsProducts" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="form-tab">
                <h2>Ügyfél elégedetség</h2>
                <div class="form-group">
                    <label for="whatUsed">Milyen műszereket használnak a cégünktől?</label>
                    <textarea name="whatUsed" id="whatUsed" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="satisfaction">Mennyire elégedettek a cégünkkel/termékeinkkel?</label>
                    <input type="number" id="satisfaction" name="satisfaction">
                    <small>1-től 5-ig értékelje, ahol 1 a legrosszabb és 5 a legjobb</small>
                </div>
                <div class="form-group">
                    <label for="canWeHelp">Miben tudnánk segíteni nekik?</label>
                    <textarea name="canWeHelp" id="canWeHelp" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="form-tab">
                <h2>Észrevételek, megjegyzések</h2>
                <div class="form-group">
                    <label for="comment">Megjegyzések</label>
                    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="form-footer">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Vissza</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Követekező</button>
            </div>
        </form>
    </div>
</main>


<?php include "view/footer.php"; ?>