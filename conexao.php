<?php
//Script para conectar com o Banco de Dados com PDO

//Criando uma função para utilizar em outros arquivos
function conectar(){


    try{
        $conn = new PDO("mysql:host=localhost; dbname=tarefasdiarias", "root", "");
    }catch(PDOException $e){
        die('Não foi possível conectar com o banco de dados');
    }
        return $conn;
}
?>