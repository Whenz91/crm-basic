// get User id
var id = $("#hiddenId").val();

$(document).ready(function() {
    // read user data
    getOneUser(id);

    //show password
    $("#showPass").click(function() {
        showPassword();
    });

    // update user profile data
    $("#update").click(function() {
        updateUserData();
    });

    // get one user data from database
    function getOneUser(id) {
        
        $.ajax({
            type: "GET",
            url: "http://localhost/hanna-crm/users/read_one.php?id=" + id + "",
            success: function (data) {
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $('#location').val(data.location);
            },
            error: function (xhr, resp, text) {
                console.log(xhr);
            }
        });	
        
    }
    
    // show password
    function showPassword() {
        var x = document.getElementById("password");
        if(x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    
    // update user data
    function updateUserData() {
        var id = $("#hiddenId").val();
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var location = $("#location").val();
        var password = $("#password").val();
        var rank = $("#hiddenRank").val();
    
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
                var value = `<div class="alert alert-success" role="alert">Adatok sikeresen módosítva.</div>`;
                $("#messageBox").html(value);
                $("#password").val('');
            },
            error: function (xhr, resp, text) {
                var value = `<div class="alert alert-danger" role="alert">Sikertelen az adatok módosítása.</div>`;
                $("#messageBox").html(value);
                console.log(xhr);
            }
        });	
    
    }

    setInterval(function() {
        document.getElementById("messageBox").innerHTML = "";
     }, 8000);
});