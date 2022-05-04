<header>
<link rel="stylesheet" type="text/css" href="public/css/chat.css">
</header>

<div class="container">
    <div class="chat-cont">
        <h1>Chat</h1>
        <span class="linha-hor"></span>
        <form class="form-control" action="mensagem.php?envia=1" method="post">
            <p><? echo $_SESSION["loginEmail"]; ?></p>
            <input class="text" type="text" placeholder="Digite Aqui!" name="comment">
            <input class="submit" type="submit" value="Send">
        </form>
        <span class="linha-hor"></span>
    </div>
</div>