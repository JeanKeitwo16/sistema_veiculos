<?php
session_start();
include_once('class/categoriaDAO.class.php');
$dao = new CategoriaDAO();
$categorias = $dao->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Veículos</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Sistema de Veículos</h1>
    <nav>
      <ul>
        <?php foreach ($categorias as $cat): ?>
          <li><a href="veiculo/listar.php?id_categoria=<?= $cat->getId(); ?>"><?= $cat->getNome(); ?></a></li>
        <?php endforeach; ?>

        <?php if(isset($_SESSION['usuario_id'])): ?>
          <li><a href="veiculo/inserir.php">Cadastrar Veículo</a></li>
          <li><a href="categoria/inserir.php">Cadastrar Categoria</a></li>
          <li><a href="usuario/logout.php">Sair</a></li>
        <?php else: ?>
          <li><a href="usuario/login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <main>
    <section class="busca">
      <form action="veiculo/listar.php" method="get">
        <input type="text" name="modelo" placeholder="Buscar por modelo...">
        <input type="text" name="ano" placeholder="Buscar por ano...">
        <button type="submit">Pesquisar</button>
      </form>
    </section>

    <section>
      <h2>Bem-vindo ao sistema</h2>
      <p>Use o menu acima para acessar as categorias ou pesquise por modelo ou ano do veículo.</p>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Sistema de Veículos</p>
  </footer>
</body>
</html>
