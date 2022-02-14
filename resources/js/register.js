
var txtPassword = document.getElementById("password");
var txtConfirmPassword = document.getElementById("password-confirm");
var btnSubmit = document.getElementById('submit_form')
btnSubmit.onsubmit = ConfirmPassword
txtConfirmPassword.onkeyup = ConfirmPassword;
function ConfirmPassword() {
    txtConfirmPassword.setCustomValidity("");
    if (txtPassword.value != txtConfirmPassword.value) {
        txtConfirmPassword.setCustomValidity("Le password devono essere uguali.");
    }
}