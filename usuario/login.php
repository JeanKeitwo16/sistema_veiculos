<?php
session_start();

// Se o usuário já está logado, redireciona para a homepage
if (isset($_SESSION['usuario_logado'])) {
    header("Location: ../veiculo/listar.php");
    exit();
}

// Processar login se o formulário foi enviado
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    if ($usuario === 'admin' && $senha === 'admin') {
        $_SESSION['usuario_logado'] = true;
        header("Location: ../veiculo/listar.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Veículos</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <div class="form-container" style="max-width: 400px;">
            <h2>Login</h2>
            
            <?php if ($erro): ?>
                <div class="message error">
                    <?= $erro ?>
                </div>
            <?php endif; ?>
            
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="usuario" class="form-label">Usuário:</label>
                    <input type="text" id="usuario" name="usuario" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" id="senha" name="senha" class="form-input" required>
                </div>
                
                <button type="submit" class="form-button">Entrar</button>
            </form>
            
            <p style="text-align: center; margin-top: 20px;">
                <strong>Usuário padrão:</strong> admin<br>
                <strong>Senha padrão:</strong> admin
            </p>
        </div>
    </div>
</body>
</html>