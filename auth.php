<?php
session_start();
if (isset($_SESSION['isAuthorized']) && $_SESSION['isAuthorized'] != 0) {
  header('Location: ./index.php');
  exit();
  }
?>


<!DOCTYPE html>
<html lang="ru, en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Вход</title>
  <link rel="stylesheet" crossorigin href="/assets/main-g3sUvViC.css">
</head>
<body>
<header class="header">
        <div class="header__inner container">
          <div class="header__inner__top">
            <span class="header__logo logo">
              Net Monitoring AP
            </span>
          </div>
        </div>
    </header>

    <section class="input-section">
        <div class="input-section__inner container">
            <?if (@$_SESSION['article']) {
              echo $_SESSION['article'];
              unset($_SESSION['article']);
            } ?>
            <h1 class="input-section__title">Вход</h1>
            <form id="signin" action="./actions/login.php" method="post">
            <div class="input-div"><input class="text-form" type="text" name="login" placeholder="имя пользователя или email"></div>
            <div class="input-div"><input class="text-form" type="password" name="password" placeholder="пароль"></div>
            <div class="auth-buttons">
                <input type="submit" name="submit" class="auth-button auth-button_auth" value="войти">
                <a href="reg.php" class="auth-button auth-button_reg">зарегистрироваться</a>
            </div>
            </form>
            <a href="./forget.php" class="forget-link">забыли пароль?</a>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</html>