<?php
include("conexao.php");

    //atualizando

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nm = $_POST["nom"];
    $desc = $_POST["dc"];
    $quan = $_POST["qt"];
    $prec = $_POST["pc"];

    $sql = "UPDATE produtos SET 
                nome = '$nm',
                descricao = '$desc',
                quantidade = '$quan',
                preco = '$prec'
            WHERE id_produto = $id";

    if ($conexao->query($sql) === TRUE) {
        echo "<script>
            alert('Produto atualizado com sucesso!');
            window.location.href = '../paginas/gerenciar.html';
        </script>";
    } else {
        echo "<script>
            alert('Erro ao atualizar produto: " . addslashes($conexao->error) . "');
            window.location.href = 'index.html';
        </script>";
    }
} else {
    echo "<script>
        alert('Requisição inválida.');
        window.location.href = '../paginas/gerenciar.html';
    </script>";
}
?>