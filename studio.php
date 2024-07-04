<?php
session_start();
?>


<!DOCTYPE html>
<html lang="ru, en">
<head>
    <link rel="icon" href="./favicon/favicon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аренда студии</title>
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

    <section class="time-section">
        <div class="time-section__inner time-section__inner_studio container">
            <h1 class="time-section__title time-section__title_studio">Выбирайте удобное <b>время.</b></h1>
            <p class="time-section__p">Вы можете забронировать студию без звонков через наше приложение. Просто выберите свободное время.</p>
            <button class="rent-button rent-button_large">забронировать</button>
        </div>
    </section>

    <section class="slider-section slider-section_desktop hidden-tablet">
        <div class="slider-section__inner container">
          <span class="section-path">главная <span class="section-path_colored">/ студия А</span></span>
          <div class="slider slider_desktop">
                      <div class="slider__line slider__line_desktop">
                          <img class="slider__img slider__img_desktop slider__img_first slider__img_first_desktop" src="./images/sliderpic1.jpg" alt="">
                          <img class="slider__img slider__img_desktop slider__img_second slider__img_second_desktop" src="./images/sliderpic2.jpg" alt="">
                          <img class="slider__img slider__img_desktop slider__img_third slider__img_third_desktop" src="./images/sliderpic3.jpg" alt="">
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
                <h2>Студия А</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
              </span>
              <span class="slider__p slider__p_desktop slider__p_second">
                <h2>Оборудование</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p></span>
              <span class="slider__p slider__p_desktop slider__p_third">
                <h2>Запись</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
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
                          <img class="slider__img slider__img_tablet slider__img_first slider__img_first_tablet" src="./images/sliderpic1.jpg" alt="">
                          <img class="slider__img slider__img_tablet slider__img_second slider__img_second_tablet" src="./images/sliderpic2.jpg" alt="">
                          <img class="slider__img slider__img_tablet slider__img_third slider__img_third_tablet" src="./images/sliderpic3.jpg" alt="">
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
                <h2>Студия А</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
              </span>
              <span class="slider__p slider__p_tablet slider__p_second">
                <h2>Оборудование</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p></span>
              <span class="slider__p slider__p_tablet slider__p_third">
                <h2>Запись</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
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
                          <img class="slider__img slider__img_mobile slider__img_first slider__img_first_mobile" src="./images/sliderpic1.jpg" alt="">
                          <img class="slider__img slider__img_mobile slider__img_second slider__img_second_mobile" src="./images/sliderpic2.jpg" alt="">
                          <img class="slider__img slider__img_mobile slider__img_third slider__img_third_mobile" src="./images/sliderpic3.jpg" alt="">
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
                <h2>Студия А</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
              </span>
              <span class="slider__p slider__p_mobile slider__p_second">
                <h2>Оборудование</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p></span>
              <span class="slider__p slider__p_mobile slider__p_third">
                <h2>Запись</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
              </span>
            </div>
          </div>
        </div>
    </section>

    <section class="examples-section">
        <div class="examples-section__inner container">
            <h1 class="examples-section__title">Примеры работ</h1>
            <div class="examples-items">
                <div class="examples-items__item"><img class="examples-items__img" src="./images/mediaplaceholder.png" alt=""></div>
                <div class="examples-items__item"><img class="examples-items__img" src="./images/mediaplaceholder.png" alt=""></div>
                <div class="examples-items__item"><img class="examples-items__img" src="./images/mediaplaceholder.png" alt=""></div>
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