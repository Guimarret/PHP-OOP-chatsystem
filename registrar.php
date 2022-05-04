<?
include "config/conexao.php";

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
    header("Location: https://guiphp.com/index.php", TRUE, 302);
} else {
?>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="public/css/registrar.css">
            <script src="public/js/registrar.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="UTF-8">

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
                            <button class="btn-primary" type="submit">Register</button>
                        </form>
                    </section>

                </section>
            </div>
        </body>
 </html>';
<?

}

?>