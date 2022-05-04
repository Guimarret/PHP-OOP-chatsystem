<?
include "conexao.php";

if (isset($_GET["value"]) == "1") {
    if (isset($_POST['mail'])) {
        $mail = $_POST['mail'];
    }
    if (isset($_POST['senha'])) 
        $password = $_POST['senha'];
    
    if (isset($_POST['cpf'])) 
        $cpf = $_POST['cpf'];
    
    if (isset($_POST['endereco'])) 
        $adress = $_POST['endereco'];
    
    if (isset($_POST['numero'])) 
        $number = $_POST['numero'];
    
    if (isset($_POST['cidade'])) 
        $city = $_POST['cidade'];
    

    $sql = "INSERT INTO tbl_login (mail, password, cpf, adress, number, city) VALUES ('$mail', '$password', '$cpf', 
    '$adress', '$number', '$city')";

    $x = $conn->query($sql);
    header( "Location: https://guiphp.com/index.php" , TRUE , 302 );
} else {
?>
    <html>

    <head>
        <link rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
    <style>
        *, 
        *:after,
        *:before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        *{
            outline: none;
        }
        body{
            font-size: 16px;
            list-style-type: none;
            line-height: 1;
            background: rgb(173,128,131);
            background: linear-gradient(90deg, rgba(173,128,131,1) 0%, rgba(234,200,202,1) 40%, rgba(254,240,241,1) 100%);  
        }

        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed, 
        figure, figcaption, footer, header, hgroup, 
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }


        article, aside, details, figcaption, figure, 
        footer, header, hgroup, menu, nav, section {
            display: block;
        }

        ol, ul {
            list-style: none;
        }

        a {
            text-decoration: none; 
            color: #000;
        }


        blockquote, q {
            quotes: none;
        }

        blockquote:before, blockquote:after,
        q:before, q:after {
            content: '';
            content: none;
        }

        button {
            border: none;
        }

        input {
            border: none;
        }

        input:focus {
            border: none;
        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            text-align: -webkit-center;
        }

        @media (min-width: 768px) {
            .container {
            width: 750px;
            }
        }

        @media (min-width: 992px) {
            .container {
            width: 970px;
            }
        }

        @media (min-width: 1200px) {
            .container {
            width: 1170px;
            }
        }


        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .form-display {
            background-color: #fefefe;
            border-radius: 30px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            margin: 150px;
            width: 50%;
        }

        .page-header {
            text-align: center;
            font-weight: bold;
            font-size: 2em;
            padding: 15px;
            margin: 5px;
            color: #333;
        }

        .form-align {
            display: grid;
            justify-content: center;
        }

        .form-group {
            display: grid;
            grid-auto-flow: row;
            justify-items: center;
        }

        .form-control {
            padding: 15px;
            margin: 10px;
        }

        input.form-control {
            padding: 10px;
            border-bottom: 1px solid #333;
            transition: all .5s ease-out;
        }

        input.form-control:focus {
            border-bottom:none;
            transition: 0.5s;
            border-left: 10px solid #333;
        }

        .btn-primary {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        button.btn-primary {
            width: 80%;
            border-radius: 10px;
            height: 40px; 
        }

        button.btn-primary:hover {
            background-color: #333;
            color: #fefefe;
            transition: 1s; 
        }

        .border-bottom-login {
            width: 20%;
            border-bottom: 2px solid #333;
            margin: 10px 0;
        }

        </style>
    </head>

    <body>
    
        <div class="container">
            <section class="form-display">
                <h1 class="page-header">Register</h1>
                <div class="border-bottom-login"></div>
    
    
                <section class="form-align">
                <form class="form-group" action="http://guiphp.com/registrar.php?value=1" method="post">
                    <input class="form-control" name="mail" type="mail" placeholder="Mail">
                    <input class="form-control" name="password" type="password" placeholder="Password">
                    <input class="form-control" name="confirm_password" type="password" placeholder="Confirm Password">
                    <input class="form-control" name="cpf" type="text" placeholder="CPF">
                    <input class="form-control" name="endereco" type="text" placeholder="Adress">
                    <input class="form-control" name="numero" type="text" placeholder="Number">
                    <input class="form-control" name="cidade" type="text" placeholder="City">


                    <button class="btn-primary" type="submit" >Register</button>
                </form>
                </section>
            
            </section>
        </div>



        <script>
           document.getElementById("form").addEventListener("submit", function(event) {
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
        </script>

    </body>

    </html>';
<?

}

?>