<?

#eai tuco
include "seguranca.php";
include "conexao.php";


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
    <title>Mensagem</title>
    <link rel="icon" href="https://img.icons8.com/dotty/80/000000/globe.png" type="image/x-icon" />

    <style>
        /* INICIO RESET*/

        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        a {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }

        button {
            background-color: transparent;
            color: inherit;
            border-width: 0;
            padding: 0;
            cursor: pointer;
        }

        ul,
        ol,
        dd {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            font-size: inherit;
            font-weight: inherit;
        }

        p {
            margin: 0;
        }

        fieldset {
            border-width: 0;
            padding: 0;
            margin: 0;
        }

        body {
            font-size: 16px;
            margin-top: 80px;
            background-color: #EAC8CA;

        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        /* FIM RESET */


        /* Inicio Estilo */

        .nav {
            position: fixed;
            z-index: 1001;
            top: 0;
            left: 0;
            width: 100%;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #82466F;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #361D2E;
        }

        .active {
            background-color: #361D2E;
            width: 50px;
            border-radius: 35px 0 0 0;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 1px 4px;
        }

        .active:hover {
            background-color: #422439;
        }

        .container {
            width: 50%;
        }

        .centered {
            border: 2px solid #333;
            border-radius: 10px;
            padding: 10px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 1px 4px;
            margin-top: 10px;
            margin-bottom: 15px;
            margin-top: 15px;
            background-color: #F7D2D5;
        }

        .mensagem {
            margin-top: 0%;
            font-weight: bold;
        }

        .fa {
            font-size: xx-large;
        }
    </style>
    <script src="https://use.fontawesome.com/2684b993fb.js"></script>


</head>

<body>

    <div class="nav">
        <ul>
            <li><a href="https://guiphp.com/analisedearquivos.php">Analise de dados</a></li>
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