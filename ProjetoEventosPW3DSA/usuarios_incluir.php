<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["cpf"])) {

    $cpf = $_REQUEST["cpf"];
    $nome = $_REQUEST["nome"];

    $sql = "select * from usuarios where usu_cpf = ?";
    $comando = $banco->prepare($sql);
    $comando->execute(array($cpf));
    if($comando->fetch()) {
        $mensagem = "Já existe usuário com esse CPF!";
        echo json_encode(array("mensagem" => $mensagem));
        exit();
    }

    $sql = "insert into usuarios
        (usu_cpf, usu_nome)
        values (?, ?)";
    
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($cpf, $nome));
        
        $mensagem = "Registro inserido com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao inserir o registro!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>

