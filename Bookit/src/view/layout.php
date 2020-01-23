<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <title><?php echo $title; ?></title>
    <?php /* NEW */ ?>
    <?php echo $css;?>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
  </head>
  <body>
    <main>
      <?php
        if(!empty($_SESSION['error'])) {
          echo '<div class="error box">' . $_SESSION['error'] . '</div>';
        }
        if(!empty($_SESSION['info'])) {
          echo '<div class="info box">' . $_SESSION['info'] . '</div>';
        }
      ?>
      <?php if($title !== 'longread'){?>
        <div class="webshop__wrapper">
          <header class="webshop__header">
            <nav class="webshop__secondary-nav">
              <ul class="webshop__header__responsive webshop__header__responsive__list">
                <li class="webshop__header__responsive__list__item">
                  <a class="webshop__header__responsive__list__item__link" href="index.php">
                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M20 2H0V0H20V2Z" fill="black"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M20 9H0V7H20V9Z" fill="black"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M20 16H0V14H20V16Z" fill="black"/>
                    </svg>
                  </a>
                </li>
                <li class="webshop__header__responsive__list__item">
                  <a class="webshop__header__responsive__list__item__link" href="index.php">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 13C10.5376 13 13 10.5376 13 7.5C13 4.46243 10.5376 2 7.5 2C4.46243 2 2 4.46243 2 7.5C2 10.5376 4.46243 13 7.5 13ZM7.5 15C11.6421 15 15 11.6421 15 7.5C15 3.35786 11.6421 0 7.5 0C3.35786 0 0 3.35786 0 7.5C0 11.6421 3.35786 15 7.5 15Z" fill="black"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M11.707 12.2928C12.0975 11.9023 12.7306 11.9023 13.1212 12.2928L17.707 16.8786C18.0975 17.2691 18.0975 17.9023 17.707 18.2928C17.3164 18.6833 16.6833 18.6833 16.2927 18.2928L11.707 13.707C11.3164 13.3165 11.3164 12.6833 11.707 12.2928Z" fill="black"/>
                    </svg>
                  </a>
                </li>
              </ul>
              <ul class="webshop__header__desktop webshop__secondary-nav__list">
                <li class="webshop__secondary-nav__list__item webshop__secondary-nav__list__item--highlight"><a class="webshop__secondary-nav__list__item__link webshop__secondary-nav__list__item__link--highlight" href="index.php">tv-gids</a></li>
                <li class="webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link" href="index.php">zoekertjes</a></li>
                <li class="webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link" href="index.php?page=subscriptions">abonnement nemen</a></li>
                <li class="webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link" href="index.php">video</a></li>
              </ul>
              <a class="webshop__header__responsive__link" href="index.php"><img class="webshop__header__responsive__link__img" src="assets/img/logo138.svg" alt="logo" width="138" height="46"></a>
              <ul class="webshop__secondary-nav__list">
                <li class="webshop__header__desktop webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link webshop__secondary-nav__list__item__link--bold" href="index.php">nu in humo</a></li>
                <li class="webshop__header__desktop webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link webshop__secondary-nav__list__item__link--bold" href="index.php">login</a></li>
                <li class="webshop__header__desktop webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link webshop__secondary-nav__list__item__link--bold" href="index.php">registreer</a></li>
                <li class="webshop__secondary-nav__list__item">
                  <a class="webshop__secondary-nav__list__item__link webshop__secondary-nav__list__item__link--bold" href="index.php?page=favorites">
                    <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.64279 12.7554C-0.277723 9.00718 0.69578 3.38487 5.5633 1.51077C10.4308 -0.36333 13.3513 3.38487 14.3248 5.25898C15.2983 3.38487 19.1923 -0.36333 24.0599 1.51077C28.9274 3.38487 28.9274 9.00718 26.0069 12.7554C23.0864 16.5036 14.3248 24 14.3248 24C14.3248 24 5.5633 16.5036 2.64279 12.7554Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="webshop__secondary-nav__list__item__link__count">
                      <?php
                        if(!empty($_SESSION['favorite'])) {
                          echo count($_SESSION['favorite']);
                        } else {
                          echo '0';
                        }
                      ?>
                    </p>
                  </a>
                </li>
                <li class="webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link webshop__secondary-nav__list__item__link--bold" href="index.php?page=cart">
                  <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.9875 8.40696L23.9391 14.4215C23.8098 15.0859 23.2804 15.4898 22.67 15.4974H7.38542L7.08196 17.208H21.6492C22.4162 17.2663 22.9365 17.8096 22.9459 18.5046C22.8901 19.2701 22.3467 19.7918 21.6492 19.8013H5.53694C4.66554 19.723 4.14594 19.0284 4.24023 18.2563L4.92996 14.5042L3.88156 3.96501L0.901914 3.02703C0.173769 2.73792 -0.123419 2.07921 0.0466436 1.39926C0.329414 0.69061 1.00698 0.366839 1.67441 0.543985L5.48175 1.75792C5.99466 1.95019 6.28973 2.37005 6.3646 2.86151L6.58531 4.9583L23.8563 6.88955C24.6498 7.06144 25.0806 7.69001 24.9875 8.40696ZM9.48483 22.524C9.48483 23.6173 8.59858 24.5035 7.50529 24.5035C6.41202 24.5035 5.52577 23.6173 5.52577 22.524C5.52577 21.4307 6.41204 20.5445 7.50529 20.5445C8.59856 20.5445 9.48483 21.4308 9.48483 22.524ZM21.3026 22.524C21.3026 23.6173 20.4163 24.5035 19.323 24.5035C18.2297 24.5035 17.3435 23.6173 17.3435 22.524C17.3435 21.4307 18.2297 20.5445 19.323 20.5445C20.4163 20.5445 21.3026 21.4308 21.3026 22.524Z" fill="black"/>
                  </svg>
                  <p class="webshop__secondary-nav__list__item__link__count">
                      <?php
                        if(!empty($_SESSION['cart'])) {
                          $gifft = 0;
                          foreach($_SESSION['cart'] as $thing) {
                            if($thing['product'] == 'gift') {
                              $gifft = 1;
                            }
                          }
                          if($gifft == 1) {
                            echo count($_SESSION['cart']) - 1;
                          } else {
                            echo count($_SESSION['cart']);
                          }
                        } else {
                          echo '0';
                        }
                      ?>
                    </p>
                  </a>
                </li>
              </ul>
            </nav>
            <?php
              if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $cart){
                  if(isset($cart['product']['id']) && isset($_GET['product_id']) && $cart['product']['id'] == $_GET['product_id']) { ?>
                    <div class="buy-popup">
                      <div class="buy-popup-wrapper">
                        <div class="buy-popup-content">
                          <p class="buy-popup-content__congrats">
                            <svg width="21" height="23" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M19.2323 8.53044C18.7494 8.34644 16.1295 8.01167 14.436 7.81489C14.7015 6.21128 14.8226 4.74183 14.8226 3.19444C14.8226 1.43239 13.4367 0 11.7346 0C10.0324 0 8.64652 1.43239 8.64652 3.19444C8.64652 5.59028 7.82386 6.693 6.65041 7.92095C6.30778 7.44712 5.86344 7.0621 5.35242 6.79623C4.84139 6.53036 4.27766 6.39092 3.70565 6.38889C1.6626 6.38889 0 8.10878 0 10.2222V17.8889C0 20.0023 1.6626 21.7222 3.70565 21.7222C4.63824 21.7222 5.48189 21.3517 6.13285 20.7613L6.36507 21.0079C7.55088 21.9484 10.8946 23 13.5886 23C15.9096 23 16.8101 22.6256 17.6068 22.2934L17.9971 22.1362C19.0273 21.7465 19.9438 20.5684 20.1414 19.3251L20.9641 11.6917C21.1778 10.3666 20.4169 8.97639 19.2323 8.53044ZM3.70565 19.1667C3.02505 19.1667 2.47043 18.5942 2.47043 17.8889V10.2222C2.48466 9.89322 2.62101 9.58257 2.8511 9.35496C3.0812 9.12735 3.38729 9.00033 3.70565 9.00033C4.02401 9.00033 4.3301 9.12735 4.56019 9.35496C4.79029 9.58257 4.92664 9.89322 4.94087 10.2222V17.8889C4.94087 18.5942 4.38625 19.1667 3.70565 19.1667ZM17.6969 18.975C17.6512 19.2612 17.3363 19.6663 17.1497 19.7366L16.6853 19.9231C16.0121 20.2029 15.4303 20.4444 13.5874 20.4444C11.2232 20.4444 8.50076 19.4823 7.86586 18.9801C7.6707 18.8268 7.4113 18.2594 7.4113 17.8889V11.5256C7.41501 11.4655 7.4743 10.6873 8.2846 9.84911C9.41235 8.68122 11.1169 6.91789 11.1169 3.19444C11.1169 2.84306 11.3949 2.55556 11.7346 2.55556C12.0742 2.55556 12.3522 2.84306 12.3522 3.19444C12.3522 4.99228 12.1718 6.68278 11.7605 8.67994L11.3936 10.4637L13.0254 10.2235C13.7702 10.2874 17.8835 10.7947 18.3788 10.9263C18.4504 10.9646 18.5418 11.1601 18.5159 11.339L17.6969 18.975Z" fill="#2EB101"/>
                            </svg> Proficiat: succesvol toegevoegd
                          </p>
                          <picture class="buy-popup-content__img">
                            <source srcset="assets/img/<?php echo $cart['product']['image']?>/0.webp, assets/img/<?php echo $cart['product']['image']?>/0-2X.webp 2x"
                               type="image/webp">
                            <source srcset="assets/img/<?php echo $cart['product']['image']?>/0.jpg, assets/img/<?php echo $cart['product']['image']?>/0-2X.jpg 2x"
                                type="image/jpg">
                            <img class="buy-popup-content__img" alt="<?php echo $cart['product']['name']?>" src="assets/img/<?php echo $cart['product']['image']?>/0.jpg">
                          </picture>
                          <div class="buy-popup-content__info--wrapper">
                            <p class="buy-popup-content__info__title"><?php echo $cart['product']['name'] ?> <?php if(isset($cart['color'])) {echo '('. $cart['color'] .')';} ?></p>
                            <?php if(!empty($cart['product']['author'])) { ?>
                              <p class="buy-popup-content__info__author"><?php echo $cart['product']['author'] ?></p>
                            <?php } ?>
                            <?php
                              $discount = 0;
                                if(isset($_SESSION['discount']) && !empty($_SESSION['discount'])){
                                  foreach($_SESSION['discount'] as $item){
                                    if($item['product']['id'] == $cart['product']['id']) {
                                      $discount = 1;
                                    } else {
                                      $discount = 0;
                                    }
                                  }
                                }
                              ?>
                              <p class="buy-popup-content__info__price">
                                <?php if($discount === 1) {
                                    echo '€' . number_format(($cart['product']['discount_price']), 2 , "," , ".");
                                  } else {
                                    echo '€' . number_format(($cart['product']['price']), 2 , "," , ".");
                                  }
                                ?>
                              </p>
                          </div>
                          <div class="buy-popup-content__btn--wrapper">
                            <a class="webshop__secondary-btn-big" href="index.php?page=home">Verder winkelen</a>
                            <a class="webshop__primary-btn-big" href="index.php?page=cart">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M24.9875 8.40696L23.9391 14.4215C23.8098 15.0859 23.2804 15.4898 22.67 15.4974H7.38542L7.08196 17.208H21.6492C22.4162 17.2663 22.9365 17.8096 22.9459 18.5046C22.8901 19.2701 22.3467 19.7918 21.6492 19.8013H5.53694C4.66554 19.723 4.14594 19.0284 4.24023 18.2563L4.92996 14.5042L3.88156 3.96501L0.901914 3.02703C0.173769 2.73792 -0.123419 2.07921 0.0466436 1.39926C0.329414 0.69061 1.00698 0.366839 1.67441 0.543985L5.48175 1.75792C5.99466 1.95019 6.28973 2.37005 6.3646 2.86151L6.58531 4.9583L23.8563 6.88955C24.6498 7.06144 25.0806 7.69001 24.9875 8.40696ZM9.48483 22.524C9.48483 23.6173 8.59858 24.5035 7.50529 24.5035C6.41202 24.5035 5.52577 23.6173 5.52577 22.524C5.52577 21.4307 6.41204 20.5445 7.50529 20.5445C8.59856 20.5445 9.48483 21.4308 9.48483 22.524ZM21.3026 22.524C21.3026 23.6173 20.4163 24.5035 19.323 24.5035C18.2297 24.5035 17.3435 23.6173 17.3435 22.524C17.3435 21.4307 18.2297 20.5445 19.323 20.5445C20.4163 20.5445 21.3026 21.4308 21.3026 22.524Z" fill="white"/>
                            </svg>Naar winkelmandje</a>
                          </div>
                        </div>
                      </div>
                    </div>
              <?php
                  }
                }
              } ?>
            <nav class="webshop__header__desktop webshop__primary-nav">
              <ul class="webshop__primary-nav__list">
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link" href="index.php">home</a></li>
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link" href="index.php">actua</a></li>
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link" href="index.php">humor</a></li>
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link" href="index.php"><img class="primary-nav__list__item__link__img" src="assets/img/logo.svg" alt="logo" width="210" height="70"></a></li>
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link" href="index.php">tv/film</a></li>
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link" href="index.php">muziek</a></li>
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link" href="index.php">boeken</a></li>
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link webshop__primary-nav__list__item__link--active" href="index.php">shop</a></li>
                <li class="webshop__primary-nav__list__item">
                  <a class="webshop__primary-nav__list__item__link" href="index.php">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 13C10.5376 13 13 10.5376 13 7.5C13 4.46243 10.5376 2 7.5 2C4.46243 2 2 4.46243 2 7.5C2 10.5376 4.46243 13 7.5 13ZM7.5 15C11.6421 15 15 11.6421 15 7.5C15 3.35786 11.6421 0 7.5 0C3.35786 0 0 3.35786 0 7.5C0 11.6421 3.35786 15 7.5 15Z" fill="black"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M11.707 12.2928C12.0975 11.9023 12.7306 11.9023 13.1212 12.2928L17.707 16.8786C18.0975 17.2691 18.0975 17.9023 17.707 18.2928C17.3164 18.6833 16.6833 18.6833 16.2927 18.2928L11.707 13.707C11.3164 13.3165 11.3164 12.6833 11.707 12.2928Z" fill="black"/>
                    </svg>
                  </a>
                </li>
              </ul>
            </nav>
          </header>
          <?php echo $content;?>
          <footer class="webshop__footer">
            <p class="webshop__footer__text">Aanbod geldig in België, onder voorbehoud van wijzigingen. U kan zonder opgave van redenen uw aankoop herroepen binnen de 14 dagen. De algemene abonnementsvoorwaarden, een  herroepingsformulier en de standaardtarieven vindt u op abonnement.humo.be/algemene-voorwaarden.</p>
            <p class="webshop__footer__text">DPG Media nv | Mediaplein 1, 2018 Antwerpen | RPR Antwerpen nr 0432.306.234 | Privacybeleid - Gebruiksvoorwaarden - Cookiebeleid - Cookie instellingen </p>
          </footer>
        </div>
      <?php } else { ?>
        <form class="longread__wrapper" method="POST" action="index.php?page=longread">
          <?php echo $content;?>
      </form>
      <?php };?>
    </main>
    <?php echo $js; ?>
  </body>
</html>
