<?php require_once("../conexao/conexao.php"); ?>

<?php
    //Criar inicialização da variável de sessão
    session_start();

    //Definir valor
    $_SESSION["usuario"] = "DGP";
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

           <p>
                <a href="pagina2.php">Página 2</a>
           </p>
        </main>

        <?php include_once("incluir/rodape.php"); ?> 
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>