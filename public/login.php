<?php require_once("../conexao/conexao.php"); ?>

<?php
    //inicar variável de sessão
    session_start();

    if(isset($_POST["usuario"]))
    {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $login = "SELECT * ";
        $login .= " from crente ";
        $login .= " where usuario = '{$usuario}' and senha = '{$senha}' ";

        $acesso = mysqli_query($conecta,$login);

        if(!$acesso)
        {
            die("Falha na consulta ao banco!!!");
        }

        $informacao = mysqli_fetch_assoc($acesso);

        if(empty($informacao))
        {
            $mensagem = "Login sem sucesso";
        }else
        {
            $_SESSION["user_portal"] = $informacao["id"];
            header("location:listagem.php");
        }
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
        <link href="css/login.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("incluir/topo.php"); ?>
        <?php include_once("incluir/funcao.php"); ?>
        
        <main> 
           <div id="janela_login">
                <form action="login.php" method="post">
                    <h2>Tela de Login</h2>
                    <input type="text" name="usuario" placeholder="Usuário">
                    <input type="password" name="senha" placeholder="Senha">
                    <input type="submit" value="Login">
                    
                    <?php
                        if(isset($mensagem))
                        {
                    ?>
                            <p><?php echo $mensagem?></p>
                    <?php
                        }
                    ?>
                </form>
                <!-- <div id="janela_login">
                    <form action="inserir.php">
                        <input type="submit" value="Cadastrar">
                    </form> 
                </div> -->
                
           </div>
        </main>

        <?php include_once("incluir/rodape.php"); ?> 
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>