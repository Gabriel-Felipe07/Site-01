<?php

  include('../config.php');

  if(isset($_POST['email']) || isset($_POST['senha'])){
    if(strlen($_POST['email']) == 0){
      echo "Preencha seu email";
    }else if(strlen($_POST['senha']) == 0){
      echo "Preencha sua senha";
    }else{
      $email = $conexao->real_escape_string($_POST['email']);
      $senha = $conexao->real_escape_string($_POST['senha']);

      $sql_code = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
      $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

      $quantidade = $sql_query->num_rows;
      
      if($quantidade == 1){

        $usuario = $sql_query->fetch_assoc();

        if(password_verify($senha,$senhaCripto)){
          echo "sucesso!";
        }else{
          echo "Falha!";
        }

        if(!isset($_SESSION)){
          session_start();
        }

        $_SESSION['user'] = $usuario['ID'];
        $_SESSION['nome'] = $usuario['nome'];

        header("location: main.html");

      }else{
        echo "Falha ao logar! E-mail ou senha incorretos";
      }

    }
  }

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Login</title>

  <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Helvetica, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #444;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login {
            background-color: #fff;
            padding: 60px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease;
        }

        .login:hover{
            transform:translateY(-5px);
        }

        .login h1 {
            font-size: 32px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .textfield {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }


        input {
            width: 100%;
            padding: 15px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .btn-login {
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            text-align: center;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            margin-left:25%;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #007BFF;
            text-decoration: none;
            margin-right:15%;
        }

        a:hover {
            color: #0056b3;
        }
    </style>

</head>
<body>

    <form action="" method="POST">

        <div class="login">
            <h1>LOGIN</h1>
            <div class="textfield">
            <input type="email" name="email" placeholder="E-mail" required>
            </div><!--textfield-->

            <div class="textfield">
            <input type="password" name="senha" placeholder="Senha" required>
            </div><!--textfield-->
            
            
            <button class="btn-login" type="submit">Login</button>
            <br>
            <a href="../index.php">Criar conta</a>
        </div><!--login-->

    </form><!--form-->

</body>
</html>