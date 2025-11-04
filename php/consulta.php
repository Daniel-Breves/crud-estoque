  <?php
 include("conexao.php");
  //Consultando produtos

    $consulta = $_POST["produto"];
    $sql = "SELECT * FROM produtos WHERE nome LIKE '%$consulta%'";
    $resultado = $conexao->query($sql);

    if ($consulta == "") {
    echo "<script>
        alert('Campo de busca vazio. Por favor, insira um nome para buscar.');
        window.location.href = '../paginas/gerenciar.html';
    </script>";
    } else {
    if ($resultado->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                    <th>descrição</th>
                    <th>quantidade</th>
                    <th>preço</th>
                </tr>";
        while($linha = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>" . $linha["id_produto"] . "</td>
                    <td>" . $linha["nome"] . "</td>
                    <td>" . $linha["descricao"] . "</td>
                    <td>" . $linha["quantidade"] . "</td>
                    <td>" . $linha["preco"] . "</td>
                    <td>
                        <form method='post' action='excluir.php' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $linha["id_produto"] . "'>
                            <button type='submit'>Excluir</button>
                        </form>
                        <form method='get' action='editar.php' style='display:inline; margin-left:5px;'>
                            <input type='hidden' name='id' value='" . $linha["id_produto"] . "'>
                            <button type='submit'>Editar</button>
                        </form>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<script>
            alert('Nenhum produto encontrado.');
            window.location.href = '../paginas/gerenciar.html';
        </script>";
    }
}

// Botão para voltar à página inicial
echo "<div style='margin-top: 20px; text-align: center;'>
        <a href='../paginas/gerenciar.html'>
            <button style='padding: 10px 20px; font-size: 16px;'>Voltar para a página inicial</button>
        </a>
      </div>";

?>