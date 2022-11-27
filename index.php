<?php
ini_set("display_errors", 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $servername_mysql = "localhost";
  $username_mysql = "root";
  $password_mysql = "root";

  $class_css_status_success = "status-login-success";
  $class_css_status_error = "status-login-error";
  $class_css_query_sql = "query-sql";

  try {
    $conn = new PDO("mysql:host=$servername_mysql;dbname=sqlinjection", $username_mysql, $password_mysql);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "SELECT email, password FROM usuario WHERE email='$email' AND password = '$password'";
    echo "<div class=$class_css_query_sql>$query</div>";
    $result = $conn->query($query);
    $result->execute();
    $rows = $result->fetch();
    if ($rows) {
      echo "<div class=$class_css_status_success>Logado com sucesso</div>";
    } else {
      echo "<div class=$class_css_status_error>Não logou. Tente novamente</div>";
    }
  } catch(PDOException $e) {
    echo "<div class=$class_css_status_error>Connection failed: " . $e->getMessage()."</div>";
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300;500&display=swap" rel="stylesheet"> 
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
      padding: 2rem;
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

    .query-sql {
      font-family: Roboto Mono, roboto, system-ui, -apple-system,
        BlinkMacSystemFont, "Segoe UI", Oxygen, Ubuntu, Cantarell, "Open Sans",
        "Helvetica Neue", sans-serif;
      border: solid 1px #757575;
      border-radius: 6px;
      font-weight: 300;
      font-size: 0.875rem;
      background-color: #2e2e2e;
      width: auto;
      padding: 1rem;
    }

    .status-login-success {
      background-color: #222329;
      border: solid 2px #2aa126;
      width: auto;
      padding: 1rem;
      margin-top: 2rem;
      border-radius: 6px;
      color: #2aa126;
    }

    .status-login-error {
      background-color: #222329;
      border: solid 2px #d3352a;
      width: auto;
      padding: 1rem;
      margin-top: 2rem;
      border-radius: 6px;
      color: #d3352a;
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