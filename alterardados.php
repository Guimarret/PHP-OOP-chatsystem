<? include "config/seguranca.php";
    include "config/conexao.php";
    
    
   
  if (isset($_GET["novo"])==1){
      $endereco = $_POST["endereco"];
      $id_mail = $_SESSION["loginEmail"];
      $numero = $_POST["numero"];
      $cidade = $_POST["cidade"];
      
      $select = "SELECT * FROM tbl_login WHERE mail = '$id_mail' ";
try {
$sth = $conn->prepare($select);
$sth-> execute();
$dados = $sth->fetchAll();
    

if ($dados[0] == ''){
    header('location:https://guiphp.com/index.php?erro=1',TRUE,302);
  }
  
  else {
    $select = "UPDATE tbl_login SET adress='$endereco', number='$numero', city='$cidade'
     WHERE mail = '$id_mail'";
    try {
        $sth = $conn->prepare($select);
        $sth-> execute();
        
        header('location:https://guiphp.com/mensagem.php?alterado=1',TRUE,302); 
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
<body>
  <h1>Redefinição de dados</h1>
  <h2> Endereço </h2>
  <form class="form" method="post" action="https://guiphp.com/alterardados.php?novo=1">
  <input type="text" name="endereco" id="newendereco" >
  <h2> Número </h2>
  <input type="number" name="numero" id="newnumber">
  <h2> Cidade </h2>
  <input type="text" name="cidade" id="newcidade">
  <input type="submit" name="salvar" value="Salvar">
  </body>





