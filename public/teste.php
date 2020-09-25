<?php require_once("../conexao/conexao.php"); ?>

<?php
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
        $id = $_POST["id"];

        //Objeto de alteração
        $alterar = "UPDATE crente ";
        $alterar .= " SET ";
        $alterar .= " nome = '{$nome}', ";
        $alterar .= " nascimento = '{$nascimento}', ";
        $alterar .= " endereco = '{$endereco}', ";
        $alterar .= " dataconversao = '{$dataconversao}', ";
        $alterar .= " telefone = '{$telefone}', ";
        $alterar .= " nomemae = '{$nomemae}', ";
        $alterar .= " nomepai = '{$nomepai}', ";
        $alterar .= " municipio = '{$municipio}', ";
        $alterar .= " estados = {$estadoID}, ";
        $alterar .= " dizimo = {$dizimo}, ";
        $alterar .= " usuario = '{$usuario}', ";
        $alterar .= " senha = '{$senha}' ";
        $alterar .= " WHERE id = {$id}";

        $oper_alter = mysqli_query($conecta,$alterar);

        if(!$oper_alter)
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

<?php
    //Fechar conexao
     mysqli_close($conecta);
?>