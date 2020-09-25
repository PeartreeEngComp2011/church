<?php require_once("../conexao/conexao.php"); ?>

<?php
    // Iniciar variável de sessão
    session_start();

    if(!isset($_SESSION["user_portal"]))
    {
        header("location:login.php");
    }
    // Consulta ao banco de dados - crente
    $crente = "SELECT id, nome, nascimento, endereco, littlephoto , dizimo ";
    $crente .= " FROM crente ";
    if(isset($_GET["crente"]))
    {
        $nome_crente = $_GET["crente"];
        $crente .= " WHERE nome LIKE '%{$nome_crente}%' ";
    }
    $resultado = mysqli_query($conecta,$crente);

    if(!$resultado)
    {
        die("Falha na consulta ao banco");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assembleia de Deus - Gileade</title>
        
        <!-- estilo -->
        <link href="css/estilo_novo.css" rel="stylesheet">
        <link href="css/crente.css" rel="stylesheet">
        <link href="css/produto_pesquisa.css" rel="stylesheet"> 
        <link href="css/novo-alteracao.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("incluir/topo.php"); ?>
        <?php include_once("incluir/funcao.php"); ?>
        
        <main> 
            <div id="janela_pesquisa">
                <form action="listagem.php" method="get">
                    <input type="text" name="crente" placeholder="Nome">
                    <input type="image" name="pesquisa" src="assets/botao_search.png">
                </form>
            </div>

            <div id="listagem_crente"> 
                <?php
                    //echo $_SESSION["user_portal"];
                    while($linha = mysqli_fetch_assoc($resultado))
                    {
                ?>
                    <ul>
                        <!-- <li class="imagem">
                            <a href="detalhe.php?codigo=<?php echo $linha["id"] ?> ">
                                <img src="<?php echo $linha["littlephoto"]?>">
                            </a>
                        </li> -->

                        <li><h3><?php echo $linha["nome"]?></h3></li>
                        <li>Data de Nascimento: <?php echo $linha["nascimento"]?></li>
                        <li>Endereço: <?php echo $linha["endereco"]?></li>
                        <li>Dízimo: <?php echo real_format($linha["dizimo"])?></li>
                        <li><a href="alteracao.php?codigo=<?php echo $linha["id"] ?>">Alterar</a> </li>
                        <li><a href="exclusao.php?codigo=<?php echo $linha["id"] ?>">Excluir</a> </li>
                    </ul>
                <?php
                    }
                ?>  
            </div> 
        </main>

        <?php include_once("incluir/rodape.php"); ?> 
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>