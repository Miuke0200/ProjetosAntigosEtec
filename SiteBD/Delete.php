<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "Conexao.php";

if(isset($_REQUEST["cpf"])) {

    $cpf = $_REQUEST["cpf"];

    $sql = "delete from usuario
        where cpf = ?";
    
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($cpf));
        
        $mensagem = "Registro excluido com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao excluir o registro!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>