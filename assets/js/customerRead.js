$(document).ready(function() {
    // load all user data from db
    getAllUsers();

    // get all user data from the db and show the front-end
    function getAllUsers() {
        $.ajax({
            type: "GET",
            url: "http://localhost/hanna-crm/customers/read.php",
            success: function(data) {
                var records = data.records;
                var values = "";
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
                                <button type="button" class="btn btn-success edit-customer" data-id="${records[i].id}" title="Adatok szerkesztése"><i class="fas fa-user-edit"></i></button>
                                <button type="button" class="btn btn-danger ml-2 delete-customer" data-id="${records[i].id}" title="Adatok törlése"><i class="fas fa-user-minus"></i></button>
                            </div>
                        </div>
                    </div>
                    `;
                }
                $("#customerCardDeck").html(values);
            },
            error: function(xhr, resp, text) {
                var value = `<div class="alert alert-warning" role="alert">
                                ${xhr.responseJSON.message}
                            </div>`;
                $(".container").html(value);
            }
        });
    }
});