<?php
     session_start();

    include("conexao.php");
    $conn=conectar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>
    
    <h1>Listar Registros</h1>

    <?php
            if(isset($_SESSION['cadastrado'])): 
        ?>

        <div class="notification is-danger">
            <p style="color:green">Usuário cadastrado com sucesso! </p>
        </div>
        
        <?php
            endif; 
            unset($_SESSION['cadastrado']); 
        ?>

    <?php

    
        $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);

        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
         
        $limite_resultado = 2;

        $inicio = ($limite_resultado * $pagina) - $limite_resultado;

        $query_usuarios = "SELECT idusuario, nome, email FROM usuario ORDER BY idusuario DESC  LIMIT $inicio, $limite_resultado";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

       
        if (($result_usuarios) AND ($result_usuarios->rowCount() != 0)){ 
            
            while($rowusuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
                extract($rowusuarios);
                echo "ID: $idusuario <br>";
                echo "Nome: $nome <br>";
                echo "Email: $email <br>";
            }

            $query_qnt_registros = "SELECT COUNT(idusuario) AS num_result FROM  usuario "; 
            $result_qnt_registros = $conn->prepare($query_qnt_registros);
            $result_qnt_registros->execute();
            $row_qnt_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);


             $qnt_pagina = ceil($row_qnt_registros['num_result'] / $limite_resultado);

            
            $maximo_link = 3;


             echo "<a href='listar.php?page=1'>Primeira</a> ";

            
            for($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++){

                if($pagina_anterior >= 1){
                    echo "<a href='listar.php?page=$pagina_anterior'>$pagina_anterior</a> ";
                }
            }

          
             echo "$pagina ";


            for($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++){
                if($proxima_pagina <= $qnt_pagina){
                    echo "<a href='listar.php?page=$proxima_pagina'>$proxima_pagina</a> ";
                }
            }

            echo "<a href='listar.php?page=$qnt_pagina'>Última</a> ";

        }else{

            echo "<p style='color:red;'>Erro: Usuário não encontrado!</p>";
      
        }


    ?>
    
</body>
</html>