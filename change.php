<?php
session_start();
if (!isset($_SESSION['isChangingStepTwo'])){
  header('Location: ./index.php');
}
?>


<!DOCTYPE html>
<html lang="ru, en">
<head>
    <link rel="icon" href="./favicon/favicon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Смена пароля</title>
  <script type="module" crossorigin src="/assets/main-Bm5EvEUd.js"></script>
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
            <h1 class="input-section__title">Введите новый пароль</h1>
            <form action="./actions/changing.php" method="post">
            <div class="input-div"><input class="text-form" type="password" name="new-password" placeholder="новый пароль"></div>
            <div class="input-div"><input class="text-form" type="password" name="conf-password" placeholder="подтвердите пароль"></div>
            <button type="submit" class="auth-button auth-button_confirm">подтвердить</button>
            </div>
            </form>
        </div>
    </section>
</html>