var content = `<div class="row py-4 px-5">
    <button class="btn btn-outline-dark mr-4" id="back">Vissza a főoldalra</button>
    <button class="btn btn-info" id="save">Adatok mentése</button>
    </div>
    <div class="row p-5">
    <div class="col-4 shadow mr-5 p-4">
        <input type="text" name="id" id="id" value="" class="d-none">
        <h3 class="mb-4">
            <input class="uni-input" type="text" name="customer_name" id="customer_name" value="Kontakt neve">
        </h3>
        <p>
            <i class="fas fa-briefcase"></i>
            <input class="uni-input" type="text" name="customer_post" id="customer_post" value="Beosztása">
        </p>
        <p>
            <i class='fas fa-phone'></i>
            <input class="uni-input" type="text" name="customer_phone" id="customer_phone" value="Telefonszám">
        </p>
        <p>
            <i class='fas fa-envelope'></i>
            <input class="uni-input" type="email" name="customer_email" id="customer_email" value="Email">
        </p>

        <hr class="big-my">

        <h3 class="mb-4">
            <input class="uni-input" type="text" name="company_name" id="company_name" value="Cég neve">
        </h3>
        <p>
            <i class='fas fa-city'></i>
            <input class="uni-input" type="text" name="company_address" value="Cég címe">
        </p>
        <p>
            <i class="fas fa-industry"></i>
            <input class="uni-input" type="text" name="company_industry" id="company_industry" value="Iparáh">
        </p>

        <hr class="big-my">

        <p>A kereskedő neve:</p>
        <p>Az ügyféladatok ekkor kerültek a rendszerünkbe:</p>
        <p>Az utolsó módosítás ideje:</p>
    </div>
    <div class="col-7 shadow p-4">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="info-tab" data-toggle="pill" href="#info" role="tab" aria-controls="info" aria-selected="true">Általános infok</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="opportunities-tab" data-toggle="pill" href="#opportunities" role="tab" aria-controls="opportunities" aria-selected="false">Lehetőségek</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="competitors-tab" data-toggle="pill" href="#competitors" role="tab" aria-controls="competitors" aria-selected="false">Versenytársak</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="satisfaction-tab" data-toggle="pill" href="#satisfaction" role="tab" aria-controls="satisfaction" aria-selected="false">Elégedetség</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                <div class="row">
                    <div class="col-12">
                        <p class="lead">A cég a következő méréseket végzi:</p>
                        <textarea class="uni-textarea" name="what_measure" id="what_measure" rows="5"></textarea>
                    </div>
                    <div class="col-12">
                        <p class="lead">A méréseket így végzik:</p>
                        <textarea class="uni-textarea" name="how_measure" id="how_measure" rows="5"></textarea>
                    </div>
                    <div class="col-12">
                        <p class="lead">A következő műszerekt használják tőlünk:</p>
                        <textarea class="uni-textarea" name="what_use" id="what_use" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="opportunities" role="tabpanel" aria-labelledby="opportunities-tab">
                <div class="row">
                    <div class="col-12">
                        <p class="lead">Az ügyfelet a következő műszerek érdeklik:</p>
                        <textarea class="uni-textarea" name="what_interested" id="what_interested" rows="5"></textarea>
                    </div>
                    <div class="col-12">
                        <p class="lead">Ebben segíthetünk nekik:</p>
                        <textarea class="uni-textarea" name="what_can_we_help" id="what_can_we_help" rows="5"></textarea>
                    </div>
                    <div class="col-12">
                        <p class="lead">Észrevételek, megjegyzések:</p>
                        <textarea class="uni-textarea" name="comment" id="comment" rows="5"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="competitors" role="tabpanel" aria-labelledby="competitors-tab">
                <div class="row">
                    <div class="col-12">
                        <p class="lead">Versenytársak nevei:</p>
                        <textarea class="uni-textarea" name="competitors_name" id="competitors_name" rows="5"></textarea>
                    </div>
                    <div class="col-12">
                        <p class="lead">Ezeket használják a versenytársaktól:</p>
                        <textarea class="uni-textarea" name="competitors_products" id="competitors_products" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="satisfaction" role="tabpanel" aria-labelledby="satisfaction-tab">
                <div class="row">
                    <div class="col-12">
                        <p class="lead">Ügyfélelégedetség:</p>
                        <div class="star-holder">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>`;

$(document).ready(function() {
    
    $(document).on("click", ".show-customer", function() {
        $("#dashbordHeader").hide();
        $("#customerCardDeck").hide();
        $("#customerProfile").html(content);
        $("#save").hide();
        
        $("#back").on("click", function() {
            $("#dashbordHeader").show();
            $("#customerCardDeck").show();
            $("#customerProfile").html("");
        });
    });
});