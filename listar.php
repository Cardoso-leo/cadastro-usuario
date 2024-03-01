<?php
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

// Selecionar todos os usuários
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Usuários Cadastrados</h2>";
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>Nome: " . $row["nome"]. " - Email: " . $row["email"]. "</li>";
    }
    echo "</ul>";
} else {
    echo "Nenhum usuário cadastrado.";
}

$conn->close();
?>
