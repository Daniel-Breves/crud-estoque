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

$codigo = $_POST["id"];
$sql = "DELETE FROM produtos WHERE id_produto = $codigo";

if ($conexao->query($sql) === TRUE) {
     echo "<script>alert('Produto cadastrado com sucesso!');</script>";
    header("Location: ../paginas/gerenciar.html");
} else {
    echo "<script>
        alert('Erro ao excluir produto: " . addslashes($conexao->error) . "');
        window.location.href = 'index.html';
    </script>";
}
?>