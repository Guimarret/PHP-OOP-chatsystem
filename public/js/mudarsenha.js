
function validatePassword() {
    var password = document.getElementById("newpwd").value;
    var confirm_password = document.getElementById("newpwd2").value;
    if (password != confirm_password) {
        alert("Senhas diferentes!");
        return false;
    } else {
        return true;
    }
}
