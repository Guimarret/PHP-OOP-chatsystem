<?
include "config/seguranca.php";
include "config/conexao.php";

if (isset($_GET["enviar"]) == '1') {
    $mail = $_SESSION["loginEmail"];
    $id_mail = $_SESSION["loginCodigo"];

    if (isset($_POST['nickname'])){  $nick = $_POST['nickname'];
        $insert = "UPDATE tbl_login SET nick ='$nick' WHERE mail = '$mail'";
        $sth = $conn->prepare($insert);
        $sth->execute();
    }

    if (isset($_POST['telefone'])) {
        $telefone = $_POST['telefone'];
        $max = count($telefone);
        for($i= 0; $i < $max; $i++ ){

        $insert1 = "INSERT INTO tbl_telefone (numero, id_mail) VALUES ('$telefone[$i]', '$id_mail')";
        $sth = $conn->prepare($insert1);
        $sth->execute();
        }
    }
};

?>
<header>
</header>

<body>
    <h1>Conta</h1>
    <div>

        <p>Name for the chat</p>
        <form name="form-control" action="perfil.php?enviar=1" method="post">
            <input type="text" name="nickname">
            <ul id="addrlist">
                <li><input placeholde="Phone" type="text" name="telefone[]" /></li>
            </ul>
            <button id="addaddr">add phone number</button>
            <button type="submit" class="btn">Submit</button>
        </form>
        <script>
            document.getElementById("addaddr").onclick = function() {
                var li = document.createElement("li");
                var input = document.createElement("input");
                input.setAttribute("type", "text");
                input.setAttribute("name", "telefone[]");
                li.appendChild(input);
                document.getElementById("addrlist").appendChild(li);
                return false;
            };
        </script>


    </div>
</body>