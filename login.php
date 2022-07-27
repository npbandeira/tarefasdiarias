<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/listatarefas.png"> 
    <link rel="stylesheet" href="css/stylelogin.css">
    <title>Gerenciador de Tarefas</title>
 
</head>

<body>
    <header>

    </header>

    <div class="conteudo">
        <section class="content-center">
            <div class="logo">
                 <img src="img/listatarefas.png">
            </div>

            <h1 class="titulo1">Gerenciador de Tarefas</h1>
            <h3 class="titulo2">Acesse o sistema</h3>


            <?php
            if (isset($_SESSION['nao_autenticado'])) :
            ?>
                <div class="notification is-danger" align="center">
                    <p style="color:red">Erro: Usuário ou senha inválidos.</p>
                </div>

            <?php
            endif;

            unset($_SESSION['nao_autenticado']);
            ?>

            <form action="scriptlogin.php" method="POST" id="form-login">

                <div>
                    <label>Login <br></label>
                    <input type="email" name="email" placeholder="E-mail do Usuário">
                </div>

                <div>
                    <label>Senha <br></label>
                    <input type="password" name="senha" placeholder="Senha">
                </div>

                <div class="botao">
                    <button type="submit">Acessar</button>
                    
                    <a href="cadastro.php"><button type="button">Cadastrar</button></a>
                
                </div>

                <br>
            </form>

        </section>
    </div>

</body>