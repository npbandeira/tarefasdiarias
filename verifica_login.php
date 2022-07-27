<?php 
session_start();

include("conexao.php");
$conn = conectar();

$login = $_POST['login'];
$senha = md5($_POST['senha']);

$query = $conn->prepare("SELECT idusuario FROM usuario WHERE email= :e and senha = :s");
$query->bindValue(":e", $email);
$query->bindValue(":s", $senha);
$query->execute();

$dados = $query->fetchAll(PDO::FETCH_ASSOC);

var_dump($dados);

?>