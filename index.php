<?php

  if(isset($_POST['submit']))
  {

    include_once('config.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha) VALUES ('$nome','$email','$senha')");

  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cria conta</title>

  <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Helvetica, sans-serif;
        }

        body {
            align-items: center;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
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
            color: #666;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .textfield {
            display: flex;
            flex-direction: column;
            gap: 5px;
            padding: 10px;
        }

        label {
            color: #555;
            font-weight: bold;
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
            margin-left:15%;
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
            margin-right:10%;
        }

        a:hover {
            color: #0056b3;
        }
    </style>

</head>
<body>

    <form action="index.php" method="POST">
        <div class="login">
            <h1>Criar Conta</h1>
            <div class="textfield">
                <input type="text" name="nome" placeholder="Nome" required>
            </div><!--textfield-->

            <div class="textfield">
                <input type="email" name="email" placeholder="Email" required>
            </div><!--textfield-->

            <div class="textfield">
                <input type="password" name="senha" placeholder="Senha" required>
            </div><!--textfield-->
            <button class="btn-login" type="submit" name="submit">Cadastre-se</button>
            <a href="pages/login.php">Já possuo conta</a>
        </div><!--login-->

    </form><!--form-->

</body>
</html>