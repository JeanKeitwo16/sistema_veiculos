<?php
    include_once "../class/categoria.class.php";
    include_once "../class/categoriaDAO.class.php";

    $obj = new categoria();
    $obj->setNome($_POST["nome"]);
    $obj->setId($_POST["id"]);

    $objDAO = new categoriaDAO();
    $retorno = $objDAO->editar($obj);
    if($retorno)
        echo "Editado com sucesso";
    else
        echo "Erro ao editar";

?>