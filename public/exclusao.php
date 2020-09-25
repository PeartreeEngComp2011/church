<?php require_once("../conexao/conexao.php"); ?>
<?php
    //Excluir transportadora
    if(isset($_POST["nome"]))
    {
        $id = $_POST["id"];
        $exclusao = "DELETE FROM crente WHERE id = $id";
        $consulta_exclusao = mysqli_query($conecta, $exclusao);
        if(!$consulta_exclusao)
        {
            die("Erro no banco!");
        }else
        {
            header("location:listagem.php");
        }
    }
    //Consulta ao banco de dados
    if(isset($_GET["codigo"]))
    {
        $id = $_GET["codigo"];
        $crente = "SELECT * FROM crente WHERE id = {$id}";
        $consulta_crente = mysqli_query($conecta,$crente);
        if(!$consulta_crente)
        {
            die("Erro no banco!");
        }
    }else
    {
        header("location:listagem.php");
    } 
    $info_believer = mysqli_fetch_assoc($consulta_crente);
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Assembleia de Deus - Gileade</title>
        
        <!-- estilo -->
        <link href="css/estilo_novo.css" rel="stylesheet">
        <link href="css/alteracao.css" rel="stylesheet">
    </head>
    <body>
        <?php include_once("incluir/topo.php"); ?>
        <?php include_once("incluir/funcao.php"); ?> 
        
        <main>  
            <div id="janela_formulario">
                <form action="exclusao.php" method="post">
                    <h2>Exclusão de Cadastro</h2>
                     <label>Nome</label>
                    <input type="text" value="<?php echo $info_believer["nome"] ?>" name="nome" placeholder="Digite o nome completo"><br><br>
                    <label>Nascimento</label>
                    <input type="text" value="<?php echo $info_believer["nascimento"] ?>" name="nascimento" placeholder="Nascimento"><br><br>
                    <label>Endereço</label>
                    <input type="text" value="<?php echo $info_believer["endereco"] ?>" name="endereco" placeholder="Endereço"><br><br>
                    <label>Data de Conversão</label>
                    <input type="text" value="<?php echo $info_believer["dataconversao"] ?>" name="dataconversao" placeholder="Conversão"><br><br>
                    <label>Telefone</label>
                    <input type="text" value="<?php echo $info_believer["telefone"] ?>" name="telefone" placeholder="Telefone"><br><br>
                    <label>Mãe</label>
                    <input type="text" value="<?php echo $info_believer["nomemae"] ?>" name="nomemae" placeholder="Mãe"><br><br>
                    <label>Pai</label>
                    <input type="text" value="<?php echo $info_believer["nomepai"] ?>" name="nomepai" placeholder="Pai"><br><br>
                    <label>Município</label>
                    <input type="text" value="<?php echo $info_believer["municipio"] ?>" name="municipio" placeholder="Município"><br><br>
                    <label>Dízimo</label>
                    <input type="text" value="<?php echo $info_believer["dizimo"] ?>" name="dizimo" placeholder="Dízimo"><br><br>
                    <label>Usuário</label>
                    <input type="text" value="<?php echo $info_believer["usuario"] ?>" name="usuario" placeholder="Usuário"><br><br>
                    <label>Senha</label>
                    <input type="password" value="<?php echo $info_believer["senha"] ?>" name="senha" placeholder="Senha"><br><br>
                    <input type="hidden" value="<?php echo $info_believer["id"] ?>" name="id" placeholder="Id"><br><br>
                    <input type="submit" value="Confirmar Exclusão">
                </form>
            </div>
        </main>
        <?php include_once("incluir/rodape.php"); ?>  
    </body>
</html>
<?php
    // Fechar conexao
    mysqli_close($conecta);
?>