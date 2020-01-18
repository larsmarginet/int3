<h1 class="webshop__products__title">gegevens</h1>
<section class="webshop__steps">
  <h2 class="hidden">Stappen</h2>
  <div class="webshop__steps__step">
    <div class="webshop__steps__step__number webshop__steps__step__number--higlight">1</div>
    <p class="webshop__steps__step__text">Gegevens</p>
  </div>
  <div class="webshop__steps__step">
    <div class="webshop__steps__step__number">2</div>
    <p class="webshop__steps__step__text">Betaalmethode</p>
  </div>
  <div class="webshop__steps__step">
    <div class="webshop__steps__step__number">3</div>
    <p class="webshop__steps__step__text">Betalen</p>
  </div>
  <div class="webshop__steps__step">
    <div class="webshop__steps__step__number">4</div>
    <p class="webshop__steps__step__text">Bedankt</p>
  </div>
</section>

<section class="webshop__order__content-wrapper">
  <h2 class="hidden">gegevens</h2>
  <article class="webshop__order__content__login">
    <h3 class="hidden">login</h3>
    <form class="webshop__order__content__login__form" method="POST" action="index.php?page=login">
      <p class="webshop__order__content__login__form__title">Inloggen</p>
      <p class="webshop__order__content__login__form__subtitle">Met je Humo account.</p>
      <div>
        <label class="webshop__order__content__login__form__label" for="email">E-mail</label>
        <p class="form-error"></p>
        <input class="webshop__order__content__login__form__input valid-input" type="email" name="email" id="email" required>
      </div>
      <div>
        <label class="webshop__order__content__login__form__label" for="password">Wachtwoord</label>
        <p class="form-error"></p>
        <input class="webshop__order__content__login__form__input valid-input" type="password" name="password" id="password" required>
      </div>
      <button class="webshop__primary-btn-small webshop__order__content__login__form__btn" type="submit" name="action" value="login">Inloggen</button>
    </form>
    <a class="webshop__secondary-btn-small webshop__order__content__login__form__btn" href="index.php?page=data">Bestellen als gast</a>
  </article>
  <aside class="webshop__order__content__overview">
  <h3 class="hidden">Overzicht</h3>
    <div class="webshop__order__content__overview--wrapper">
      <p class="webshop__order__content__overview__title">Overzicht</p>
      <table class="webshop__order__content__overview__table">
        <?php
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
          foreach($_SESSION['cart'] as $product):
            if($product['product'] !== 'gift'){
        ?>
        <?php
          $discount = 0;
            if(isset($_SESSION['discount']) && !empty($_SESSION['discount'])){
              foreach($_SESSION['discount'] as $item){
                if($item['product']['id'] == $product['product']['id']) {
                  $discount = 1;
                } else {
                  $discount = 0;
                }
              }
            }
        ?>
          <tr class="webshop__order__content__overview__product">
            <td class="webshop__order__content__overview__product__quantity"><?php echo $product['quantity'] ?>x</td>
            <td class="webshop__order__content__overview__product__title"><?php echo $product['product']['name']?> <?php if(isset($product['color'])) {echo '('. $product['color'] .')';} ?></td>
            <td class="webshop__order__content__overview__product__price"><?php
            if($discount === 1) {
              echo '&euro;' . number_format(($product['product']['discount_price']*$product['quantity']), 2 , "," , ".");
            } else {
              echo '&euro;' . number_format(($product['product']['price']*$product['quantity']), 2 , "," , ".");
            }
          ?></td>
          </tr>
        <?php }
        if($product['product'] == 'gift'){ ?>
          <tr class="webshop__order__content__overview__product">
            <td class="webshop__order__content__overview__product__quantity">1x</td>
            <td class="webshop__order__content__overview__product__title">Inpakken als cadeau</td>
            <td class="webshop__order__content__overview__product__price">&euro;2,00</td>
          </tr>
        <?php } endforeach; } ?>
      </table>
      <?php
       if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $totalPrice = 0;
        foreach($_SESSION['cart'] as $price){
          if($price['product'] !== 'gift'){
            if(isset($_SESSION['discount']) && !empty($_SESSION['discount'])){
              foreach($_SESSION['discount'] as $item){
                if($item['product']['id'] == $price['product']['id']) {
                  $totalPrice += ($price['product']['discount_price']*$price['quantity']);
                } else {
                  $totalPrice += ($price['product']['price']*$price['quantity']);
                }
              }
            } else {
              $totalPrice += $price['product']['price']*$price['quantity'];
            }
          } else if($price['product'] === 'gift') {
            $totalPrice += 2;
          }
        }
      ?>
      <p class="webshop__order__content__overview__price">Totaal: &euro;<?php echo number_format(($totalPrice), 2 , "," , ".") ?> </p>
      <?php } ?>
    </div>
    <ul class="webshop__order__content__overview__list">
      <li class="webshop__order__content__overview__list__item"><strong class="webshop__strong">Gratis</strong> geleverd</li>
      <li class="webshop__order__content__overview__list__item">Thuis geleverd op <strong class="webshop__strong"><?php echo $date ?></strong></li>
      <li class="webshop__order__content__overview__list__item">30 dagen bedenktijd</li>
    </ul>
  </aside>
</section>
