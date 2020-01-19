<h1 class="webshop__products__title">gegevens</h1>
<section class="webshop__steps">
  <h2 class="hidden">Stappen</h2>
  <div class="webshop__steps__step">
    <div class="webshop__steps__step__number webshop__steps__step__number--higlight">1</div>
    <p class="webshop__steps__step__text">Gegevens</p>
  </div>
  <div class="webshop__steps__step">
    <div class="webshop__steps__step__number webshop__steps__step__number--higlight">2</div>
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
  <h2 class="hidden">Betaalmethode</h2>
  <article class="webshop__order__content__payment">
    <h3 class="hidden">Betaalmethodes</h3>
    <form class="webshop__order__content__payment__form" method="POST" action="index.php?page=payment">
      <input id="bancontact" class="webshop__order__content__payment__form__input" type="radio" name="payment" value="bancontact" checked>
      <label for="bancontact" class="webshop__order__content__payment__form__label">
        <picture class="webshop__order__content__payment__form__picture">
          <source srcset="assets/img/payment/bancontact.webp, assets/img/payment/bancontact-2X.webp 2x"
            sizes="40px" type="image/webp">
          <source srcset="assets/img/payment/bancontact.jpg, assets/img/payment/bancontact-2X.jpg 2x"
            sizes="40px" type="image/jpg">
          <img class="webshop__order__content__payment__form__picture" alt="Bancontact" src="assets/img/payment/bancontact.jpg">
        </picture>
        <p class="webshop__order__content__payment__form__title">Bancontact</p>
        <p class="webshop__order__content__payment__form__free">Gratis</p>
      </label>
      <input id="creditcard" class="webshop__order__content__payment__form__input" type="radio" name="payment" value="creditcard">
      <label for="creditcard" class="webshop__order__content__payment__form__label">
        <picture class="webshop__order__content__payment__form__picture">
          <source srcset="assets/img/payment/mastercard.webp, assets/img/payment/mastercard-2X.webp 2x"
            sizes="40px" type="image/webp">
          <source srcset="assets/img/payment/mastercard.jpg, assets/img/payment/mastercard-2X.jpg 2x"
            sizes="40px" type="image/jpg">
          <img class="webshop__order__content__payment__form__picture" alt="Mastercard" src="assets/img/payment/mastercard.jpg">
        </picture>
        <p class="webshop__order__content__payment__form__title">Creditcard</p>
        <p class="webshop__order__content__payment__form__free">Gratis</p>
      </label>
      <input id="paypal" class="webshop__order__content__payment__form__input" type="radio" name="payment" value="paypal">
      <label for="paypal" class="webshop__order__content__payment__form__label">
        <picture class="webshop__order__content__payment__form__picture">
          <source srcset="assets/img/payment/paypal.webp, assets/img/payment/paypal-2X.webp 2x"
            sizes="40px" type="image/webp">
          <source srcset="assets/img/payment/paypal.jpg, assets/img/payment/paypal-2X.jpg 2x"
            sizes="40px" type="image/jpg">
          <img class="webshop__order__content__payment__form__picture" alt="Paypal" src="assets/img/payment/paypal.jpg">
        </picture>
        <p class="webshop__order__content__payment__form__title">Paypal</p>
        <p class="webshop__order__content__payment__form__free">Gratis</p>
      </label>
      <div class="webshop__order__content__login__form__submit">
        <label><p class="form-error"></p><input type="checkbox" class="valid-input" name="terms" required>Ik accepteer de <a class="webshop__order__content__data__form__check__link" href="index.php">algemene voorwaarden</a></label>
        <button class="webshop__primary-btn-big" type="submit" name="action" value="payment">betalen &#8227;</button>
      </div>
    </form>
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
