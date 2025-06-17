<?php
include_once "../class/veiculo.class.php";
include_once "../class/veiculoDAO.class.php";
$id = $_GET["id"];
$objDAO = new veiculoDAO();
$retorno = $objDAO->delete($id);
if ($retorno)
    header("location:listar.php?deleteOk");
else
    header("location:listar.php?deleteN");
?>