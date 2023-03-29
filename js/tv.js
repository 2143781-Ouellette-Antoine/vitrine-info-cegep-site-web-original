const inputTOTP = document.getElementById('totp_code');

inputTOTP.addEventListener('input', function(event) {
    formatInput(event.target);
});

function formatInput(input) {
    // Remove all non-digit characters from the input value
    let inputValue = input.value.replace(/\D/g, '');

    // Limit the input value to 6 digits
    inputValue = inputValue.substring(0, 6);

    // Set the formatted input value back into the input field
    input.value = inputValue;
}

inputTOTP.addEventListener('cut', function(event) {
    handleCutPaste(event.target);
});
inputTOTP.addEventListener('paste', function(event) {
    handleCutPaste(event.target);
});
function handleCutPaste(input) {
    // Wait a little bit to allow the cut or paste operation to complete
    setTimeout(function() {
        formatInput(input);
    }, 10);
}

inputTOTP.addEventListener('keypress', function(event) {
    handleKeyPress(event, event.target);
});

function handleKeyPress(event, input) {
    console.log("press " + event.key);

    if (
        //If not digit, not Backspace, not Enter, not Home or not CTRL+V :
        !(/\d/.test(event.key)) &&
        !(event.key==="Backspace" || event.key==="Enter" || event.key==="ArrowLeft" || event.key==="ArrowRight" || event.key==="Home"|| event.key==="End") &&
        !(event.ctrlKey && (event.key === "c" || event.key === "v"|| event.key === "a"))
    ) {
        //Prevent to write the invalid character.
        event.preventDefault();
        return;
    }

    // Format the input on every key press
    formatInput(input);
}

inputTOTP.addEventListener('keydown', function(event) {
    handleKeyDown(event, event.target);
});

function handleKeyDown(event, input) {
    console.log("down " + event.key);

    if (
        //If not digit, not Backspace, not Enter, not Home or not CTRL+V :
        !(/\d/.test(event.key)) &&
        !(event.key==="Backspace" || event.key==="Enter" || event.key==="ArrowLeft" || event.key==="ArrowRight" || event.key==="Home"|| event.key==="End") &&
        !(event.ctrlKey && (event.key === "c" || event.key === "v"|| event.key === "a"))
    ) {
        //Prevent to write the invalid character.
        event.preventDefault();
        return;
    }

    // Format the input on every key press
    formatInput(input);
}

/**
 * Requete ajax (post)
 */

/* Vanilla JS */

const button = document.getElementById('btn_connect');

button.addEventListener('click', function(event) {
    if (inputTOTP.value != "") {
        sendCode(inputTOTP.value);
        event.preventDefault();
    }
});

function sendCode(code) {
    fetch('traitement-tv.php', {
        method: 'POST',
        headers:{
          'Content-Type': 'application/x-www-form-urlencoded'
        },    
        body: new URLSearchParams({
            'totp': inputTOTP.value
        })
    })
    .then(response => {
        return response.json();
    })
    .then(code => {
        parseResponseCode(code);
    });
}

function parseResponseCode(code) {
    const statusBox = document.getElementById('status');
    var message = "";
    var type = "error";

    switch (code) {
        case "GENERAL_ERROR":
            message = "Une erreur s'est produite à l'envoi du code.";
            break;
        case "API_ERROR":
            message = "Une erreur s'est produite: api_error.";
            break;
        case "TV_IN_USE":
            message = "La TV est en cours d'utilisation par un autre utilisateur. Veuillez patienter."
            type = "warning";
            break;
        case "INVALID_CODE":
            message = "Le code n'est pas valide.";
            type = "warning";
            break;
        case "GOOD_CODE":
            message = "Le code est valide, veuillez patienter pendant que nous vous redirigeons.";
            type = "success";
            break;
        default:
            break;
    }

    notification(type, message);

    if (code == "GOOD_CODE") {
        setTimeout(function(){
            window.history.back();
        }, 3000) 
    }

    /*statusBox.innerHTML = message;

    if (type == "success") {
        statusBox.classList.remove("font-error");
        statusBox.classList.add("font-success");

        setTimeout(function(){
            window.history.back();
        }, 3000)
    }

    statusBox.classList.remove("invisible");*/
}



/**
 * jQuery example
 */

/*
$(function(){
    $('#btn_connect').on('click', function(){
        if ($('#totp_code').val() != "") {
            $.post('traitement-tv.php', {
                totp: $('#totp_code').val()
            })
            .done(function(data) {
                parseResponseCode(code);
            });

            return false; // PreventDefault
        }
    });
})
*/



