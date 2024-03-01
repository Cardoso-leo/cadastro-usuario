<?php
session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$database = "cadastro_usuarios";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Recuperar dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Consultar o banco de dados para verificar as credenciais
$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row['senha'])) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['nome'] = $row['nome'];
        header("Location: perfil.php");
    } else {
        echo "Senha incorreta. <a href='login.php'>Tente novamente</a>.";
    }
} else {
    echo "E-mail não encontrado. <a href='login.php'>Tente novamente</a>.";
}

$conn->close();
?>
