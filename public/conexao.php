<?php 
    require_once("../conexao/conexao.php");
    
    // passo 3
    $consulta_crente  = "SELECT nome, endereco, telefone ";
    $consulta_crente .= " FROM crente";
    //$consulta_crente .= " WHERE tempoentrega = 5";
    $crentes = mysqli_query($conecta, $consulta_crente );

    if( !$crentes) 
    {
        die("Falha na consulta ao banco de dados");
    }

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Assembleia de Deus - Gileade</title>
    </head>

    <body>
        <ol>
        <?php
            while ( $registro = mysqli_fetch_assoc($crentes)) 
            {
        ?>
                <li><?php echo $registro["nome"]  ?></li>
    
        <?php    
            }
        ?>
        </ol>

        <?php
            mysqli_free_result($crentes);
        ?>

    </body>
</html>
<?php
    mysqli_close($conecta);
?>