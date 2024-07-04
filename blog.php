<?php
session_start();
require_once("./actions/dbconn.php");

$firstImage = $conn->query("SELECT `image` FROM `news` WHERE `id` = 1")->fetch_assoc()['image'];
$secondImage = $conn->query("SELECT `image` FROM `news` WHERE `id` = 2")->fetch_assoc()['image'];
$thirdImage = $conn->query("SELECT `image` FROM `news` WHERE `id` = 3")->fetch_assoc()['image'];

$firstTitle = $conn->query("SELECT `title` FROM `news` WHERE `id` = 1")->fetch_assoc()['title'];
$secondTitle = $conn->query("SELECT `title` FROM `news` WHERE `id` = 2")->fetch_assoc()['title'];
$thirdTitle = $conn->query("SELECT `title` FROM `news` WHERE `id` = 3")->fetch_assoc()['title'];

$firstParagraph = $conn->query("SELECT `paragraph` FROM `news` WHERE `id` = 1")->fetch_assoc()['paragraph'];
$secondParagraph = $conn->query("SELECT `paragraph` FROM `news` WHERE `id` = 2")->fetch_assoc()['paragraph'];
$thirdParagraph = $conn->query("SELECT `paragraph` FROM `news` WHERE `id` = 3")->fetch_assoc()['paragraph'];

?>


<!DOCTYPE html>
<html lang="ru, en">
<head>
    <link rel="icon" href="./favicon/favicon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог</title>
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

    <section class="title-section">
        <div class="title-section__inner container">
            <h1 class="title-section__title">Блог</h1>
            <hr class="orange-line orange-line_title">
            <p>Muza Studio</p>
        </div>
    </section>

    <section class="slider-section slider-section_desktop hidden-tablet">
        <div class="slider-section__inner container">
          <span class="section-path">главная <span class="section-path_colored">/ студия А</span></span>
          <div class="slider slider_desktop">
                      <div class="slider__line slider__line_desktop">
                          <img class="slider__img slider__img_desktop slider__img_first slider__img_first_desktop" src="<?echo $firstImage ?>" alt="">
                          <img class="slider__img slider__img_desktop slider__img_second slider__img_second_desktop" src="<?echo $secondImage ?>" alt="">
                          <img class="slider__img slider__img_desktop slider__img_third slider__img_third_desktop" src="<?echo $thirdImage ?>" alt="">
                      </div>
                  </div>
          <div class="slider-buttons">
                <button class="slider-button slider-button_first slider-button_first_desktop"></button>
                <button class="slider-button slider-button_second slider-button_second_desktop"></button>
                <button class="slider-button slider-button_third slider-button_third_desktop"></button>
          </div>
          <hr class="orange-line">
          <div class="slider-ps slider-ps_desktop">
            <div class="slider-ps__line slider-ps__line_desktop">
              <span class="slider__p slider__p_desktop slider__p_first">
                <h2><?echo $firstTitle ?></h2>
                <p><?echo $firstParagraph ?></p>
              </span>
              <span class="slider__p slider__p_desktop slider__p_second">
                <h2><?echo $secondTitle ?></h2>
                <p><?echo $secondParagraph ?></p></span>
              <span class="slider__p slider__p_desktop slider__p_third">
                <h2><?echo $thirdTitle ?></h2>
                <p><?echo $thirdParagraph ?></p>
              </span>
            </div>
          </div>
        </div>
    </section>
  
    <section class="slider-section slider-section_tablet visible-tablet hidden-mobile">
        <div class="slider-section__inner container">
          <span class="section-path">главная <span class="section-path_colored">/ студия А</span></span>
          <div class="slider slider_tablet">
                      <div class="slider__line slider__line_tablet">
                          <img class="slider__img slider__img_tablet slider__img_first slider__img_first_tablet" src="<?echo $firstImage ?>" alt="">
                          <img class="slider__img slider__img_tablet slider__img_second slider__img_second_tablet" src="<?echo $secondImage ?>" alt="">
                          <img class="slider__img slider__img_tablet slider__img_third slider__img_third_tablet" src="<?echo $thirdImage ?>" alt="">
                      </div>
                  </div>
          <div class="slider-buttons">
                <button class="slider-button slider-button_first slider-button_first_tablet"></button>
                <button class="slider-button slider-button_second slider-button_second_tablet"></button>
                <button class="slider-button slider-button_third slider-button_third_tablet"></button>
          </div>
          <hr class="orange-line">
          <div class="slider-ps slider-ps_tablet">
            <div class="slider-ps__line slider-ps__line_tablet">
              <span class="slider__p slider__p_tablet slider__p_first">
                <h2><?echo $firstTitle ?></h2>
                <p><?echo $firstParagraph ?></p>
              </span>
              <span class="slider__p slider__p_tablet slider__p_second">
                <h2><?echo $secondTitle ?></h2>
                <p><?echo $secondParagraph ?></p></span>
              <span class="slider__p slider__p_tablet slider__p_third">
                <h2><?echo $thirdTitle ?></h2>
                <p><?echo $thirdParagraph ?></p>
              </span>
            </div>
          </div>
        </div>
    </section>
  
    <section class="slider-section slider-section_mobile visible-mobile">
        <div class="slider-section__inner container">
          <span class="section-path">главная <span class="section-path_colored">/ студия А</span></span>
          <div class="slider slider_mobile">
                      <div class="slider__line slider__line_mobile">
                          <img class="slider__img slider__img_mobile slider__img_first slider__img_first_mobile" src="<?echo $firstImage ?>" alt="">
                          <img class="slider__img slider__img_mobile slider__img_second slider__img_second_mobile" src="<?echo $secondImage ?>" alt="">
                          <img class="slider__img slider__img_mobile slider__img_third slider__img_third_mobile" src="<?echo $thirdImage ?>" alt="">
                      </div>
                  </div>
          <div class="slider-buttons">
                <button class="slider-button-arrow slider-button-arrow_prev"><img src="./images/arrow-prev.svg" alt=""></button>
                <button class="slider-button slider-button_first slider-button_first_mobile"></button>
                <button class="slider-button slider-button_second slider-button_second_mobile"></button>
                <button class="slider-button slider-button_third slider-button_third_mobile"></button>
                <button class="slider-button-arrow slider-button-arrow_next"><img src="./images/arrow-next.svg" alt=""></button>
          </div>
          <hr class="orange-line">
          <div class="slider-ps slider-ps_mobile">
            <div class="slider-ps__line slider-ps__line_mobile">
              <span class="slider__p slider__p_mobile slider__p_first">
                <h2><?echo $firstTitle ?></h2>
                <p><?echo $firstParagraph ?></p>
              </span>
              <span class="slider__p slider__p_mobile slider__p_second">
                <h2><?echo $secondTitle ?></h2>
                <p><?echo $secondParagraph ?></p></span>
              <span class="slider__p slider__p_mobile slider__p_third">
                <h2><?echo $thirdTitle ?></h2>
                <p><?echo $thirdParagraph ?></p>
              </span>
            </div>
          </div>
        </div>
    </section>
    <?if (@$_SESSION['user']['permission'] == 2) {
      echo '<div style="text-align:center;">'
           .'<form action="./actions/adminblog.php" method="post" enctype="multipart/form-data">'
           .'<div class="input-div"><input class="text-form" type="text" name="old-title" placeholder="введите старое название новости"></div>'
           .'<div class="input-div"><input class="text-form" type="text" name="title" placeholder="введите новое название новости"></div>'
           .'<div class="input-div"><input class="text-form" type="text" name="paragraph" placeholder="введите новый текст новости"></div>'
           .'<div class="input-div"><input class="text-form" style="width: 280px; font-size: 16px;" id="new" type="file" name="new"><label for="new">выберите новое фото новости</label></div>'
           .'<button type="submit" class="auth-button auth-button_confirm">подтвердить</button>'
           .'</form>'
           .'</div>';
    }?>
    <section class="contacts-section">
        <div class="contacts-section__inner container">
          <h1 class="contacts-section__title">Контакты</h1>
          <div class="contacts-section__wrap">
            <div class="contact-section__left-side">
              <p class="contacts-section__left-side__p">muzastudio@yandex.ru<br>
                                                          +7 (981) 124-23-53<br>
                                                          +7 (981) 124-54-12<br><br>
              ООО «Студия саунд дизайна Муза» Адрес: 423250, г. Москва, ул. Вешняковская, вл1к2</p>
            </div>
            <div class="contacts-section__right-side">
              <p class="contacts-section__right-side__p">Схема проезда</p>
              <img src="./images/map.png" alt="" class="contacts-section__right-side__map">
            </div>
          </div>
        </div>
    </section>

    <? if (@$_SESSION['isAuthorized'] == true) {
            echo '<div class="modal">
      <div class="modal__body">
        <div class="modal__content">
          <div class="modal__header">
            <p class="modal__title">оставить заявку</p>
            <a class="modal__close"><img src="./images/popup-close.png" alt=""></a>
          </div>
          <form action="./actions/request.php" method="post">
            <div class="input-div"><input class="text-form text-form_popup" type="text" name="request-title" placeholder="тема заявки"></div>
            <div class="input-div"><textarea class="text-form text-form_popup text-form_popup_large" name="request-text" placeholder="текст заявки" id=""></textarea></div>
            <button type="submit" class="auth-button auth-button_confirm">отправить</button>
          </form>
        </div>
      </div>
    </div>';
            }
    ?>

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