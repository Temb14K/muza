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
    <title>Регистрация</title>
  <script type="module" crossorigin src="/assets/main-Bm5EvEUd.js"></script>
  <link rel="stylesheet" crossorigin href="/assets/main-g3sUvViC.css">
</head>
<body>
    <header class="header">
        <div class="header__inner container">
          <div class="header__inner__top">
            <a href="index.php" class="header__logo logo">
              <img 
              src="./images/logo_hor.png" 
              alt="Muza" 
              class="logo__image logo__image_header"
              loading="lazy">
            </a>
            <div class="header__inner__top-items">
            <? if (@$_SESSION['isAuthorized'] == true) {
            echo '<button class="submit-button submit-button_small hidden-mobile" type="button">оставить заявку</button>';
            } else {
            echo '<a href="auth.php" style="color:white;" class="submit-button submit-button_small hidden-mobile" type="button">оставить заявку</a>';
          }?>
            <? if (@$_SESSION['isAuthorized'] == true) {
            echo '<a href="profile.php" class="header__profile-link menu-link">профиль</a>';
            } else {
              echo '<a href="auth.php" class="header__profile-link menu-link">войти</a>';
            }?>
            <div class="header__burger visible-mobile">
              <span></span>
            </div>
            </div>
          </div>
          <div class="header__inner__bottom">
            <nav class="header__menu">
              <ul class="header__menu-items">
                <li class="header__menu-item"><a href="studio.php" class="menu-link">аренда студии</a></li>
                <li class="header__menu-item"><a href="equipment.php" class="menu-link">аренда оборудования</a></li>
                <li class="header__menu-item"><a href="about.php" class="menu-link">о нас</a></li>
                <li class="header__menu-item"><a href="blog.php" class="menu-link">блог</a></li>
                <li class="header__menu-item"><a href="contacts.php" class="menu-link">контакты</a></li>
              </ul>
            </nav>
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
    <hr class="white-line">
    <footer class="footer">
        <div class="footer__inner container">
          <div class="footer__inner__left-side">
            <a href="index.php" class="footer__logo logo">
              <img 
              src="./images/logo_sqr.png" 
              alt="Muza" 
              class="logo__image logo__image_footer"
              loading="lazy">
            </a>
            <p class="footer__copyright">Muza Studio © 2024<br>Все права защищены</p>
          </div>
          <div class="footer__inner__right-side">
            <div class="footer__buttons">
            <? if (@$_SESSION['isAuthorized'] == true) {
            echo '<button class="footer__button submit-button submit-button_small hidden-mobile" type="button">оставить заявку</button>';
            } else {
            echo '<a href="auth.php" style="color:white; position:relative; bottom: 40px;" class="footer__button submit-button submit-button_small hidden-mobile" type="button">оставить заявку</a>';
            }?>
              <button class="footer__button rent-button rent-button_small hidden-mobile" type="button">забронировать</button>
            </div>
            <nav class="footer__menu">
              <ul class="footer__menu-items">
                <li class="footer__menu-item"><a href="index.php" class="menu-link">главная</a></li>
                <li class="footer__menu-item"><a href="studio.php" class="menu-link">аренда студии</a></li>
                <li class="footer__menu-item"><a href="equipment.php" class="menu-link">аренда оборудования</a></li>
                <li class="footer__menu-item"><a href="about.php" class="menu-link">о нас</a></li>
                <li class="footer__menu-item"><a href="blog.php" class="menu-link">блог</a></li>
                <li class="footer__menu-item"><a href="contacts.php" class="menu-link">контакты</a></li>
              </ul>
            </nav>
          </div>
        </div>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</html>