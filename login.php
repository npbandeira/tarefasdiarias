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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Gerenciador de Tarefas</title>

</head>

<body>
    <header>

    </header>

    <div class="conteudo">
        <section class="content-center">
            <div class="logo">
                <a href="home.php" title="Ir para Pagina Home"> <img src="img/listatarefas.png"></a>
            </div>

            <a href="home.php" title="Ir para Pagina Home">
                <h1 class="titulo1">Gerenciador de Tarefas</h1>
            </a>
            <h3 class="titulo2">Acesse o sistema</h3>
            <?php
            if (isset($_SESSION['cadastrado'])) :
            ?>
                <script>
                    swal("Usuario Cadastrad","", "success");;
                </script>

            <?php
            endif;
            unset($_SESSION['cadastrado']);
            ?>
            <?php
            if (isset($_SESSION['nao_autenticado'])) :
            ?>
            <script> swal("Erro: Usuário ou senha inválidos","","error");
            </script>
            <?php
            endif;

            unset($_SESSION['nao_autenticado']);
            ?>

            <form action="scriptlogin.php" method="POST" id="form-login">

                <div>
                    <label>Login <br></label>
                    <input type="email" name="email" placeholder="E-mail do Usuário" required>
                </div>

                <div>
                    <label>Senha <br></label>
                    <input type="password" name="senha" placeholder="Senha" required>
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