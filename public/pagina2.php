<?php require_once("../conexao/conexao.php"); ?>

<?php
    //Criar inicialização da variável de sessão
    session_start();

    //Caso não esteja configurado o usuário, será enviado para a página1.php
    //Página de login
    if(!isset($_SESSION["usuario"]))
    {
        header("Location:pagina1.php");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assembleia de Deus - Gileade</title>
        
        <!-- estilo -->
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/crente.css" rel="stylesheet">
        <link href="css/produto_pesquisa.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("incluir/topo.php"); ?>
        <?php include_once("incluir/funcao.php"); ?>
        
        <main> 
           <?php
                echo $_SESSION["usuario"];
           ?>
        </main>

        <?php include_once("incluir/rodape.php"); ?> 
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>