var cookieValue = document.cookie;
cookieValue = cookieValue.split(";");

$(document).ready(function() {
    // load all user data from db
    getAllUsers();

    // show customer profile page (input not edit able)
    $(document).on("click", ".show-customer", function() {
        $("#dashbordHeader").hide();
        $("#customerCardDeck").hide();
        var id = $(this).attr('data-id');
        getOneCustomer(id, false);
    });

    // show edit able customer page
    $(document).on("click", ".edit-customer", function() {
        $("#dashbordHeader").hide();
        $("#customerCardDeck").hide();
        var id = $(this).attr('data-id');
        getOneCustomer(id, true);
    });

    // back to dashbord with out save
    $(document).on("click", "#back", function() {
        $("#customerProfile").html("");
        $("#dashbordHeader").show();
        $("#customerCardDeck").show();
    });

    // save the modified customer data and go back the dashbord
    $(document).on("click", "#save", function() {
        var requestObject = formToObject(document.getElementById("customerProfileForm"));
        updateCustomerData(requestObject);
        $("#customerProfile").html("");
        $("#dashbordHeader").show();
        $("#customerCardDeck").show();
    });

    // delete customer
    $(document).on('click', '.delete-customer', function() {
        // get the customer id
        var customer_id = $(this).attr('data-id');

        customConfirm("Törlés", "bg-danger", "Valóban törölni akarod az ügyfelet?");
        $("#yes").click(function() {
            deleteUser(customer_id);
            $("#customConfirmation").hide();
        });
        $("#no").click(function() {
            $("#customConfirmation").hide();
        });
    });

    // search custmers
    $(document).on("click", "#submitSearch", function() {
        var keywords = $("#search").val();
        searchCustomer(keywords);
    });  

    // custom confirmation window
    function customConfirm(title, titleBgClass, message) {
        $("#customConfirmation .confirm-title").text(title);
        $("#customConfirmation .confirm-title").addClass(titleBgClass);
        $("#customConfirmation .confirm-message").text(message);
        $("#customConfirmation").show();
    }

    function customerCards(data) {
        var records = data.records;
        var values = `<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">`;
        var status = "";
        var statusClass = "";

        for(var i=0; i<records.length; i++) {
            switch (records[i].status) {
                case "1":
                    status = "Aktív";
                    statusClass = "success";
                    break;
                case "2":
                    status = "Passzív";
                    statusClass = "warning";
                    break;
                case "3":
                    status = "Inaktív";
                    statusClass = "dark";
                    break;
                default:
                    status = "Nem ismert a státuszuk";
                    statusClass = "danger";
                    break;
            }
            values += `<div class="col mb-4">
                <div class="card h-100">
                    <div class="card-header"><i class="fas fa-circle text-${statusClass}" title="${status}"></i> ${records[i].company_name}</div>
                    <div class="card-body">
                        <h5 class="card-title">${records[i].customer_name}</h5>
                        <p class="card-text"><i class="fas fa-industry"></i> ${records[i].company_industry}</p>
                        <p class="card-text"><i class='fas fa-city'></i> ${records[i].company_address}</p>
                        <p class="card-text"><i class="fas fa-briefcase"></i> ${records[i].customer_post}</p>
                        <p class="card-text"><i class='fas fa-phone'></i> ${records[i].customer_phone}</p>
                        <p class="card-text"><i class='fas fa-envelope'></i> ${records[i].customer_email}</p>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary mr-2 show-customer" data-id="${records[i].id}" title="Adatok megtekintése"><i class="fas fa-user"></i></i></button>
                        <button type="button" class="btn btn-success edit-customer" data-id="${records[i].id}" title="Adatok szerkesztése"><i class="fas fa-user-edit"></i></button>`;

                     if(cookieValue[0] == "rank=1") {
                            values += `<button type="button" class="btn btn-danger ml-2 delete-customer" data-id="${records[i].id}" title="Adatok törlése"><i class="fas fa-user-minus"></i></button>`;
                        }
                   values += `</div>
                </div>
            </div>
            `; 
        }
        values += '</div>';
        $("#customerCardDeck").html(values);
    }

    // delete customer funciton
    function deleteUser(id) {
        $.ajax({
            type: "POST",
            url: "http://localhost/hanna-crm/customers/delete.php",
            contentType: "application/json",
            data: JSON.stringify({
                id: id
            }),
            success: function (data) {
                getAllUsers();
            },
            error: function (xhr, resp, text) {
                console.log(xhr);
            }
        });
    }


    // get all user data from the db and show the front-end
    function getAllUsers() {
        $.ajax({
            type: "GET",
            url: "http://localhost/hanna-crm/customers/read.php",
            success: function(data) {
                customerCards(data);
            },
            error: function(xhr, resp, text) {
                var value = `<div class="alert alert-warning" role="alert">
                                ${xhr.responseJSON.message}
                            </div>`;
                $("#messageBox").html(value);
            }
        });
    }

    // function for show the customer profile
    function getOneCustomer(id, isItUpdate) {
        $.ajax({
            type: "GET",
            url: "http://localhost/hanna-crm/customers/read_one.php?id=" + id + "",
            success: function (data) {
                var content = `<div class="row py-4 px-5">
                <button class="btn btn-outline-dark mr-4" id="back">Vissza a főoldalra</button>
                <button class="btn btn-info" id="save">Adatok mentése</button>
                </div>
                <form id="customerProfileForm" method="POST" action="">
                <div class="row p-5">
                <div class="col-4 shadow mr-5 p-4">
                    <input type="text" name="id" id="id" value="${data.id}" class="d-none">
                    <h3 class="mb-4">
                        <input class="uni-input" type="text" name="customer_name" id="customer_name" value="${data.customer_name}">
                    </h3>
                    <p>
                        <i class="fas fa-briefcase"></i>
                        <input class="uni-input" type="text" name="customer_post" id="customer_post" value="${data.customer_post}">
                    </p>
                    <p>
                        <i class='fas fa-phone'></i>
                        <input class="uni-input" type="text" name="customer_phone" id="customer_phone" value="${data.customer_phone}">
                    </p>
                    <p>
                        <i class='fas fa-envelope'></i>
                        <input class="uni-input" type="email" name="customer_email" id="customer_email" value="${data.customer_email}">
                    </p>

                    <hr class="big-my">

                    <h3 class="mb-4">
                        <input class="uni-input" type="text" name="company_name" id="company_name" value="${data.company_name}">
                    </h3>
                    <p>
                        <i class='fas fa-city'></i>
                        <input class="uni-input" type="text" name="company_address" value="${data.company_address}">
                    </p>
                    <p>
                        <i class="fas fa-industry"></i>
                        <input class="uni-input" type="text" name="company_industry" id="company_industry" value="${data.company_industry}">
                    </p>

                    <hr class="big-my">

                    <p>A kereskedő neve: ${data.user_name}</p>
                    <p>
                        Az ügyfél státusza:
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="active" value="1" checked>
                            <label class="form-check-label" for="active">Aktív</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="passive" value="2">
                            <label class="form-check-label" for="passive">Passzív</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inactive" value="3">
                            <label class="form-check-label" for="inactive">Inaktív</label>
                        </div>
                    </p>
                    <p>Az ügyféladatok ekkor kerültek a rendszerünkbe: ${data.created_date}</p>
                    <p>Az utolsó módosítás ideje: ${data.modified}</p>
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
                                    <textarea class="uni-textarea" name="what_measure" id="what_measure" rows="5">${data.what_measure}</textarea>
                                </div>
                                <div class="col-12">
                                    <p class="lead">A méréseket így végzik:</p>
                                    <textarea class="uni-textarea" name="how_measure" id="how_measure" rows="5">${data.how_measure}</textarea>
                                </div>
                                <div class="col-12">
                                    <p class="lead">A következő műszerekt használják tőlünk:</p>
                                    <textarea class="uni-textarea" name="what_use" id="what_use" rows="5">${data.what_use}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="opportunities" role="tabpanel" aria-labelledby="opportunities-tab">
                            <div class="row">
                                <div class="col-12">
                                    <p class="lead">Az ügyfelet a következő műszerek érdeklik:</p>
                                    <textarea class="uni-textarea" name="what_interested" id="what_interested" rows="5">${data.what_interested}</textarea>
                                </div>
                                <div class="col-12">
                                    <p class="lead">Ebben segíthetünk nekik:</p>
                                    <textarea class="uni-textarea" name="can_we_help" id="can_we_help" rows="5">${data.can_we_help}</textarea>
                                </div>
                                <div class="col-12">
                                    <p class="lead">Észrevételek, megjegyzések:</p>
                                    <textarea class="uni-textarea" name="comment" id="comment" rows="5">${data.comment}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="competitors" role="tabpanel" aria-labelledby="competitors-tab">
                            <div class="row">
                                <div class="col-12">
                                    <p class="lead">Versenytársak nevei:</p>
                                    <textarea class="uni-textarea" name="competitors_name" id="competitors_name" rows="5">${data.competitors_name}</textarea>
                                </div>
                                <div class="col-12">
                                    <p class="lead">Ezeket használják a versenytársaktól:</p>
                                    <textarea class="uni-textarea" name="competitors_products" id="competitors_products" rows="5">${data.competitors_products}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="satisfaction" role="tabpanel" aria-labelledby="satisfaction-tab">
                            <div class="row">
                                <div class="col-12">
                                    <p class="lead">Ügyfélelégedetség:</p>
                                    <div class="star-holder">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <p><input type="number" id="satisfaction" name="satisfaction" class="form-control" min="1" max="5" value="${data.satisfaction}"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>`;

                $("#customerProfile").html(content);
                switch (data.status) {
                    case "1":
                        $("#customerProfileForm").find(":radio[name=status][value='1']").prop("checked", true);
                        break;
                    case "2":
                        $("#customerProfileForm").find(":radio[name=status][value='2']").prop("checked", true);
                        break;
                    case "3":
                        $("#customerProfileForm").find(":radio[name=status][value='3']").prop("checked", true);
                        break;
                    default:
                        console.log("Hiba");
                        break;
                }
                if(isItUpdate == false) {
                    $("#customerProfileForm :input").prop("disabled", true);
                    $("#save").hide();
                }
            },
            error: function (xhr, resp, text) {
                console.log(xhr);
            }
        });	
        
    }

    //search function
    function searchCustomer(keywords) {
        $.ajax({
            type: "GET",
            url: "http://localhost/hanna-crm/customers/search.php?search=" + keywords + "",
            success: function(data) {
                customerCards(data);
            },
            error: function(xhr, resp, text) {
               var value = `<div class="alert alert-warning animation-hide" role="alert">
                                ${xhr.responseJSON.message}
                            </div>`;
                $("#messageBox").html(value);
                return false;
            }
        });
    }

    // update customer data
    function updateCustomerData(data) {
        var requestObject = data;
        $.ajax({
            type: "POST",
            url: "http://localhost/hanna-crm/customers/update.php",
            data: JSON.stringify(requestObject),
            success: function (data) {
                getAllUsers();
            },
            error: function (xhr, resp, text) {
                console.log(xhr);
            }
        });	

    }

     // convert form data to object
     const formToObject = form =>
     Array.from(new FormData(form)).reduce(
       (acc, [key, value]) => ({
         ...acc,
         [key]: value
       }),
       {}
     );

     setInterval(function() {
        document.getElementById("messageBox").innerHTML = "";
     }, 2000);
});