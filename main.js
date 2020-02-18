var editItem;
$(document).ready(function() {
    // load all user data from db
    getAllUsers();

    // create new user when I save the form data and refres the user list
    $("#create").click(function() {
        createNewUser();
        $('#userModal').modal('hide');
    });

    $("#addUser").click(function() {
        $("#userModalTitle").text("Új munkatárs felvétele");
        $("#create").removeClass("d-none");
        $("#update").addClass("d-none");
    });

    // read the clicked userprofile data from db and open modal
    editItem = function(id) {
        $("#userModalTitle").text("Adatok módosítása");
        $("#update").removeClass("d-none");
        $("#create").addClass("d-none");
        getOneUser(id);
    }

    // send updated user data to the server
    $("#update").click(function() {
        updateUserData();
    });


    // collect data into one json and send back the server
    function createNewUser() {
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var location = $("#location").val();
        var password = $("#password").val();
        var rank = $('input[name=userRank]:checked', '#userForm').val();

        var requestObject = {
            name: name,
            email: email,
            phone: phone,
            location: location,
            password: password,
            rank: rank
        };
        
        $.ajax({
            type: "POST",
            url: "http://localhost/hanna-crm/users/create.php",
            data: JSON.stringify(requestObject),
            success: function (data) {
                getAllUsers();
            },
            error: function () {
                alert("Hiba történt az adatbázis elérésénél.");
            }
        });	
    }

    // get all user data from the db and show the front-end
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
                                    <i class='fas fa-phone'></i> +36 ${records[i].phone}
                                </p>
                                <p class="card-text">
                                    <i class='fas fa-envelope'></i> ${records[i].email}
                                </p>
                                <button type="button" class="btn btn-success edit" onclick='editItem("${records[i].id}")'><i class='fas fa-edit'></i></button>
                                <button type="button" class="btn btn-danger delete" onclick='deleteItem("${records[i].id}")'><i class='fas fa-trash-alt'></i></button>
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

    function getOneUser(id) {
    
        $.ajax({
            type: "GET",
            url: "http://localhost/hanna-crm/users/read_one.php?id=" + id + "",
            success: function (data) {
                $('#hiddenId').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $('#location').val(data.location);
                $('#password').val(data.password);
                switch (data.rank) {
                    case "1":
                        $("#userForm").find(":radio[name=userRank][value='1']").prop("checked", true);
                        break;
                    case "2":
                        $("#userForm").find(":radio[name=userRank][value='2']").prop("checked", true);
                        break;
                    case "3":
                        $("#userForm").find(":radio[name=userRank][value='3']").prop("checked", true);
                        break;
                    default:
                        console.log("Hiba");
                        break;
                }

                $('#userModal').modal('show');
            },
            error: function () {
                alert("Hiba történt az adatbázis elérésénél.");
            }
        });	
        
    }

    function updateUserData() {
        var id = $("#hiddenId").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var location = $("#location").val();
        var password = $("#password").val();
        var rank = $('input[name=userRank]:checked', '#userForm').val();

        var requestObject = {
            id: id,
            name: name,
            email: email,
            phone: phone,
            location: location,
            password: password,
            rank: rank
        };

        $.ajax({
            type: "POST",
            url: "http://localhost/hanna-crm/users/update.php",
            data: JSON.stringify(requestObject),
            success: function (data) {
                getAllUsers();
            },
            error: function () {
                alert("Hiba történt az adatbázis elérésénél.");
            }
        });	

        $('#userModal').hide();
    }

});
