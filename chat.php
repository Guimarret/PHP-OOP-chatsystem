<style>
    .chat-cont h1 {
        font-size: 1.2em;
        font-weight: bold;
    } 
    
    .linha-hor {
        border-bottom: 2px solid #000;
        display: block;
        margin-bottom: 15px;
        width: 35%;
    }
    
    .form-control {
        margin-bottom: 15px;
    }
    
    .form-control p {
        margin-bottom: 5px;
    }
    
    .form-control .text {
        width: 35%;
        height: 30px;
    }
    
    .form-control input[type="submit"] {
        position: absolute;
        width: 10%;
        height: 36px;
        border: none;
        background-color: #361D2E;
        color: #fff;
        border-radius: 0 5px 5px 0;
    }
    
    .form-control input[type="text"] {
        border-radius: 0;
        border: none;
        border-left: 10px solid #361D2E;
        border-top: 2px solid #361D2E;
        border-bottom: 2px solid #361D2E;
    }
    
    .form-control input[type="text"]:focus {
        border: none;    
        outline: none;
        border-radius: 10px 0 0 10px;
    }
    
</style>

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