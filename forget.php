<?php
session_start();
if (isset($_SESSION['isAuthorized'])) {
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
            <h1 class="input-section__title">Введите e-mail, указанный при регистрации</h1>
            <form action="./actions/send.php" method="post">
            <div class="input-div"><input class="text-form" type="text" name="reg-email" placeholder="e-mail, указанный при регистрации"></div>
            <button type="submit" class="auth-button auth-button_confirm">подтвердить</button>
            </form>
        </div>
    </section>
</body>

</html>