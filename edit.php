<?php
include 'config.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM contatos WHERE id=$id";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    ?>

    <form action="edit.php" method="post">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      Nome: <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>
      Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
      Telefone: <input type="tel" name="telefone" value="<?php echo $row['telefone']; ?>"><br>
      <input type="submit" value="Salvar">
    </form>

    <?php
  } else {
    echo "Registro não encontrado.";
  }
}
$conn->close();
?>
