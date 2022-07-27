<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/cadastro.png"> 
    <link rel="stylesheet"  href="css/stylecad.css">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
  
       <header class="cabecalho">
        <div class="cabecalho1">
            
            <div class="logo">
               <a href="login.php"><img src="img/cadastro.png"></a>
            </div>

            <div class="titulo1">
                <h2>Cadastro de Usuários</h2>
            </div>

        </div>
    </header>

    <div class="conteudo">
        <section class="container">
            <p class="titulo2">Preencha os campos obrigatórios <label>*</label></p>

            <br/>
            <br/>
           
            <?php

                if(isset($_SESSION['cadastrado'])):
            ?>
           
            <div class="notification is-danger" align="center">
                <p style='color:green'>Usuário cadastrado com sucesso!</p>
            </div>

            <?php
                endif; 
                
                unset($_SESSION['cadastrado']);
            ?>

            <?php
                if(isset($_SESSION['nao_cadastrado'])):
            ?>
         
            <div class="notification is-danger" align="center">
                <p style='color:#f00'>Erro:e-mail já cadastrado</p>
            </div>

            <?php
                endif; 
            
                unset($_SESSION['nao_cadastrado']);
            ?>

            <form name="cadaluno" action="scriptcadastro.php" method="POST" id="form-cadastro">
                
                <div>
                    Nome completo: <label>*</label>
                    <input type="text" name="nome" placeholder="Digiste seu nome completo" required>
                </div>
                <div>
                    E-mail: <label>*</label>
                    <input type="email" name="email" placeholder="Digite seu email" required>
                </div>
                <div>
                    Senha: <label>*</label>
                    <input type="password" name="senha" placeholder="Cadastre uma senha" required>
                </div>

                <div class="botao">
                    <button type="submit">Cadastrar</button>
                    <button type="reset">Limpar</button>
                </div>
            </form>

        </section>
    </div>
    
</body>
</html>