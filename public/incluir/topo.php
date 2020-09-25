<header>
    <div id="header_central">
        <?php
            if(isset($_SESSION["user_portal"]))
            {
                $user = $_SESSION["user_portal"];
                $saudacao = "SELECT nome ";
                $saudacao .= " FROM crente ";
                $saudacao .= " WHERE id = {$user} ";
                $saudacao_login = mysqli_query($conecta,$saudacao);
                //id="header_saudacao"
                if(!$saudacao_login)
                {
                    die("Falha no banco de dados!");
                }

                $saudacao_login = mysqli_fetch_assoc($saudacao_login);
                $nome = $saudacao_login["nome"];
        ?>

        <div id="header_saudacao">
                
                <h5>Seja bem-vindo(a), <?php echo $nome ?> | <a href="logout.php"> sair </a></h5>
        </div>

        <?php
            }
        ?>
        <img src="img/logo_gileade.gif">
    </div>
</header>