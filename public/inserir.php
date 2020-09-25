<?php require_once("../conexao/conexao.php"); ?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assembleia de Deus - Gileade</title>
        
        <!-- estilo -->
        <link href="css/estilo_novo.css" rel="stylesheet">
        <link href="css/crente.css" rel="stylesheet">
        <link href="css/crud.css" rel="stylesheet">
        <link href="css/produto1_detalhe.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("incluir/topo.php"); ?>
        <?php include_once("incluir/funcao.php"); ?>
        
        <main> 
            <div id="janela_formulario">
                <form action="postar.php" method="post">
               <!--  <label>Nome: </label> -->
                <input type="text" name="nome" placeholder="Digite o nome completo"><br><br>

                <!-- <label>Data de Nascimento: </label> -->
                <input type="text" name="nascimento" placeholder="Nascimento"><br><br>
                
                <!-- <label>Endereço: </label> -->
                <input type="text" name="endereco" placeholder="Endereço"><br><br>

                <!-- <label>Data de Conversão: </label> -->
                <input type="text" name="dataconversao" placeholder="Conversão"><br><br>

                <!-- <label>Telefone: </label> -->
                <input type="text" name="telefone" placeholder="Telefone"><br><br>

                <!-- <label>Mãe: </label> -->
                <input type="text" name="nomemae" placeholder="Mãe"><br><br>

                <!-- <label>Pai: </label> -->
                <input type="text" name="nomepai" placeholder="Pai"><br><br>

                <!-- <label>Município: </label> -->
                <input type="text" name="municipio" placeholder="Município"><br><br>

                <!-- <label>Estado: </label> -->
                <!-- <input type="text" name="estadoID" placeholder="estadoID"><br><br> -->
                <select name="estados">
                    <?php
                        //selecao de estados
                        $estados = "SELECT nome, estadoID FROM estados";
                        $linha_estados = mysqli_query($conecta,$estados);
                        if(!$linha_estados)
                        {
                            die("Erro no banco!!!");
                        } 
                        // else
                        // { 
                        //     header("location:login.php");
                        // } 
                     ?>

                    <?php
                        while($linha = mysqli_fetch_assoc($linha_estados))
                        {
                    ?>
                            <option value="<?php echo $linha["estadoID"];?>">
                                <?php
                                    echo $linha["nome"];
                                ?>
                            </option>
                    <?php
                        }
                    ?>
                </select>
                
                <!-- <label>Dízimo: </label> -->
                <input type="text" name="dizimo" placeholder="Dízimo"><br><br>

                <!-- <label>Usuário: </label> -->
                <input type="text" name="usuario" placeholder="Usuário"><br><br>

                <!-- <label>Senha: </label> -->
                <input type="password" name="senha" placeholder="Senha"><br><br>
                
                <input type="submit" value="Cadastrar">
                </form>
            </div>
        </main>

        <?php include_once("incluir/rodape.php"); ?> 
    </body>
</html>

<?php
    // Fechar conexao
//    mysqli_close($conecta);
?>