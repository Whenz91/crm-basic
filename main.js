$(document).ready(function() {
    getAllUsers();

function getAllUsers() {
        $.ajax({
            type: "GET",
            url: "http://localhost/hanna-crm/users/read.php",
            success: function(data) {
                var records = data.records;
                var values = "";
                var userRank = "";

                for(var i=0; i<records.length; i++) {
                    switch (records[i].rank) {
                        case "1":
                            userRank = "Admin";
                            break;
                        case "2":
                            userRank = "Kereskedő";
                            break;
                        case "3":
                            userRank = "Szervizes";
                            break;
                        default:
                            userRank = "Hiba történt";
                            break;
                    }
                    values += `<div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-header">${userRank}</div>
                            <div class="card-body">
                                <h5 class="card-title">${records[i].name}</h5>
                                <p class="card-text">
                                    <i class='fas fa-city'></i> ${records[i].location}
                                </p>
                                <p class="card-text">
                                    <i class='fas fa-phone'></i> +36- ${records[i].phone}
                                </p>
                                <p class="card-text">
                                    <i class='fas fa-envelope'></i> ${records[i].email}
                                </p>
                                <button type="button" class="btn btn-success" name="edit" id="${records[i].id}"><i class='fas fa-edit'></i></button>
                                <button type="button" class="btn btn-danger" name="delete" id="${records[i].id}"><i class='fas fa-trash-alt'></i></button>
                            </div>
                        </div>
                    </div>
                    `;
                }
                $("#usersCardDeck").html(values);
            },
            error: function() {
                console.log("Hiba történt az adatbázis elérésénél.");
            }
        });
    }

});
