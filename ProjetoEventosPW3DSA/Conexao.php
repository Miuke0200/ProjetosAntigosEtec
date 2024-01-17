<?php

try {
    $banco = new PDO(
        'mysql:host=carmine;dbname=eventos',
        'aluno',
        'etec@147',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));    
} catch(PDOException $e) {
    echo "banco de dados não disponível";
}

