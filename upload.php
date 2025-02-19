<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $target_dir = "uploads/"; // Diretório onde os arquivos serão salvos
  $target_file = $target_dir . basename($_FILES["arquivo"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Verifica se o arquivo é uma imagem ou outro tipo permitido
  $check = getimagesize($_FILES["arquivo"]["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }

  // Verifica se o arquivo já existe
  if (file_exists($target_file)) {
    $uploadOk = 0;
  }

  // Verifica o tamanho do arquivo
  if ($_FILES["arquivo"]["size"] > 500000) {
    $uploadOk = 0;
  }

  // Permite apenas alguns formatos de arquivo
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif") {
    $uploadOk = 0;
  }

  // Verifica se $uploadOk está definido como 0 por causa de um erro
  if ($uploadOk == 0) {
    echo "Desculpe, o arquivo não foi enviado.";
  // Se tudo estiver ok, tenta enviar o arquivo
  } else {
    if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file)) {
      echo "O arquivo " . basename($_FILES["arquivo"]["name"]) . " foi enviado.";
    } else {
      echo "Desculpe, houve um erro ao enviar seu arquivo.";
    }
  }
}
?>
