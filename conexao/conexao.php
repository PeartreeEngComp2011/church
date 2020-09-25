    <?php
        //Passo 1
        $server = "localhost";
        $user = "root";
        $password = "";
        $banco = "church";
        $conecta = mysqli_connect($server,$user,$password,$banco);

        //Passo 2
        if(mysqli_connect_errno())
        {
            die("Conexão falhou: " . mysqli_connect_errno());
        }
    ?>