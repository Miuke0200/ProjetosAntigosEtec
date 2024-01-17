<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "Conexao.php";

if(isset($_REQUEST["cod"])) {

    $cod = $_REQUEST["cod"];

    $sql = "delete from eventos
        where codigo = ?";
    
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($cod));
        
        $mensagem = "Evento excluido com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao excluir o evento!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>