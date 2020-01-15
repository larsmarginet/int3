<h1 class="webshop__products__title">Winkelmandje</h1>
<section class="webshop__cart__orders">
  <h2 class="hidden">Bestelling</h2>
  <?php if(!empty($_SESSION['cart'])) {?>
  <form action="index.php?page=cart" method="POST" class="webshop__cart__orders__form">
  <button type="submit" class="webshop__secondary-btn-big hide-js" name="action" id="update-cart" value="update">Update</button>
    <table class="webshop__cart__orders__form__table">
      <?php foreach($_SESSION['cart'] as $order): ?>
        <?php if($order['product'] !== 'gift'): ?>
        <tr class="webshop__cart__orders__form__table__order">
          <td class="webshop__cart__orders__form__table__order__image">
            <picture class="webshop__cart__orders__form__table__order__image__picture">
              <source srcset="../../assets/img/<?php echo $order['product']['image']?>/0.webp, ../../assets/img/<?php echo $order['product']['image']?>/0-2X.webp 2x"
                sizes="40w" type="image/webp">
              <source srcset="../../assets/img/<?php echo $order['product']['image']?>/0.jpg, ../../assets/img/<?php echo $order['product']['image']?>/0-2X.jpg 2x"
                sizes="40w" type="image/jpg">
              <img class="webshop__cart__orders__form__table__order__image__picture" alt="<?php echo $order['product']['name']?>" src="../../assets/img/<?php echo $order['product']['image']?>/0.jpg">
            </picture>
        </td>
          <td class="webshop__cart__orders__form__table__order__title"><span class="webshop__cart__orders__form__table__order__title__amount"><?php echo $order['quantity']?>x</span> <?php echo $order['product']['name']?></td>
          <td class="webshop__cart__orders__form__table__order__quantity"><input class="webshop__cart__orders__form__table__order__quantity__input" type="text" name="quantity[<?php echo $order['product']['id'];?>]" min="1" value="<?php echo $order['quantity']?>"></td>
          <?php
          $discount = 0;
            if(isset($_SESSION['discount']) && !empty($_SESSION['discount'])){
              foreach($_SESSION['discount'] as $item){
                if($item['product']['id'] == $order['product']['id']) {
                  $discount = 1;
                } else {
                  $discount = 0;
                }
              }
            }
          ?>

          <td class="webshop__cart__orders__form__table__order__price" data-price="<?php echo $order['product']['price']?>" data-discountprice="<?php
            if($discount === 1) {
              echo $order['product']['discount_price'];
            } else {
              echo $order['product']['price'];
            }
          ?>"><?php
            if($discount === 1) {
              echo '&euro;' . number_format(($order['product']['discount_price']*$order['quantity']), 2 , "," , ".");
            } else {
              echo '&euro;' . number_format(($order['product']['price']*$order['quantity']), 2 , "," , ".");
            }
          ?></td>
          <td class="webshop__cart__orders__form__table__order__remove"><button type="submit"  class="webshop__cart__orders__form__table__order__remove-btn" name="remove" value="<?php echo $order['product']['id'];?>">&times;</button></td>
        </tr>
        <?php endif;
        endforeach; ?>
    </table>
    <div class="webshop__cart__orders__form__info-wrapper">
      <input type="hidden" name="id" value="3"/>
      <label for="discount" class="webshop__detail__general__discount__label webshop__cart__orders__form__info__label">Kortingscode</label>
      <p class="webshop__detail__general__discount__explain webshop__cart__orders__form__info__explain">Je vindt hem op de eerste pagina van jouw Humo (ABCDEF123)</p>
      <div class="webshop__detail__general__discount__input-wrapper webshop__cart__orders__form__info__input-wrapper">
        <input id="discount" type="text" name="discount" class="webshop__detail__general__discount__input" value="<?php
              if(isset($_SESSION['discount']) && !empty($_SESSION['discount'])){
                foreach($_SESSION['discount'] as $code) {
                  if($code['product']['id'] == 3) {
                    echo $code['discount'];
                  }
                }
              }?>">
        <button class="webshop__primary-btn-small" type="submit" name="action" value="addDiscount">&#43;</button>
      </div>
      <div class="webshop__cart__orders__form__gift">
        <input id="gift" class="webshop__cart__orders__form__gift__input" name="gift" type="checkbox" <?php if(isset($_SESSION['cart']['gift'])){echo 'checked';} ?>>
        <img class="webshop__cart__orders__form__gift__img" alt="Humo cadeaupapier" src="../../assets/img/wrappingpaper.png">
        <label class="webshop__cart__orders__form__gift__label" for="gift">Inpakken als cadeau (€2)</label>
      </div>
      <?php
        $totalPrice = 0;
        foreach($_SESSION['cart'] as $price){
          if($price['product'] !== 'gift'){
            $totalPrice += $price['product']['price']*$price['quantity'];
          } else if($price['product'] === 'gift') {
            $totalPrice += 2;
          }
        }

        $discountPrice = 0;
        foreach($_SESSION['cart'] as $price){
          if($price['product'] !== 'gift'){
            if(isset($_SESSION['discount']) && !empty($_SESSION['discount'])){
              foreach($_SESSION['discount'] as $item){
                if($item['product']['id'] == $price['product']['id']) {
                  $discountPrice += ($price['product']['discount_price']*$price['quantity']);
                } else {
                  $discountPrice += ($price['product']['price']*$price['quantity']);
                }
              }
            } else {
              $discountPrice += $price['product']['price']*$price['quantity'];
            }
          } else if($price['product'] === 'gift') {
            $discountPrice += 2;
          }
        }
      ?>
      <div class="webshop__cart__orders__form__price__discount-wrapper">
        <p class="webshop__cart__orders__form__price__original">&euro;<?php echo number_format(($totalPrice), 2 , "," , ".") ?> </p>
        <p class="webshop__cart__orders__form__price__savings"> Je bespaart &euro;<?php echo number_format(($totalPrice-$discountPrice), 2 , "," , ".")?></p>
      </div>
      <div class="webshop__cart__orders__form__price__big">
        <p class="webshop__cart__orders__form__price__total">Totaal:</p>
        <p class="webshop__cart__orders__form__price__total-price">&euro;<?php echo number_format(($discountPrice), 2 , "," , ".")?></p>
      </div>
      <a class="webshop__primary-btn-big" href="index.php?page=login">bestellen</a>
    </div>

  </form>
      <?php } else {
        echo 'Winkelmanje is leeg';
      } ?>
  <aside class="webshop__cart__info">
    <h2 class="hidden">Informatie</h2>
    <ul class="webshop__cart__info__list webshop__detail__general__list">
      <li class="webshop__detail__general__list__item"><strong class="webshop__strong">Gratis</strong> geleverd</li>
      <li class="webshop__detail__general__list__item">Thuis geleverd op <strong class="webshop__strong"><?php echo $date ?></strong></li>
      <li class="webshop__detail__general__list__item">30 dagen bedenktijd</li>
    </ul>
  </aside>
</section>




