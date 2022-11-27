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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap"
      rel="stylesheet"
    />
    <title>Login</title>
  </head>
  <body>
    <form method="post">
      <label>E-mail</label>
      <input
        class="form-child"
        type="email"
        name="email"
        id="email"
        placeholder="Digite seu e-mail"
      />
      <label>Senha</label>
      <input
        class="form-child"
        type="password"
        name="password"
        id="password"
        placeholder="Digite sua senha"
      />
      <button type="submit">Entrar</button>
    </form>
  </body>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      color: #e1e1e1;
      font-family: Roboto, system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
        sans-serif;
    }

    body {
      width: 100%;
      height: 100vh;
      background-color: #121212;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    form {
      width: 360px;
      height: 300px;
      display: flex;
      padding: 1rem;
      margin-top: 3rem;
      flex-direction: column;
      align-items: center;
      justify-content: center;

      border-bottom: solid #2aa126 3px;
      border-radius: 4px;
      background-color: #2e2e2e;
      background-color: #222329;
    }

    .form-child {
      width: 100%;
      height: 2.15rem;
      text-align: center;
      margin: 0.35rem 0rem 2rem;
    }

    label {
      color: #2aa126;
    }

    input {
      background-color: #2e2e2e;
      border: none;
      border-radius: 4px;
      outline: none;
      font-size: 0.875rem;
      font-weight: 300;
    }

    button {
      width: 100%;
      height: 2rem;
      text-align: center;
      margin-top: 1rem;

      border: none;
      outline: none;
      height: 2.5rem;
      border-radius: 4px;
      background-color: #2aa126;
      font-size: 1.125rem;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background-color: #247a21;
    }
  </style>
</html>