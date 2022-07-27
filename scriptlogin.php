<?php
session_start();

include("conexao.php");
$conn=conectar();

if(empty($_POST["email"]) || empty($_POST["senha"])){
    header("Location: login.php");//Redirecionando o usuário
    exit();
}

//Recuperando os dados do formulário
$email = $_POST['email'];
$senha = md5($_POST['senha']);

//criando uma query para verficar se os dados do usuario sao validos
$query = $conn->prepare("SELECT * FROM usuario WHERE email= :e and senha = :s");

//Validando os dados no banco de dados
$query->bindValue(":e", $email);
$query->bindValue(":s", $senha);


//Executando a consulta com o método execute
$query->execute();
$dados = $query->fetchAll(PDO::FETCH_ASSOC);

var_dump($dados);

$row=$query->rowCount();//Função para contar linhas

//echo $row;

//Criar um condição para verificar o retorno da consulta
//Se for VERDADEIRO redirecionar o usuário para uma sessão no sistema.
//Se for FALSO redirecionar o usuário para a página de login.
if($row == 1){
    $dados = $query->fetchAll(PDO::FETCH_ASSOC);

    var_dump($dados);

    $_SESSION['usuario'] = $email;
    $_SESSION['perfil'] = $dados['perfil_idperfil'];
    $_SESSION['nome'] = $dados['nome'];
    header("Location: listar.php");
    exit();
}

else{
    $_SESSION['nao_autenticado'] = true;
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    echo $login,$senha;
    header("location: login.php");
    exit();
}

?>