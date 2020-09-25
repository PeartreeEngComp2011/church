<?php require_once("../conexao/conexao.php"); ?>

<?php
    // Iniciar variável de sessão
    session_start();

    if(!isset($_SESSION["user_portal"]))
    {
        header("location:login.php");
    }

    //Testar parâmetro
   if(isset($_GET["codigo"]))
   {
        $crenteID = $_GET["codigo"];
   }else
   {
        Header("Location: listagem.php");
   }
   // Consulta ao banco
   $consulta = "SELECT * ";
   $consulta .= " FROM crente ";
   $consulta .= " WHERE id = {$crenteID}";
   $detalhe = mysqli_query($conecta,$consulta);

   if(!$detalhe)
   {
        die("Falha no banco de dados");
   }else
   {
       $dados_detalhe = mysqli_fetch_assoc($detalhe);
       $crenteID = $dados_detalhe["id"];
       $littlephoto = $dados_detalhe["littlephoto"];
       $nome = $dados_detalhe["nome"];
       $nascimento = $dados_detalhe["nascimento"];
       $endereco = $dados_detalhe["endereco"];
       $dataconversao = $dados_detalhe["dataconversao"];
       $telefone = $dados_detalhe["telefone"];
       $nomemae = $dados_detalhe["nomemae"];
       $nomepai = $dados_detalhe["nomepai"];
       $municipio = $dados_detalhe["municipio"];
       $estado = $dados_detalhe["estado"];
       $dizimo = $dados_detalhe["dizimo"];
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
        <!--<link href="css/crente_detalhe.css" rel="stylesheet">-->
        <link href="css/produto1_detalhe.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("incluir/topo.php"); ?>
        <?php include_once("incluir/funcao.php"); ?>
        
        <main> 
            <div id="detalhe_produto">
                <ul>
                    <li class="imagem"><img src="<?php echo $littlephoto ?>"></li>
                    <li><h2><?php echo $nome ?></h2></li>
                    <li>Nascimento: <?php echo $nascimento ?></li>
                    <li>Endereço: <?php echo $endereco ?></li>
                    <li>Data de conversão: <?php echo $dataconversao ?></li>
                    <li>Telefone: <?php echo $telefone ?></li>
                    <li>Nome da mãe: <?php echo $nomemae ?></li>
                    <li>Nome do pai: <?php echo $nomepai ?></li>
                    <li>Município: <?php echo $municipio ?></li>
                    <li>Estado: <?php echo $estado ?></li>
                    <li>Dízimo: <?php echo real_format($dizimo) ?></li>
                </ul>
            </div>
        </main>

        <?php include_once("incluir/rodape.php"); ?> 
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>