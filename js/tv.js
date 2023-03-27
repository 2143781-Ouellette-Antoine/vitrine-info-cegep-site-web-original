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