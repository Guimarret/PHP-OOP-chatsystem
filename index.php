<? 
session_start();

if (isset($_GET['erro']) == '1'){
    echo '<script> alert("Login ou senha incorretos")</script>';
}
if(isset($_GET['sair']) == '1'){
   session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="public/css/site.css">
</head>

<body>

<div class="container">
    
</div>

    <div class="container">
        <section class="form-display">
            <h1 class="page-header">Login</h1>
            <div class="border-bottom-login"></div>


            <section class="form-align">
            <form class="form-group" action="verifica.php" method="post">
                <input class="form-control login" name="mail" type="mail" placeholder="E-mail">
                <input class="form-control password" name="password" type="password" placeholder="Password">
                <button class="btn-primary" type="submit" >Login</button>
            </form>
            <h3 class="registrar"><a href="http://guiphp.com/registrar.php/">Registration</a></h3>
            </section>
        
        </section>
    </div>

</body>

</html>';


        
