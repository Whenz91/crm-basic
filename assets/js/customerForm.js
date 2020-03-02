var nextPrev;
// set the currentTab index to first tab and set to visible
var currentTab = 0;

$(document).ready(function() {
    showTab(currentTab);
    
    function showTab(index) {
        // get all element with form-tab class
        var tabs = $(".form-tab");
        // set visible the first tab
        tabs[index].style.display = "block";
        // hide the prevBtn in the first tab and show all otheres
        if(index == 0) {
            $("#prevBtn").hide();
        } else {
            $("#prevBtn").show();
        }
        // changed the nextBtn text in the last tab
        if(index == (tabs.length - 1)) {
            $("#nextBtn").text("Ügyféladatok mentése");
        } else {
            $("#nextBtn").text("Következő");
        }
        // fix the step indicators
        fixStepIndicator(index);
    }
    
    nextPrev = function(n) {
        //get all elemnt with form-tab class
        var tabs = $(".form-tab");
        // hide the current tab
        tabs[currentTab].style.display = "none";
        // increase or decrease the current tab by 1
        currentTab = currentTab + n;
        // if you reached the end of the form the data submitted
        if(currentTab >= tabs.length) {
            var requestObject = formToObject(document.getElementById("customerForm"));
            createNewCustomer(requestObject);
            return false;
        } else {
            // otherwise display the current tab
            showTab(currentTab);
        }
    }
    
    function fixStepIndicator(index) {
        // get all element with the step class
        var stepIndicators = $(".step");
        // remove active class for all stepIndicators elements 
        for(var i = 0; i < stepIndicators.length; i++) {
            stepIndicators[i].classList.remove("active");
        }
        // add the active class only the current stepIndicator
        stepIndicators[index].classList.add("active");
    }

    // collect data into one json and send back the server
    function createNewCustomer(data) {
        var requestObject = data;
        
        $.ajax({
            type: "POST",
            url: "http://localhost/hanna-crm/customers/create.php",
            data: JSON.stringify(requestObject),
            success: function (data) {
                window.location.replace("dashbord.php");
            },
            error: function (xhr, resp, text) {
			    alert(xhr.responseJSON.message);
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
});