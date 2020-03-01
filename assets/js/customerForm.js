// set the currentTab index to first tab and set to visible
var currentTab = 0;
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

function nextPrev(n) {
    //get all elemnt with form-tab class
    var tabs = $(".form-tab");
    // hide the current tab
    tabs[currentTab].style.display = "none";
    // increase or decrease the current tab by 1
    currentTab = currentTab + n;
    // if you reached the end of the form the data submitted
    if(currentTab >= tabs.length) {
        $("#customerForm").submit();
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