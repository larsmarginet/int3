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
  <article class="webshop__order__content__data">
    <h3 class="hidden">login</h3>
    <form class="webshop__order__content__data__form" method="POST" action="index.php?page=data">
      <fieldset class="webshop__order__content__data__form__fieldset">
        <legend class="webshop__order__content__data__form__fieldset__legend">Persoonlijke gegevens</legend>
        <div>
          <label class="webshop__order__content__login__form__label" for="name">Naam</label>
          <p class="form-error"></p>
          <input class="webshop__order__content__login__form__input valid-input" type="text" name="name" id="name" value="<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){echo $_SESSION['user']['1']['user']['name'];}?>" required>
        </div>
        <div>
          <label class="webshop__order__content__login__form__label" for="email">E-mail <span class="webshop__order__content__login__form__label__span">Zodat we je kunnen updaten over jouw bestelling.</span></label>
          <p class="form-error"></p>
          <input class="webshop__order__content__login__form__input valid-input" type="email" name="email" id="email" value="<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){echo $_SESSION['user']['1']['user']['email'];}?>" required>
        </div>
      </fieldset>
      <fieldset class="webshop__order__content__data__form__fieldset">
        <legend class="webshop__order__content__data__form__fieldset__legend">Bezorgadres</legend>
        <div class="webshop__order__content__data__form__fieldset-wrapper">
          <div>
            <label class="webshop__order__content__login__form__label" for="street">Straat</label>
            <p class="form-error"></p>
            <input class="webshop__order__content__login__form__input webshop__order__content__login__form__input--street valid-input" type="text" name="street" id="street" value="<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){echo $_SESSION['user']['1']['user']['street'];}?>" required>
          </div>
          <div>
            <label class="webshop__order__content__login__form__label" for="number">Nummer</label>
            <p class="form-error"></p>
            <input class="webshop__order__content__login__form__input webshop__order__content__login__form__input--number valid-input" type="text" name="number" id="number" value="<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){echo $_SESSION['user']['1']['user']['number'];}?>" required>
          </div>
          <div>
            <label class="webshop__order__content__login__form__label" for="bus">Bus <span class="webshop__order__content__login__form__label__span">(Optioneel)</span></label>
            <p class="form-error"></p>
            <input class="webshop__order__content__login__form__input webshop__order__content__login__form__input--bus valid-input" type="text" name="bus" id="bus" value="<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){echo $_SESSION['user']['1']['user']['bus'];}?>">
          </div>
        </div>
        <div class="webshop__order__content__data__form__fieldset-wrapper">
          <div>
            <label class="webshop__order__content__login__form__label" for="zip">Postcode</label>
            <p class="form-error"></p>
            <input class="webshop__order__content__login__form__input webshop__order__content__login__form__input--zip valid-input" type="text" name="zip" id="zip" value="<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){echo $_SESSION['user']['1']['user']['zip'];}?>" required>
          </div>
          <div>
            <label class="webshop__order__content__login__form__label" for="city">Plaats</label>
            <p class="form-error"></p>
            <input class="webshop__order__content__login__form__input webshop__order__content__login__form__input--city valid-input" type="text" name="city" id="city" value="<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){echo $_SESSION['user']['1']['user']['city'];}?>" required>
          </div>
        </div>
      </fieldset>
      <label><input type="checkbox" class="webshop__order__content__data__form__check" name="billing" checked>Factuuradres is hetzelfde als bovenstaand bezorgadres</label>
      <fieldset class="webshop__order__content__data__form__fieldset hide-js webshop__order__content__data__form__fieldset--billing">
        <legend class="webshop__order__content__data__form__fieldset__legend">Factuuradres</legend>
        <div class="webshop__order__content__data__form__fieldset-wrapper">
          <div>
            <label class="webshop__order__content__login__form__label" for="billing-street">Straat</label>
            <p class="form-error"></p>
            <input class="webshop__order__content__login__form__input webshop__order__content__login__form__input--street valid-input" type="text" name="billing-street" id="billing-street">
          </div>
          <div>
            <label class="webshop__order__content__login__form__label" for="billing-number">Nummer</label>
            <p class="form-error"></p>
            <input class="webshop__order__content__login__form__input webshop__order__content__login__form__input--number valid-input" type="text" name="billing-number" id="billing-number">
          </div>
          <div>
            <label class="webshop__order__content__login__form__label" for="billing-bus">Bus <span class="webshop__order__content__login__form__label__span">(Optioneel)</span></label>
            <p class="form-error"></p>
            <input class="webshop__order__content__login__form__input webshop__order__content__login__form__input--bus valid-input" type="text" name="billing-bus" id="billing-bus">
          </div>
        </div>
        <div class="webshop__order__content__data__form__fieldset-wrapper">
          <div>
            <label class="webshop__order__content__login__form__label" for="billing-zip">Postcode</label>
            <p class="form-error"></p>
            <input class="webshop__order__content__login__form__input webshop__order__content__login__form__input--zip valid-input" type="text" name="billing-zip" id="billing-zip">
          </div>
          <div>
            <label class="webshop__order__content__login__form__label" for="billing-city">Plaats</label>
            <p class="form-error"></p>
            <input class="webshop__order__content__login__form__input webshop__order__content__login__form__input--city valid-input" type="text" name="billing-city" id="billing-city">
          </div>
        </div>
      </fieldset>
      <div class="webshop__order__content__login__form__submit">
        <button class="webshop__primary-btn-big" type="submit" name="action" value="data">Betaalmethode &#8227;</button>
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
