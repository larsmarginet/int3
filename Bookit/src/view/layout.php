<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <title><?php echo $title; ?></title>
    <?php /* NEW */ ?>
    <?php echo $css;?>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
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
              <ul class="webshop__secondary-nav__list">
                <li class="webshop__secondary-nav__list__item webshop__secondary-nav__list__item--highlight"><a class="webshop__secondary-nav__list__item__link webshop__secondary-nav__list__item__link--highlight" href="index.php">tv-gids</a></li>
                <li class="webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link" href="index.php">zoekertjes</a></li>
                <li class="webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link" href="index.php">abonnement nemen</a></li>
                <li class="webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link" href="index.php">video</a></li>
              </ul>
              <ul class="webshop__secondary-nav__list">
                <li class="webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link webshop__secondary-nav__list__item__link--bold" href="index.php">nu in humo</a></li>
                <li class="webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link webshop__secondary-nav__list__item__link--bold" href="index.php">login</a></li>
                <li class="webshop__secondary-nav__list__item"><a class="webshop__secondary-nav__list__item__link webshop__secondary-nav__list__item__link--bold" href="index.php">registreer</a></li>
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
                          echo count($_SESSION['cart']);
                        } else {
                          echo '0';
                        }
                      ?>
                    </p>
                  </a>
                </li>
              </ul>
            </nav>
            <nav class="webshop__primary-nav">
              <ul class="webshop__primary-nav__list">
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link" href="index.php">home</a></li>
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link" href="index.php">actua</a></li>
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link" href="index.php">humor</a></li>
                <li class="webshop__primary-nav__list__item"><a class="webshop__primary-nav__list__item__link" href="index.php"><img class="primary-nav__list__item__link__img" src="../assets/img/logo.svg" alt="logo" width="210" height="70"></a></li>
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
          <header class="webshop__header__responsive">
            <nav class="webshop__header__responsive__nav">
              <ul class="webshop__header__responsive__list">
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
              <a class="webshop__header__responsive__link" href="index.php"><img class="webshop__header__responsive__link__img" src="../assets/img/logo138.svg" alt="logo" width="138" height="46"></a>
              <ul class="webshop__header__responsive__list">
                <li class="webshop__header__responsive__list__item"><a class="webshop__header__responsive__list__item__link" href="index.php">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.0001 0.666016C13.503 0.666016 14.9443 1.26304 16.007 2.32574C17.0697 3.38845 17.6667 4.82979 17.6667 6.33268C17.6667 7.83558 17.0697 9.27691 16.007 10.3396C14.9443 11.4023 13.503 11.9993 12.0001 11.9993C10.4972 11.9993 9.05585 11.4023 7.99314 10.3396C6.93044 9.27691 6.33341 7.83558 6.33341 6.33268C6.33341 4.82979 6.93044 3.38845 7.99314 2.32574C9.05585 1.26304 10.4972 0.666016 12.0001 0.666016ZM12.0001 14.8327C18.2617 14.8327 23.3334 17.3685 23.3334 20.4993V23.3327H0.666748V20.4993C0.666748 17.3685 5.73841 14.8327 12.0001 14.8327Z" fill="black"/>
                  </svg>
                </a></li>
                <li class="webshop__header__responsive__list__item">
                  <a class="webshop__header__responsive__list__item__link" href="index.php?page=favorites">
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
                <li class="webshop__header__responsive__list__item">
                  <a class="webshop__header__responsive__list__item__link" href="index.php?page=cart">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M24.9875 8.40696L23.9391 14.4215C23.8098 15.0859 23.2804 15.4898 22.67 15.4974H7.38542L7.08196 17.208H21.6492C22.4162 17.2663 22.9365 17.8096 22.9459 18.5046C22.8901 19.2701 22.3467 19.7918 21.6492 19.8013H5.53694C4.66554 19.723 4.14594 19.0284 4.24023 18.2563L4.92996 14.5042L3.88156 3.96501L0.901914 3.02703C0.173769 2.73792 -0.123419 2.07921 0.0466436 1.39926C0.329414 0.69061 1.00698 0.366839 1.67441 0.543985L5.48175 1.75792C5.99466 1.95019 6.28973 2.37005 6.3646 2.86151L6.58531 4.9583L23.8563 6.88955C24.6498 7.06144 25.0806 7.69001 24.9875 8.40696ZM9.48483 22.524C9.48483 23.6173 8.59858 24.5035 7.50529 24.5035C6.41202 24.5035 5.52577 23.6173 5.52577 22.524C5.52577 21.4307 6.41204 20.5445 7.50529 20.5445C8.59856 20.5445 9.48483 21.4308 9.48483 22.524ZM21.3026 22.524C21.3026 23.6173 20.4163 24.5035 19.323 24.5035C18.2297 24.5035 17.3435 23.6173 17.3435 22.524C17.3435 21.4307 18.2297 20.5445 19.323 20.5445C20.4163 20.5445 21.3026 21.4308 21.3026 22.524Z" fill="black"/>
                    </svg>
                    <p class="webshop__secondary-nav__list__item__link__count">
                      <?php
                        if(!empty($_SESSION['cart'])) {
                          echo count($_SESSION['cart']);
                        } else {
                          echo '0';
                        }
                      ?>
                    </p>
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
        <div class="longread__wrapper">

        </div>
      <?php };?>

    </main>
    <?php echo $js; ?>
  </body>
</html>
