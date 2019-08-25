function changeStarState(selectedStar) {
    if (document.getElementById(selectedStar).style.opacity == "0.3") {
        document.getElementById(selectedStar).style.opacity = "1";
    } else {
        document.getElementById(selectedStar).style.opacity = "0.3";
    }
}

function validateOtherCells(fieldEntered) {
    var inputFields = document.getElementsByClassName("inputField");
    for (var i = 0; i < inputFields.length; i++) {
        if (inputFields[i].value.length != 0 && inputFields[i].name != fieldEntered) {
            inputFields[i].value = "";
        }
    }
}

function convert() {
    var inputFields = document.getElementsByClassName("inputField");
    var stars = document.getElementsByClassName("star");

    // Get convert from currency.
    for (var i = 0; i < inputFields.length; i++) {
        if (inputFields[i].value.length != 0) {
            var convertFrom = inputFields[i];
        }
    }
    // Set conversion into each desired currency.
    for (var i = 0; i < inputFields.length; i++) {
        if (inputFields[i].name != convertFrom.name && stars[i].style.opacity != '0.3') {
            inputFields[i].value = "100";
        }
    }
}

function clearInputs() {
    var inputFields = document.getElementsByClassName("inputField");
    for (var i = 0; i < inputFields.length; i++) {
        inputFields[i].value = "";
    }
}