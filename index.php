<?php
include 'config.php';

$sql = "SELECT * FROM contatos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Exibir os dados em uma tabela HTML
  echo "<table><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["nome"]."</td><td>".$row["email"]."</td><td>".$row["telefone"]."</td><td><a href='edit.php?id=".$row["id"]."'>Editar</a> | <a href='delete.php?id=".$row["id"]."'>Excluir</a></td></tr>";
  }
  echo "</table>";
} else {
  echo "0 resultados";
}
$conn->close();
?>
