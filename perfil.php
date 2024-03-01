<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <h2>Perfil do Usuário</h2>
    <p>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</p>
    <p><a href="editar.php">Editar perfil</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
