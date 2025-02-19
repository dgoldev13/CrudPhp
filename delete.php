<?php
include 'config.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Prepara a consulta SQL (previne injeção de SQL)
  $stmt = $conn->prepare("DELETE FROM contatos WHERE id=?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    echo "Registro excluído com sucesso!";
    header("Location: index.php"); // Redireciona para a página principal
  } else {
    echo "Erro ao excluir registro: " . $stmt->error;
  }

  $stmt->close();
}
$conn->close();
?>
