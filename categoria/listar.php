<?php
    session_start();
    if(!isset($_SESSION["login"]))
    {
        header("location:login.php");
    }
    include_once "../class/categoria.class.php";
    include_once "../class/categoriaDAO.class.php";

    $objDAO = new categoriaDAO();
    $retorno = $objDAO->listar();
?>
<a href="logout.php">Sair</a>
<table border>
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th colspan="2">Ações</th>
    </thead>
    <tbody>
        <?php
        foreach($retorno as $linha){
            echo "<tr>";
            echo "<td>".$linha["id"]."</td>";
            echo "<td>".$linha["nome"]."</td>";
            echo "<td><a href='editar.php?id=".$linha["id"]."'>Editar</a></td>";
            echo "<td><a href='excluir.php?id=".$linha["id"]."'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>