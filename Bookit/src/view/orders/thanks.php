<?php if(isset($_SESSION['orders']) && !empty($_SESSION['orders'])):?>
  <h1 class="webshop__thanks__title">Bedankt!</h1>
  <p class="webshop__thanks__text">Binnen enkele ogenblikken kun je een bevestigingsmail verwachten op het mailadres:</p>
  <p class="webshop__thanks__text--highlight"><?php echo $_SESSION['orders']['info']['email'] ?></p>
  <p class="webshop__thanks__text">Dan kun je op <strong class="webshop__strong"><?php echo $date ?></strong> je pakketje verwachten op het adres: </p>
  <p class="webshop__thanks__text--highlight"><?php echo $_SESSION['orders']['info']['street'] . ' ' . $_SESSION['orders']['info']['number'] . ', ' . $_SESSION['orders']['info']['zip'] . ' ' . $_SESSION['orders']['info']['city']?></p>

  <section class="webshop__thanks__overview">
    <h2 class="hidden">Overzicht</h2>
    <article class="webshop__thanks__overview-wrapper">
      <h3 class="webshop__thanks__overview__title">Jouw Gegevens</h3>
      <table class="webshop__thanks__overview__table">
        <tr class="webshop__thanks__overview__table__row">
          <td class="webshop__thanks__overview__table__row__title">Naam:</td>
          <td class="webshop__thanks__overview__table__row__info"><?php echo $_SESSION['orders']['info']['name']?></td>
        </tr>
        <tr class="webshop__thanks__overview__table__row">
          <td class="webshop__thanks__overview__table__row__title">E-mail:</td>
          <td class="webshop__thanks__overview__table__row__info"><?php echo $_SESSION['orders']['info']['email']?></td>
        </tr>
        <tr class="webshop__thanks__overview__table__row">
          <td class="webshop__thanks__overview__table__row__title">Straat + nr:</td>
          <td class="webshop__thanks__overview__table__row__info"><?php echo $_SESSION['orders']['info']['street'] . ' ' .  $_SESSION['orders']['info']['number']?></td>
        </tr>
        <tr class="webshop__thanks__overview__table__row">
          <td class="webshop__thanks__overview__table__row__title">Postcode + plaats:</td>
          <td class="webshop__thanks__overview__table__row__info"><?php echo $_SESSION['orders']['info']['zip'] . ', ' .  $_SESSION['orders']['info']['city']?></td>
        </tr>
        <tr class="webshop__thanks__overview__table__row">
          <td class="webshop__thanks__overview__table__row__title">Betaalmethode:</td>
          <td class="webshop__thanks__overview__table__row__info"><?php echo $_SESSION['orders']['payment']?></td>
        </tr>
      </table>
    </article>
    <article class="webshop__thanks__overview-wrapper">
      <h3 class="webshop__thanks__overview__title">Bestelling</h3>
      <table class="webshop__thanks__order__table">
        <?php foreach($_SESSION['orders']['orders'] as $order) :
          if($order['name'] !== 'gift'){
          ?>

          <?php
          // $discount = 0;
          //   if(isset($_SESSION['discount']) && !empty($_SESSION['discount'])){
          //     foreach($_SESSION['discount'] as $item){
          //       if($item['product']['id'] == $order['product']['id']) {
          //         $discount = 1;
          //       } else {
          //         $discount = 0;
          //       }
          //     }
          //   }
          ?>

          <tr class="webshop__thanks__order__table__row">
            <td class="webshop__thanks__order__table__row__quantity"><?php echo $order['quantity']?>x</td>
            <td class="webshop__thanks__order__table__row__title"><?php echo $order['name']?> <?php if(isset($order['color'])) {echo '('. $order['color'] .')';} ?></td>
            <td class="webshop__thanks__order__table__row__price"><?php
            // if($discount === 1) {
            //   echo '&euro;' . number_format(($order['product']['discount_price']*$order['quantity']), 2 , "," , ".");
            // } else {
              echo '&euro;' . number_format(($order['price']*$order['quantity']), 2 , "," , ".");
            // }
          ?></td>
          </tr>
        <?php } else { ?>
          <tr class="webshop__thanks__order__table__row">
            <td class="webshop__thanks__order__table__row__quantity">1x</td>
            <td class="webshop__thanks__order__table__row__title">Inpakken als cadeau</td>
            <td class="webshop__thanks__order__table__row__price">&euro;2,00</td>
          </tr>
        <?php } endforeach; ?>
      </table>
      <?php
        $totalPrice = 0;
        foreach($_SESSION['orders']['orders'] as $price){
          if($price['name'] !== 'gift'){
            // if(isset($_SESSION['discount']) && !empty($_SESSION['discount'])){
            //   foreach($_SESSION['discount'] as $item){
            //     if($item['product']['id'] == $price['product']['id']) {
            //       $totalPrice += ($price['product']['discount_price']*$price['quantity']);
            //     } else {
            //       $totalPrice += ($price['product']['price']*$price['quantity']);
            //     }
            //   }
            // } else {
              $totalPrice += $price['price']*$price['quantity'];
            // }
          } else if($price['name'] === 'gift') {
            $totalPrice += 2;
          }
        }
      ?>
      <p class="webshop__thanks__order__price">Totaal: &euro;<?php echo number_format(($totalPrice), 2 , "," , ".") ?> </p>
    </article>
  </section>
<?php endif; ?>
<section class="webshop__thanks__questions">
  <h2 class="webshop__thanks__overview__title">vragen?</h2>
  <div class="webshop__thanks__questions-wrapper">
    <address class="webshop__thanks__questions__contact">
      <p class="webshop__thanks__questions__text">
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M20.9999 15.9201V18.9201C21.0011 19.1986 20.944 19.4743 20.8324 19.7294C20.7209 19.9846 20.5572 20.2137 20.352 20.402C20.1468 20.5902 19.9045 20.7336 19.6407 20.8228C19.3769 20.912 19.0973 20.9452 18.8199 20.9201C15.7428 20.5857 12.7869 19.5342 10.1899 17.8501C7.77376 16.3148 5.72527 14.2663 4.18993 11.8501C2.49991 9.2413 1.44818 6.27109 1.11993 3.1801C1.09494 2.90356 1.12781 2.62486 1.21643 2.36172C1.30506 2.09859 1.4475 1.85679 1.6347 1.65172C1.82189 1.44665 2.04974 1.28281 2.30372 1.17062C2.55771 1.05843 2.83227 1.00036 3.10993 1.0001H6.10993C6.59524 0.995321 7.06572 1.16718 7.43369 1.48363C7.80166 1.80008 8.04201 2.23954 8.10993 2.7201C8.23656 3.68016 8.47138 4.62282 8.80993 5.5301C8.94448 5.88802 8.9736 6.27701 8.89384 6.65098C8.81408 7.02494 8.6288 7.36821 8.35993 7.6401L7.08993 8.9101C8.51349 11.4136 10.5864 13.4865 13.0899 14.9101L14.3599 13.6401C14.6318 13.3712 14.9751 13.1859 15.3491 13.1062C15.723 13.0264 16.112 13.0556 16.4699 13.1901C17.3772 13.5286 18.3199 13.7635 19.2799 13.8901C19.7657 13.9586 20.2093 14.2033 20.5265 14.5776C20.8436 14.9519 21.0121 15.4297 20.9999 15.9201Z" stroke="#DB3125" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
          02 454 29 12
      </p>
      <p class="webshop__thanks__questions__text">
        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M20 2C20 0.9 19.1 0 18 0H2C0.9 0 0 0.9 0 2V14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2ZM18 2L10 6.99L2 2H18ZM18 14H2V4L10 9L18 4V14Z" fill="#DB3125"/>
        </svg>
        <a class="webshop__thanks__questions__text__link" href="mailto:helpdesk@humo.be">helpdesk@humo.be</a>
      </p>
    </address>
    <div class="webshop__thanks__questions__hours">
      <p class="webshop__thanks__questions__text">Ma - Vrij: 8u - 18u</p>
      <p class="webshop__thanks__questions__text">Zat: 8u - 13u</p>
    </div>
  </div>
</section>

<a class="webshop__primary-btn-big webshop__thanks__btn" href="index.php?page=home">
  <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M20.5654 9.34434L11.0239 0.208078C10.9552 0.142118 10.8736 0.0897877 10.7838 0.054083C10.694 0.0183783 10.5977 0 10.5004 0C10.4032 0 10.3069 0.0183783 10.2171 0.054083C10.1272 0.0897877 10.0456 0.142118 9.97692 0.208078L0.435491 9.34434C0.157518 9.6107 0 9.97251 0 10.3499C0 11.1334 0.664819 11.7705 1.48252 11.7705H2.48786V18.2897C2.48786 18.6826 2.81911 19 3.22912 19H9.01791V14.0279H11.6123V19H17.7717C18.1818 19 18.513 18.6826 18.513 18.2897V11.7705H19.5183C19.9121 11.7705 20.2897 11.6217 20.5677 11.3532C21.1445 10.7982 21.1445 9.89926 20.5654 9.34434Z" fill="white"/>
  </svg>home
</a>
