<?php
    if(!isset($_GET["livro"])){
        header("Location :index.php");
        exit;
    }
    $nome = "%".trim($_GET["livro"])."%";
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=biblioteca','root',12345);
    $std = $dbh ->prepare('SELECT * FROM `livro` WHERE `nome` LIKE :nome');
    $std->bindParam(':nome', $nome, PDO::PARAM_STR);
    $std->execute();

    $result = $std->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>resultados</h2>
    <?php
    if($result){
        $i =0;
        foreach($result as $resultado){
            echo "$i - ".$resultado['nome']."<br/>";
            $i = $i + 1;
        }}else{
            echo '<label>Resultado nao encontrado</label>';
        }
        ?>
    
</body>
</html>
