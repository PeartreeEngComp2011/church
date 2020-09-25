<?php require_once("../conexao/conexao.php"); ?>

<?php
    //insercao de dados
    if(isset($_POST["estados"]))
    {
        $nome = $_POST["nome"];
        $nascimento = $_POST["nascimento"];
        $endereco = $_POST["endereco"];
        $dataconversao = $_POST["dataconversao"];
        $telefone = $_POST["telefone"];
        $nomemae = $_POST["nomemae"];
        $nomepai = $_POST["nomepai"];
        $municipio = $_POST["municipio"];
        $estadoID = $_POST["estados"];
        $dizimo = $_POST["dizimo"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $inserir = "INSERT INTO crente ";
        $inserir .= " (nome, nascimento, endereco, dataconversao, telefone, nomemae, nomepai, 
        municipio,estadoID, dizimo, usuario, senha) ";
        $inserir .= " VALUES ('$nome', '$nascimento', '$endereco', '$dataconversao',
        '$telefone', '$nomemae', '$nomepai', '$municipio',$estadoID, 
        $dizimo, '$usuario', '$senha')";
        
        $operacao_inserir = mysqli_query($conecta,$inserir);
         if(!$operacao_inserir)
        {
            die("Falha na inserção!!!");
        }else
        {
            header("location:login.php");
        }
    }
?> 

<?php
    //Fechar conexao
     mysqli_close($conecta);
?>