<?php require_once("../conexao/conexao.php"); ?>

<?php
    
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assembleia de Deus - Gileade</title>
        
        <!-- estilo -->
        <link href="css/estilo.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("incluir/topo.php"); ?>
        <?php //include_once("incluir/funcoes.php"); ?>
        
        <main>  
            <form method="POST" action="../conexao/conexao.php">
                <label>Nome: </label>
                <input type="text" name="nome" placeholder="Digite o nome completo"><br><br>

                <label>Data de Nascimento: </label>
                <input type="text" name="nascimento" placeholder="Digite a data de nascimento"><br><br>
                
                <label>Endereço: </label>
                <input type="text" name="endereco" placeholder="Digite o seu endereço"><br><br>

                <label>Data de Conversão: </label>
                <input type="text" name="dataconversao" placeholder="Digite a data de sua conversão"><br><br>

                <label>Telefone: </label>
                <input type="text" name="telefone" placeholder="Digite o seu telefone"><br><br>

                <label>Mãe: </label>
                <input type="text" name="nomemae" placeholder="Digite o nome da mãe"><br><br>

                <label>Pai: </label>
                <input type="text" name="nomepai" placeholder="Digite o nome da mãe"><br><br>

                <label>Município: </label>
                <input type="text" name="municipio" placeholder="Digite o seu município"><br><br>

                <label>Estado: </label>
                <input type="text" name="estado" placeholder="Digite o seu estado"><br><br>
                
                <input type="submit" value="Cadastrar">
            </form>
        </main>

        <?php include_once("incluir/rodape.php"); ?> 
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>