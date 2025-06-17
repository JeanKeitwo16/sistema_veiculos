<?php
session_start();

include_once "../class/veiculoDAO.class.php";
include_once "../class/categoriaDAO.class.php";

$veiculoDAO = new veiculoDAO();
$categoriaDAO = new categoriaDAO();

$id_categoria = $_GET['id_categoria'] ?? null;
$modelo = $_GET['modelo'] ?? null;
$ano = $_GET['ano'] ?? null;

$retorno = $veiculoDAO->listarComFiltros($id_categoria, $modelo, $ano);
$categorias = $categoriaDAO->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistema de Veículos</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="header-container">
                <div class="logo">Sistema<span>Veículos</span></div>
                <nav class="nav-menu">
                    <a href="#" class="nav-link">Home</a>
                    <a href="inserir.php" class="nav-link">Cadastrar Veículo</a>
                    <a href="../categoria/inserir.php" class="nav-link">Cadastrar Categoria</a>
                </nav>
                <a href="../usuario/logout.php" class="logout-button">Sair</a>
            </div>
        </header>

        <!-- Menu de Categorias -->
        <div class="categories-menu">
            <div class="categories-title">Categorias:</div>
            <div class="categories-list">
                <a href="listar.php" class="category-item">Todos</a>
                <?php foreach ($categorias as $categoria): ?>
                    <a href="listar.php?id_categoria=<?= $categoria['id'] ?>" class="category-item">
                        <?= htmlspecialchars($categoria['nome']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Formulários de Filtro -->
        <div class="filters">
            <div class="filter-group">
                <form action="listar.php" method="get">
                    <label for="modelo">Pesquisar por modelo:</label>
                    <input type="text" name="modelo" id="modelo" class="filter-input" 
                           placeholder="Digite o modelo" value="<?= htmlspecialchars($modelo ?? '') ?>">
                    <button type="submit" class="filter-button">Buscar</button>
                </form>
            </div>
            
            <div class="filter-group">
                <form action="listar.php" method="get">
                    <label for="ano">Pesquisar por ano:</label>
                    <input type="number" name="ano" id="ano" class="filter-input" 
                           placeholder="Digite o ano" value="<?= htmlspecialchars($ano ?? '') ?>">
                    <button type="submit" class="filter-button">Buscar</button>
                </form>
            </div>
            
            <div class="filter-group">
                <a href="listar.php" class="clear-filters">Limpar todos os filtros</a>
            </div>
        </div>

        <h2>Lista de Veículos</h2>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message <?= $_SESSION['message_type'] ?>">
                <?= $_SESSION['message'] ?>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        
        <?php if (count($retorno) > 0): ?>
            <table class="vehicles-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Placa</th>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Categoria</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($retorno as $linha): ?>
                        <tr>
                            <td><?= $linha["id"] ?></td>
                            <td><?= htmlspecialchars($linha["placa"]) ?></td>
                            <td><?= htmlspecialchars($linha["modelo"]) ?></td>
                            <td><?= $linha["ano"] ?></td>
                            <td>
                                <?php 
                                $categoria_nome = '';
                                foreach ($categorias as $cat) {
                                    if ($cat['id'] == $linha['id_categoria']) {
                                        $categoria_nome = htmlspecialchars($cat['nome']);
                                        break;
                                    }
                                }
                                echo $categoria_nome;
                                ?>
                            </td>
                            <td>
                                <img src="../img/<?= htmlspecialchars($linha['imagem']) ?>" 
                                     alt="Imagem do veículo" class="vehicle-image">
                            </td>
                            <td class="actions-cell">
                                <a href="ver.php?id=<?= $linha["id"] ?>" class="action-button view">Ver</a>
                                <a href="editar.php?id=<?= $linha["id"] ?>" class="action-button edit">Editar</a>
                                <a href="excluir.php?id=<?= $linha["id"] ?>" class="action-button delete">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="message">
                Nenhum veículo encontrado.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>