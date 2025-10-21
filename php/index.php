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

//pegando do formulario e jogando no banco

$nom = $_POST["nome"];
$desc = $_POST["descri"];
$quant = $_POST["quanti"];
$preco = $_POST["price"];

$sql = "INSERT INTO produtos (nome, descricao, quantidade, preco)
        VALUES (?,?,?,?)";

//traz segurança evitando erros
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssis",$nom, $desc, $quant, $preco);


if($stmt->execute()){
    echo "<script>alert('Produto cadastrado com sucesso!');</script>";
    header("Location: ../paginas/gerenciar.html");
       
    } else {
        echo "<script>alert('Erro ao cadastrar produto: " . $stmt->error . "');</script>";
    }
    

    $stmt->close();
    $conexao->close();

?>