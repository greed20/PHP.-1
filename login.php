<?php
    include("db.php");
    if(isset($_SESSION['login']) && $_SESSION['role'] != 'admin'){
      header("Location: index.php");
    }elseif(isset($_SESSION['login']) && $_SESSION['role'] == 'admin'){
      header("Location: admin.php");
    }
    //Логика регистрации
    if(isset($_POST['singup'])){
      $login = htmlspecialchars($_POST["login"]);
      $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_BCRYPT);
      $result = mysqli_query($link, "INSERT INTO `login` (`login`, `password`, `role`) VALUES ('$login ', '$password', 'customer')");
      if(!$result){
        die(mysqli_error($link));
      }
      $_SESSION['login'] = $row['login'];
      $_SESSION['role'] = $row['role'];
      mysqli_close($link);
    }
    //Логика входа
    if(isset($_POST['log'])){
      if(!isset($_SESSION['login'])){
        header("Location: login.php");
      }
      $login = htmlspecialchars($_POST["login"]);
      $password = htmlspecialchars($_POST["password"]);
      $result = mysqli_query($link, "SELECT * FROM `login` WHERE `login` = '$login'");
      $row = mysqli_fetch_assoc($result);
      $passwordHash = $row['password'];
      if(!$result){
        die(mysqli_error($link));
      }
      if(password_verify($password, $passwordHash)){
        $_SESSION['login'] = $row['login'];
        $_SESSION['role'] = $row['role'];
        if($row['role'] == 'admin'){
            header("Location: admin.php");
        }else{
            header("Location: index.php");
        }
      }
      mysqli_close($link);
    }
    //Изначально я сделал отдельные файлы для login и signup но я нашёл проблему 
    //а именно что если ты уже зашёл как пользователь ты можешь вызвать этот файл и он создаст пользователя без пароля и логина в базе данных
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_style.css">
    <title>Document</title>
</head>
<body>
<section class="forms-section">
  <h1 class="section-title">Login Form</h1>
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        Login
        <span class="underline"></span>
      </button>
      <form class="form form-login" method="post">
        <fieldset>
          <legend>Please, enter your Login and password for login.</legend>
          <div class="input-block">
            <label for="login-email">Login</label>
            <input id="login-email" name="login" type="login" required>
          </div>
          <div class="input-block">
            <label for="login-password">Password</label>
            <input id="login-password" name="password" type="password" required>
          </div>
        </fieldset>
        <button type="submit" name="log" class="btn-login">Login</button>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">
        Sign Up
        <span class="underline"></span>
      </button>
      <form class="form form-signup" method="post">
        <fieldset>
          <legend>Please, enter your email, password and password confirmation for sign up.</legend>
          <div class="input-block">
            <label for="signup-email">Login</label>
            <input id="signup-email" name="login" type="login" required>
          </div>
          <div class="input-block">
            <label for="signup-password">Password</label>
            <input id="signup-password" name="password" type="password" required>
          </div>
        </fieldset>
        <button type="submit" name="singup" class="btn-signup">Continue</button>
      </form>

    </div>
  </div>
</section>
<script src="script.js"></script>
</body>
</html>