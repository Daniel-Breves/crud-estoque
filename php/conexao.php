   <?php
   //conecta ao db e testa conexão
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "estoque_db";

$conexao = new mysqli ($servidor, $usuario, $senha, $db);

if($conexao->connect_error){
        die("error de conexao:" .$conexao->connect_error);
    }
?>