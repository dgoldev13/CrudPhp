<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];

  // Prepara a consulta SQL (previne injeção de SQL)
  $stmt = $conn->prepare("UPDATE contatos SET nome=?, email=?, telefone=? WHERE id=?");
  $stmt->bind_param("sssi", $nome, $email, $telefone, $id);

  if ($stmt->execute()) {
    echo "Registro atualizado com sucesso!";
    header("Location: index.php"); // Redireciona para a página principal
  } else {
    echo "Erro ao atualizar registro: " . $stmt->error;
  }

  $stmt->close();
}
$conn->close();
?>
