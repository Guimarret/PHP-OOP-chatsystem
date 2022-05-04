<?
session_start();
if (isset($_SESSION['login'])) {  # Verifica se a sessao foi iniciada e o session'login' definido
    if ($_SESSION["login"] != "1") {   # se está definida, verifica aqui se ela é diferente de 1
        header('location: https://guiphp.com/index.php?erro=25',TRUE,302); die();  # se for diferente vai pro index
    }
} 
else {
   header('location: https://guiphp.com/index.php?erro=40',TRUE,302); die(); # se não foi iniciada vai pro index
   }
?>