<? include "seguranca.php";
    include "conexao.php";
    
    
   
  if (isset($_GET["newpwd"])==1){
      $password = $_POST["password"];
      $id_mail = $_SESSION["loginEmail"];
      $newpwd = $_POST["newpwd"];
      
      $select = "SELECT * FROM tbl_login WHERE password='$password' AND mail = '$id_mail' ";
try {
$sth = $conn->prepare($select);
$sth-> execute();
$dados = $sth->fetchAll();
    


if ($dados[0] == ''){
      echo '<script>alert("senha atual incorreta")</script>';
  }
  
  else {
    $select = "UPDATE tbl_login SET password='$newpwd' WHERE mail = '$id_mail'";
    try {
        $sth = $conn->prepare($select);
        $sth-> execute();
        
        header('location:https://guiphp.com/mensagem.php?alterado=1',TRUE,302); 
        echo '<script>alert("senha atualizada'.$select.'")</script>';
        }
        catch(Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            }
            
    }
  }

     
  catch(Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}
}

?>
  <h1>Redefinição de senha</h1>
  <h2> Senha antiga </h2>
  <form class="form" method="post" action="https://guiphp.com/mudarsenha.php?newpwd=1">
  <input type="password" name="password" id="pwd" >
  <h2> Senha nova </h2>
  <input type="password" name="newpwd" id="newpwd">
  <h2> Repita a nova senha </h2>
  <input type="password" name="newpwd2" id="newpwd">
  <input type="submit" name="salvar" value="Salvar">



<script>
    function validatePassword() {
                var password = document.getElementById("newpwd").value;
                var confirm_password = document.getElementById("newpwd2").value;
                if (password != confirm_password) {
                    alert("Senhas diferentes!");
                    return false;
                } else {
                    return true;
                }
            }    
  </script>

