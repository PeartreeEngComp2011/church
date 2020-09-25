<?php require_once("../conexao/conexao.php"); ?>
<?php
    if(isset($_POST["estadoID"]))
    {
        $nome = $_POST["nome"];
        $nascimento = $_POST["nascimento"];
        $endereco = $_POST["endereco"];
        $dataconversao = $_POST["dataconversao"];
        $telefone = $_POST["telefone"];
        $nomemae = $_POST["nomemae"];
        $nomepai = $_POST["nomepai"];
        $municipio = $_POST["municipio"];
        $estadoID = $_POST["estadoID"];
        $dizimo = $_POST["dizimo"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $id = $_POST["id"];

        //Objeto de alteração
        $alterar  = "UPDATE crente SET nome = '$nome', nascimento = '$nascimento', 
        endereco = '$endereco', dataconversao = '$dataconversao', 
        telefone = '$telefone', nomemae = '$nomemae', nomepai = '$nomepai', 
        municipio = '$municipio', estadoID = $estadoID, dizimo = $dizimo, 
        usuario = '$usuario', senha = '$senha' WHERE id = $id";
        
        $oper_altera = mysqli_query($conecta,$alterar);

        if(!$oper_altera)
        {
            die("Erro no banco!");
        }else
        {
            header("location:listagem.php");
        }
    }
    //Consulta a tabela de crente
    $believer = "SELECT * FROM crente ";

    if(isset($_GET["codigo"]))
    {
        $id = $_GET["codigo"];
        $believer .= " WHERE id = {$id}";
    }else
    {
        $believer .= " WHERE id = 1"; 
    }
    $con_believer = mysqli_query($conecta,$believer);
    if(!$con_believer)
    {
        die("Erro no banco de dados");
    }else
    {
        $info_believer = mysqli_fetch_assoc($con_believer);
    }
    //Consulta a tabela de estados
    $estados = "SELECT estadoID, nome FROM estados ";
    $lista_estados = mysqli_query($conecta,$estados);
    if(!$lista_estados)
    {
        die("Falha no banco");
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
                <form action="alteracao.php" method="post">
                    <h2>Alteração de Cadastro</h2>
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
                    <label>Estado</label>
                    <select name="estadoID" id="estados">
                        <?php
                            $meuestado = $info_believer["estadoID"];
                            while($linha = mysqli_fetch_assoc($lista_estados))
                            {
                                $estado_momento = $linha["estadoID"];
                                if($meuestado == $estado_momento)
                                {
                        ?>
                        <option value="<?php echo $linha["estadoID"];?>" selected>
                            <?php echo $linha["nome"];?>
                        </option>
                        <?php
                            }else
                            {
                        ?>
                        <option value="<?php echo $linha["estadoID"];?>">
                            <?php echo $linha["nome"];?>
                        </option>
                        <?php
                                }
                             }
                        ?>
                    </select>
                    <label>Dízimo</label>
                    <input type="text" value="<?php echo $info_believer["dizimo"] ?>" name="dizimo" placeholder="Dízimo"><br><br>
                    <label>Usuário</label>
                    <input type="text" value="<?php echo $info_believer["usuario"] ?>" name="usuario" placeholder="Usuário"><br><br>
                    <label>Senha</label>
                    <input type="password" value="<?php echo $info_believer["senha"] ?>" name="senha" placeholder="Senha"><br><br>
                    <input type="hidden" value="<?php echo $info_believer["id"] ?>" name="id" placeholder="Id"><br><br>
                    <input type="submit" value="Confirmar Alteração">
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