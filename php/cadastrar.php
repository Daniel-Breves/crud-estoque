<?php
include("conexao.php");

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

if ($nom == "" || $desc == "" || $quant == "" || $preco == "") {
    echo "<script>
        alert('Preencha todos os campos');
        window.location.href = '../paginas/gerenciar.html';
    </script>";
    exit;
}


if($stmt->execute()){
    echo "<script>alert('Produto cadastrado com sucesso!');</script>";
    header("Location: ../paginas/gerenciar.html");
       
    } else {
        echo "<script>alert('Erro ao cadastrar produto: " . $stmt->error . "');</script>";
    }
    

    $stmt->close();
    $conexao->close();

?>