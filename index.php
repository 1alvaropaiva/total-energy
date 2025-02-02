<?php
session_start();
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Total Energy</title>
  <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style/index.css">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
  <main class="w-100 m-auto form-container">
    <form action="login.php" method="POST">
      <img src="./img/logo.jpg" class="mb-4" height="57" width="72" style="border-radius: 20px;">
      <h3 class="id text-center">Identificação do Usuário</h3>
      <div class="form-floating mb-1">
        <input type="text" class="form-control" id="floatinInput" name="username" placeholder="Login">
        <label class="floatinEmail" for="floatinInput">Login</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatinSenha" name="password" placeholder="Senha">
        <label class="floatinPw" for="floatinSenha">Senha</label>
      </div>
      <div class="form-check text-center my-3">
        <a class="resetpw" href="resetpw.php">Esqueci minha senha</a>
        <a class="resetpw" href="cadastro.php">Cadastrar</a>
      </div>
      <button class="btn btn-primary w-100 py-2">Entrar</button>
    </form>
  </main>
</body>


</html>