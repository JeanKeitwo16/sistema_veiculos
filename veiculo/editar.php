<?php
$id = $_GET["id"];
include_once "../class/veiculo.class.php";
include_once "../class/veiculoDAO.class.php";

$objDAO = new veiculoDAO();
$retorno = $objDAO->retornarUnico($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Editar veiculo</h2>
    <form action="veiculo_ok.php" method="POST">
        Placa: <input type="text" name="placa" id="placa" 
        value="<?=$retorno['placa']?>">
        <br>
        Cor: <input type="text" name="cor" id="cor" 
        value="<?=$retorno['cor']?>">
        <br>
        Modelo: <input type="text" name="modelo" id="modelo" 
        value="<?=$retorno['modelo']?>">
        <br>
        Marca: <input type="text" name="marca" id="marca" 
        value="<?=$retorno['marca']?>">
        <br>
        Ano: <input type="text" name="ano" id="ano" 
        value="<?=$retorno['ano']?>">
        <br>
        Id da Categoria: <input type="text" name="id_categoria" id="id_categoria" 
        value="<?=$retorno['id_categoria']?>">
        <br>
        Imagem: <input type="file" name="imagem" id="imagem" value="<?=$retorno['imagem']?>"/>
        <br>
        <input type="hidden" name="id"   
          value="<?=$retorno['id']?>">    
        <button type="submit">Enviar</button>
    </form>
</body>
</html>