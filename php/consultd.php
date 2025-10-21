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

    //consultando todos
    
    $consulta_todo = "SELECT * FROM produtos";
    $resultado2 = $conexao->query($consulta_todo);

    if ($resultado2->num_rows > 0) {
                
                echo "<br><center>LIVRARIA DO SABER - CONSULTA TODOS OS LIVROS<br><br><table border='1'>
                        <tr>
                            <th>id</th>
                            <th>nome</th>
                            <th>descrição</th>
                            <th>quantidade</th>
                            <th>preço</th>
                        </tr>";
                while($linha = $resultado2->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $linha["id_produto"] . "</td>
                            <td>" . $linha["nome"] . "</td>
                            <td>" . $linha["descricao"] . "</td>
                            <td>" . $linha["quantidade"] . "</td>
                            <td>" . $linha["preco"] . "</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "Nenhum livro encontrado.";
            }
   // Botão para voltar à página inicial
        echo "<div style='margin-top: 20px; text-align: center;'> 
                 <a href='../index.html'>
                   <button style='padding: 10px 20px; font-size: 16px;'>Voltar para a página inicial</button>
                 </a>
              </div>";
