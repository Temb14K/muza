<?php
session_start();
if (isset($_SESSION['isAuthorized'])) {
  header('Location: ./index.php');
  }
?>


<!DOCTYPE html>
<html lang="ru, en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
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
            <h1 class="input-section__title">Регистрация</h1>
              <form action="./actions/register.php" method="post">
                <div class="input-div"><input class="text-form" type="text" name="name" id="" placeholder="имя"></div>
                <div class="input-div"><input class="text-form" type="text" name="username" id="" placeholder="имя пользователя"></div>
                <div class="input-div"><input class="text-form" type="email" name="email" id="" placeholder="e-mail"></div>
                <div class="input-div"><input class="text-form" type="tel" name="num" id="" placeholder="номер телефона"></div>
                <div class="input-div"><input class="text-form" type="password" name="password" id="" placeholder="пароль"></div>
                <div class="input-div"><input class="text-form" type="password" name="password_conf" id="" placeholder="повтор пароля"></div>
              
                <div class="auth-buttons">
                  <a href="auth.php" class="reg-button reg-button_auth">войти</a>
                  <button type="submit" class="reg-button reg-button_reg">зарегистрироваться</button>
                </div>
              </form>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</html>