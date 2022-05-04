
document.getElementById("form").addEventListener("submit", function (event) {
    event.preventDefault();
    if (validaformulario()) document.getElementById('form').submit();
});

function validaformulario() {
    /* if (validarCPF() && validatePassword()) return true; else { alert('erro'); return false; } */
    let cpf = document.getElementById("cpf").value;
    if (validarCPF(cpf)) {
        if (validatePassword()) {
            return true;
        } else {
            alert('senha incorreta!');
            return false;
        }

    } else {
        alert('Cpf incorreto!');
        return false;
    }


}


function validarCPF(cpf) {
    exp = /\.|\-/g;
    cpf = "" + cpf;
    cpf = cpf.toString().replace(exp, "");
    if (
        !cpf ||
        cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999"
    ) {
        return false;
    }
    var digitoDigitado = eval(cpf.charAt(9) + cpf.charAt(10));
    var soma1 = 0,
        soma2 = 0;

    for (i = 0; i < 9; i++) {
        soma1 += eval(cpf.charAt(i) * (i + 1));
        soma2 += eval(cpf.charAt(i) * i);

    }
    soma1 = (soma1) % 11;
    if (soma1 == 10) soma1 = 0;
    var oitavo = soma1 * 9; // 
    soma2 = (soma2 + oitavo) % 11;
    if (soma2 == 10) soma2 = 0;
    soma1 += '';
    soma2 += '';
    var digitoGerado = soma1 + soma2;
    if (digitoGerado != digitoDigitado) return false;
    return true;
}


function validatePassword() {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    if (password != confirm_password) {
        alert("Senhas diferentes!");
        return false;
    } else {
        return true;
    }
}
