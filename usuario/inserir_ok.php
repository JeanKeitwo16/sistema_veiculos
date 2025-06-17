<?php
    include_once "../class/usuario.class.php";
    include_once "../class/usuarioDAO.class.php";

    $obj = new usuario();
    $obj->setNome($_POST["nome"]);
    $obj->setEmail($_POST["email"]);
    $obj->setSenha(value: $_POST["senha"]);

    $objDAO = new usuarioDAO();
    $retorno = $objDAO->inserir($obj);
    if($retorno)
        echo "Cadastrado com sucesso";
    else
        echo "Erro ao cadastrar";

?>