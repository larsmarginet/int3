<h1 class="hidden">Abonnementen</h1>
<section class="webshop__subscription__banner">
  <h2 class="webshop__subscription__title">Papier + digitaal</h2>
  <div class="webshop__subscription__banner-wrapper">
    <picture class="webshop__subscription__banner__image">
      <source srcset="assets/img/Subscription/1.webp, assets/img/Subscription/1-2X.webp 2x"
        type="image/webp">
      <source srcset="assets/img/Subscription/1.png, assets/img/Subscription/1-2X.png 2x"
        type="image/png">
      <img class="webshop__subscription__banner__image" alt="Humo abonnement" src="assets/img/Subscription/1.png">
    </picture>
    <ul class="webshop__subscription__banner__list">
      <li class="webshop__subscription__banner__list__item">Onbeperkte toegang tot straffe onderzoeksjournalistiek</li>
      <li class="webshop__subscription__banner__list__item">Eigenzinnige columns en het beste uit film, muziek en literatuur</li>
      <li class="webshop__subscription__banner__list__item">Lees Humo waar en wanneer u wilt, op papier en tablet</li>
      <li class="webshop__subscription__banner__list__item">Toegang tot Humo Sapiens, een aparte abonneezone</li>
      <li class="webshop__subscription__banner__list__item">Gratis tickets, cadeaus en kortingen</li>
    </ul>
  </div>
</section>





<section class="webshop__subscription__subscribe">
  <h2 class="hidden">Abonneren</h2>
  <ul class="webshop__subscription__subscribe__list">
    <li class="webshop__subscription__subscribe__list__item">Sluit aan bij 50.000 andere humo(r) fans</li>
    <li class="webshop__subscription__subscribe__list__item">Je betaalt maandelijks</li>
    <li class="webshop__subscription__subscribe__list__item">1 x betalen en dan wordt het bedrag automatisch gestort</li>
  </ul>
  <form class="webshop__subscription__subscribe__form" method="POST" action="index.php?page=cart">
    <?php foreach($subscriptions as $subscription): ?>
      <input id="<?php echo $subscription['id']?>" class="webshop__subscription__subscribe__form__input" type="radio" name="id" value="<?php echo $subscription['id']?>" <?php if($subscription['id'] == 40){echo 'checked';} ?>>
      <label for="<?php echo $subscription['id']?>" class="webshop__subscription__subscribe__form__label">
        <span class="webshop__subscription__subscribe__form__btn-wrapper">
          <span class="webshop__subscription__subscribe__form__radio"></span>
          <span class="webshop__subscription__subscribe__form__duration"><?php echo $subscription['duration']?> maanden</span>
          <?php if($subscription['discount_percentage'] > 0): ?>
            <span class="webshop__subscription__subscribe__form__savings">Je bespaart <?php echo $subscription['discount_euro']?> euro</span>
          <?php endif; ?>
        </span>
        <?php if($subscription['discount_percentage'] > 0): ?>
          <span class="webshop__subscription__subscribe__form__percentage"><?php echo $subscription['discount_percentage']?>% Korting</span>
        <?php endif; ?>
        <span class="webshop__subscription__subscribe__form__price">
          <?php if($subscription['discount_percentage'] > 0):?>
            <span class="webshop__subscription__subscribe__form__price__original">&euro;15,95</span>
          <?php endif; ?>
          &euro;<?php echo $subscription['price']?>/mnd
        </span>
      </label>
    <?php endforeach; ?>
    <div class="webshop__subscription__subscribe__form__bigbtn-wrapper">
      <button class="webshop__primary-btn-big webshop__subscription__subscribe__form__submit" type="submit" name="action" value="add">
        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18.9905 6.38903L18.1937 10.96C18.0954 11.465 17.6931 11.772 17.2292 11.7778H5.61292L5.38229 13.0778H16.4534C17.0363 13.1221 17.4318 13.5351 17.4389 14.0633C17.3965 14.645 16.9835 15.0415 16.4534 15.0488H4.20807C3.54581 14.9892 3.15091 14.4613 3.22257 13.8746L3.74677 11.0229L2.94999 3.01314L0.685455 2.30028C0.132064 2.08056 -0.0937983 1.57994 0.0354492 1.06317C0.250355 0.5246 0.765303 0.278534 1.27256 0.413165L4.16613 1.33576C4.55595 1.48188 4.78019 1.80097 4.8371 2.17448L5.00484 3.76804L18.1308 5.23579C18.7339 5.36643 19.0613 5.84414 18.9905 6.38903ZM7.20847 17.118C7.20847 17.9489 6.53492 18.6224 5.70402 18.6224C4.87313 18.6224 4.19958 17.9489 4.19958 17.118C4.19958 16.2871 4.87315 15.6135 5.70402 15.6135C6.53491 15.6135 7.20847 16.2871 7.20847 17.118ZM16.19 17.118C16.19 17.9489 15.5164 18.6224 14.6855 18.6224C13.8546 18.6224 13.1811 17.9489 13.1811 17.118C13.1811 16.2871 13.8546 15.6135 14.6855 15.6135C15.5164 15.6135 16.19 16.2871 16.19 17.118Z" fill="white"/>
        </svg>kopen
      </button>
    </div>
  </form>
</section>





<section class="webshop__subscription__detail">
  <h2 class="webshop__subscription__title">“Ma waarom humo?”</h2>
  <div class="webshop__subscription__detail-wrapper">
    <p class="webshop__subscription__detail__intro">Humo bevat pagina na pagina een sterk staaltje journalistiek. Wij stellen de vragen waar u aan denkt, maar geen antwoord op weet te vinden. Onze Homo Journalisticus verzorgt u wekelijks van de beste content. </p>
    <ul class="webshop__subscription__detail__list">
        <li class="webshop__subscription__detail__list__item"><strong class="webshop__strong">Diepgaande coverstory’s</strong> over de meest interessante mensen op deze aardkloot.</li>
        <li class="webshop__subscription__detail__list__item">Een <strong class="webshop__strong">360&deg;</strong> blik op de laatste nieuwigheden. </li>
        <li class="webshop__subscription__detail__list__item"><strong class="webshop__strong">Vrouwelijk geweld</strong> met als sterkste wapen, hun pen: <strong class="webshop__strong">Heleen Debruyne</strong> &amp; <strong class="webshop__strong">Naema Tahir.</strong> </li>
        <li class="webshop__subscription__detail__list__item"><strong class="webshop__strong">De jeugd van tegenwoordig</strong>: al lang niet meer zo’n jeugdige mensen delen hun mening over allerhande zaken. </li>
        <li class="webshop__subscription__detail__list__item">Een <strong class="webshop__strong">vernieuwde tv-katern</strong> die u nooit meer een slechte film doet zien.</li>
        <li class="webshop__subscription__detail__list__item">Lachen, gieren, brullen met: <strong class="webshop__strong">Het Gat van de Wereld.</strong></li>
        <li class="webshop__subscription__detail__list__item">Dit allemaal in een prachtig ontworpen <strong class="webshop__strong">magazine of via uw internetmachine naar keuze.</strong></li>
    </ul>
    <picture class="webshop__subscription__detail__image">
      <source srcset="assets/img/Subscription/2.webp, assets/img/Subscription/2-2X.webp 2x"
        type="image/webp">
      <source srcset="assets/img/Subscription/2.jpg, assets/img/Subscription/2-2X.jpg 2x"
        type="image/jpg">
      <img class="webshop__subscription__detail__image" alt="Humo abonnement" src="assets/img/Subscription/2.jpg">
    </picture>
  </div>
</section>





<?php if(isset($_SESSION['recentlyViewed']) && !empty($_SESSION['recentlyViewed'])): ?>
  <section class="webshop__recently-viewed">
    <h2 class="webshop__recently-viewed__title">Eerder bekenen door jou</h2>
    <div class="webshop__recently-viewed-wrapper">
      <?php
      foreach(array_reverse($_SESSION['recentlyViewed']) as $i => $article):
        if (++$i == 7) {
        break;
      } else { ?>
        <article class="webshop__recently-viewed__product">
          <div class="webshop__recently-viewed__product__img-wrapper">
            <picture class="webshop__recently-viewed__product__img">
              <source srcset="assets/img/<?php echo $article['product']['image']?>/0.webp, assets/img/<?php echo $article['product']['image']?>/0-2X.webp 2x"
                type="image/webp">
              <source srcset="assets/img/<?php echo $article['product']['image']?>/0.jpg, assets/img/<?php echo $article['product']['image']?>/0-2X.jpg 2x"
                type="image/jpg">
              <img class="webshop__recently-viewed__product__img" alt="<?php echo $article['product']['name']?>" src="assets/img/<?php echo $article['product']['image']?>/0.jpg">
            </picture>
          </div>
          <h3 class="webshop__recently-viewed__product__title"><?php echo $article['product']['name']?></h3>
          <div class="webshop__recently-viewed__product__price-wrapper">
            <?php if($article['product']['discount_price'] > 0){ ?>
              <p class="webshop__product__price"><?php echo '€' . number_format(($article['product']['discount_price']), 2 , "," , ".");?></p>
              <p class="webshop__product__discountprice"> <?php echo number_format(($article['product']['price']), 2 , "," , ".")?></p>
            <?php } else { ?>
              <p class="webshop__product__price"><?php echo '€' . number_format(($article['product']['price']), 2 , "," , ".");?></p>
            <?php } ?>
          </div>
          <div class="webshop__recently-viewed__product__btn-wrapper">
              <form method="POST" action="index.php?page=cart">
                <input type="hidden" name="id" value="<?php echo $article['product']['id'];?>"/>
                <button class="webshop__primary-btn-small" type="submit" name="action" value="add">
                  +<svg class="webshop__primary-btn-small__svg" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.9905 6.38903L18.1937 10.96C18.0954 11.465 17.6931 11.772 17.2292 11.7778H5.61292L5.38229 13.0778H16.4534C17.0363 13.1221 17.4318 13.5351 17.4389 14.0633C17.3965 14.645 16.9835 15.0415 16.4534 15.0488H4.20807C3.54581 14.9892 3.15091 14.4613 3.22257 13.8746L3.74677 11.0229L2.94999 3.01314L0.685455 2.30028C0.132064 2.08056 -0.0937983 1.57994 0.0354492 1.06317C0.250355 0.5246 0.765303 0.278534 1.27256 0.413165L4.16613 1.33576C4.55595 1.48188 4.78019 1.80097 4.8371 2.17448L5.00484 3.76804L18.1308 5.23579C18.7339 5.36643 19.0613 5.84414 18.9905 6.38903ZM7.20847 17.118C7.20847 17.9489 6.53492 18.6224 5.70402 18.6224C4.87313 18.6224 4.19958 17.9489 4.19958 17.118C4.19958 16.2871 4.87315 15.6135 5.70402 15.6135C6.53491 15.6135 7.20847 16.2871 7.20847 17.118ZM16.19 17.118C16.19 17.9489 15.5164 18.6224 14.6855 18.6224C13.8546 18.6224 13.1811 17.9489 13.1811 17.118C13.1811 16.2871 13.8546 15.6135 14.6855 15.6135C15.5164 15.6135 16.19 16.2871 16.19 17.118Z" fill="white"/>
                  </svg>
                </button>
              </form>
              <a class="webshop__secondary-btn-small webshop__secondary-btn-small__viewed" href="index.php?page=detail&id=<?php echo $article['product']['id'];?>">meer info</a>
            </div>
        </article>
      <?php } endforeach; ?>
    </div>
  </section>
<?php endif; ?>
