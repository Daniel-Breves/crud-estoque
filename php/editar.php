<?php
include("conexao.php");

//editando produtos

if (isset($_GET["id"])) {
    $codigo = $_GET["id"];
    $sql = "SELECT * FROM produtos WHERE id_produto = $codigo";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $livro = $resultado->fetch_assoc();
    } else {
        echo "<script>
            alert('Produto não encontrado.');
            window.location.href = 'index.html';
        </script>";
        exit;
    }
} else {
    echo "<script>
        alert('Id do produto não informado.');
        window.location.href = 'index.html';
    </script>";
    exit;
}
?>

<h2>Editar Livro</h2>
<form method="post" action="atualizar.php">
    <input type="hidden" name="id" value="<?php echo $livro['id_produto']; ?>">
    <label>Nome:</label><br>
    <input type="text" name="nom" value="<?php echo $livro['nome']; ?>" required><br><br>

    <label>Descrição:</label><br>
    <input type="text" name="dc" value="<?php echo $livro['descricao']; ?>" required><br><br>

    <label>Quantidade:</label><br>
    <input type="number" name="qt" value="<?php echo $livro['quantidade']; ?>" required><br><br>

    <label>Preço:</label><br>
    <input type="text" name="pc" value="<?php echo $livro['preco']; ?>" required><br><br>

    <button type="submit">Salvar Alterações</button>
</form>

<div style="margin-top: 20px;">
    <a href="../index.html"><button>Voltar para a página inicial</button></a>
</div>