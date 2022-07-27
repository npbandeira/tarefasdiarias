<?php

session_start();

include("conexao.php");
$conn=conectar();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$perfil = 2;

$cadastro = $conn->prepare("INSERT INTO usuario( nome, email, senha, perfil_idperfil) 
 VALUES(:nome, :email, :senha ,$perfil)");

$cadastro->bindValue(":nome", $nome);
$cadastro->bindValue(":email", $email);
$cadastro->bindValue(":senha", $senha);

$verificar=$conn->prepare("SELECT * FROM usuario WHERE email=?");
$verificar->execute(array($email));

if($verificar->rowCount()==0):
    $cadastro->execute();
    echo "Usuario cadastrado com sucesso!";
else:
    echo "E-mail já cadastrado";
endif;

$row=$cadastro->rowCount();

if($row == 1){
    $_SESSION['cadastrado'] = true;
    header('Location:login.php');
    exit();
}
else{
    $_SESSION['nao_cadastrado'] = true;
    header('Location: cadastro.php');
    exit();
}

?>