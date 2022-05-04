<?

include "config/seguranca.php";
include "config/conexao.php";


if (isset($_GET['envia']) == '1') {

    if (isset($_POST['comment'])) $comment = $_POST['comment'];
    $id_mail = $_SESSION["loginCodigo"];

    $insert = "INSERT INTO tbl_chat (comment, id_mail) VALUES ('$comment', '$id_mail')";
    $sth = $conn->prepare($insert);
    $sth->execute();
}
$mail = $_SESSION["loginEmail"];
$select = "SELECT DISTINCT a.id, a.comment as comentario, b.mail as email
 FROM tbl_chat a, tbl_login b WHERE a.id_mail = b.codigo ORDER BY a.id desc limit 20";
$sth = $conn->prepare($select);
$sth->execute();
$dados = $sth->fetchall();


?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="public/css/site.css" media=”screen” />
    <title>Mensagem</title>
    <link rel="icon" href="https://img.icons8.com/dotty/80/000000/globe.png" type="image/x-icon" />

    <script src="https://use.fontawesome.com/2684b993fb.js"></script>
</head>

<body>

    <div class="nav">
        <ul>
            <li style="float:right"><a href="https://guiphp.com/perfil.php" class="fa fa-user fa-5" aria-hidden="true"></a></li>
            <li><a href="https://guiphp.com/alterardados.php">Alterar dados</a></li>
            <li><a href="https://guiphp.com/mudarsenha.php">Mudar senha</a></li>
            <li style="float:right"><a class="active" href="https://guiphp.com/index.php?sair=1">Sair</a></li>
        </ul>
    </div>


    <div class="chat-cont-inner">
        <?
        include "chat.php";
        foreach ($dados as $linha) {
            echo '<div class="container">
        <div class="centered">
            <p class="mensagem">User: ' . $linha["email"] . '</p>
    
            <p class="mensagem">
                Comentário: ' . $linha["comentario"] . '
            </p>
        </div>
    
    </div>';
        }
        ?>
    </div>



</body>

</html>

<?
if (isset($_GET['alterado']) == '1') {
    echo '<script>alert("Dados alterados")</script>';
}
?>