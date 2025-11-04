<?php
include("conexao.php");

    //consultando todos
    
    $consulta_todo = "SELECT * FROM produtos";
    $resultado2 = $conexao->query($consulta_todo);

    if ($resultado2->num_rows > 0) {
                
                echo "<br><center>Estoque total<br><br><table border='1'>
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
                echo "Nenhum produto encontrado.";
            }
   // Botão para voltar à página inicial
        echo "<div style='margin-top: 20px; text-align: center;'> 
                 <a href='../paginas/gerenciar.html'>
                   <button style='padding: 10px 20px; font-size: 16px;'>Voltar</button>
                 </a>
              </div>";
