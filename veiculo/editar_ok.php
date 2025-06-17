<?php
    include_once "../class/veiculo.class.php";
    include_once "../class/veiculoDAO.class.php";

    $obj = new veiculo();
    $obj->setId($_POST["id"]);
    $obj->setPlaca($_POST["placa"]);
    $obj->setCor($_POST["cor"]);
    $obj->setModelo($_POST["modelo"]);
    $obj->setMarca($_POST["marca"]);
    $obj->setAno($_POST["ano"]);
    $obj->setIdCategoria($_POST["id_categoria"]);
    $obj->setImagem($_POST["imagem"]);

    $objDAO = new veiculoDAO();
    $retorno = $objDAO->editar($obj);
    if($retorno)
        echo "Editado com sucesso";
    else
        echo "Erro ao editar";

?>