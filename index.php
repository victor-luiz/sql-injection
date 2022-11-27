<?php
ini_set("display_errors", 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $servername_mysql = "localhost";
  $username_mysql = "root";
  $password_mysql = "root";

  try {
    $conn = new PDO("mysql:host=$servername_mysql;dbname=sqlinjection", $username_mysql, $password_mysql);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "SELECT email, password FROM usuario WHERE email='$email' AND password = '$password'";
    echo $query;
    $result = $conn->query($query);
    $result->execute();
    $rows = $result->fetch();
    if ($rows) {
      echo "Logado com sucesso";
    } else {
      echo "Não logou. Tente novamente";
    }
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <form method="post">
    <label>E-mail: </label>
    <input type="email" name="email" id="email" placeholder="Digite seu e-mail">
    <label>Senha: </label>
    <input type="text" name="password" id="password" placeholder="Digite sua senha">
    <button type="submit">Entrar</button>
  </form>
</body>
</html>