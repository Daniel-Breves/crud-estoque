<?php
include("conexao.php");

$codigo = $_POST["id"];
$sql = "DELETE FROM produtos WHERE id_produto = $codigo";

if ($conexao->query($sql) === TRUE) {
     echo "<script>alert('Produto cadastrado com sucesso!');</script>";
    header("Location: ../paginas/gerenciar.html");
} else {
    echo "<script>
        alert('Erro ao excluir produto: " . addslashes($conexao->error) . "');
        window.location.href = '../paginas/gerenciar.html';
    </script>";
}
?>