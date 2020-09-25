<?php require_once("../conexao/conexao.php"); ?>
<?php
    $array_erro = array(
        UPLOAD_ERR_OK => "Sem erro.",
        UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
        UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
        UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
        UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
        UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
        UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
        UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
    ); 

   if(isset($_POST["enviar"]))
   {
        $pasta_temporaria = $_FILES["upload_file"]["tmp_name"];
        $arquivo=$_FILES["upload_file"]["name"];
        $pasta = "uploads";

        if(move_uploaded_file($pasta_temporaria,$pasta . "/" . $arquivo))
        {
            $mensagem = "Arquivo publicado com sucesso.";
        }else
        {
            $mensagem = "Erro na publicação";
        }

   }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Assembleia de Deus - Gileade</title>
        
        <!-- estilo -->
        <link href="css/estilo_novo.css" rel="stylesheet">
        <link href="css/crente.css" rel="stylesheet"> 
        <link href="css/crud.css" rel="stylesheet">
        <link href="css/alteracao.css" rel="stylesheet">
        <link href="css/novo-alteracao.css" rel="stylesheet">
    </head>
    <body>
        <?php include_once("incluir/topo.php"); ?>
        <?php include_once("incluir/funcao.php"); ?> 
        
        <main>  
            <div id="janela_formulario">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="45000"> -->

                    <input type="file" name="upload_file">
                    <input type="submit" name="enviar">
                </form>

                <?php
                    if(isset($mensagem))
                    {
                        echo $mensagem;
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