<h1 class="hidden">Products</h1>
<section class="webshop__banner">
  <div class="webshop__banner__img-wrapper">
    <div class="webshop__banner__img__discount">
      <p class="webshop__banner__img__discount__price">&euro;12,99</p>
      <p class="webshop__banner__img__discount__discount-price">&euro;4,99</p>
      <p class="webshop__banner__img__discount__text">met kortingscode uit je Humo</p>
    </div>
    <picture class="webshop__banner__img">
     <source srcset="assets/img/TheHandmaidsTale/banner_thehanmaidstale.webp, assets/img/TheHandmaidsTale/banner_thehanmaidstale-2X.webp 2x"
        type="image/webp">
        <source srcset="assets/img/TheHandmaidsTale/banner_thehanmaidstale.png, assets/img/TheHandmaidsTale/banner_thehanmaidstale-2X.png 2x"
           type="image/png">
        <img class="webshop__banner__img" alt="The Handmaid's Tale Boek" src="assets/img/TheHandmaidsTale/banner_thehanmaidstale.png">
      </picture>
  </div>
  <div class="webshop__banner__info">
    <h2 class="webshop__banner__info__title">Boek van de week:</h2>
    <p class="webshop__banner__info__book-title">The Handmaid’s Tale</p>
    <p class="webshop__banner__info__book-author">Margeret Atwood</p>
    <div class="webshop__banner__info__quote-wrapper">
      <blockquote class="webshop__banner__info__quote">“Horror in de zuiverste zin van het woord”</blockquote>
      <small class="webshop__banner__info__quote-author">- The Guardian</small>
    </div>
    <div class="webshop__banner__info__buttons">
      <form method="POST" action="index.php?page=cart">
        <input type="hidden" name="id" value="3"/>
        <button class="webshop__primary-btn-small" type="submit" name="action" value="add">
          <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.9905 6.38903L18.1937 10.96C18.0954 11.465 17.6931 11.772 17.2292 11.7778H5.61292L5.38229 13.0778H16.4534C17.0363 13.1221 17.4318 13.5351 17.4389 14.0633C17.3965 14.645 16.9835 15.0415 16.4534 15.0488H4.20807C3.54581 14.9892 3.15091 14.4613 3.22257 13.8746L3.74677 11.0229L2.94999 3.01314L0.685455 2.30028C0.132064 2.08056 -0.0937983 1.57994 0.0354492 1.06317C0.250355 0.5246 0.765303 0.278534 1.27256 0.413165L4.16613 1.33576C4.55595 1.48188 4.78019 1.80097 4.8371 2.17448L5.00484 3.76804L18.1308 5.23579C18.7339 5.36643 19.0613 5.84414 18.9905 6.38903ZM7.20847 17.118C7.20847 17.9489 6.53492 18.6224 5.70402 18.6224C4.87313 18.6224 4.19958 17.9489 4.19958 17.118C4.19958 16.2871 4.87315 15.6135 5.70402 15.6135C6.53491 15.6135 7.20847 16.2871 7.20847 17.118ZM16.19 17.118C16.19 17.9489 15.5164 18.6224 14.6855 18.6224C13.8546 18.6224 13.1811 17.9489 13.1811 17.118C13.1811 16.2871 13.8546 15.6135 14.6855 15.6135C15.5164 15.6135 16.19 16.2871 16.19 17.118Z" fill="white"/>
          </svg>kopen
        </button>
      </form>
      <?php
        $favosTop = 0;
        if(!empty($_SESSION['favorite'])){
          foreach($_SESSION['favorite'] as $favoTop){
            if($favoTop['product']['id'] === 3){
              $favosTop = 1;
            }
          }
        }
      ?>
      <?php if($favosTop === 1){ ?>
        <form method="POST" action="index.php?page=home&id=3">
          <input type="hidden" name="product_id" value="3" />
          <button class="webshop__favorite-btn" type="submit" name="action" value="remove">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="#DB3125" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.9735 8.15545C0.242831 5.87394 0.819722 2.45166 3.70418 1.3109C6.58863 0.170147 8.3193 2.45166 8.8962 3.59242C9.47309 2.45166 11.7807 0.170147 14.6651 1.3109C17.5496 2.45166 17.5496 5.87394 15.8189 8.15545C14.0882 10.437 8.8962 15 8.8962 15C8.8962 15 3.70418 10.437 1.9735 8.15545Z" stroke="#DB3125" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </form>
       <?php } else { ?>
        <form method="POST" action="index.php?page=home&id=3">
          <input type="hidden" name="product_id" value="3" />
          <button class="webshop__favorite-btn" type="submit" name="action" value="add">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.9735 8.15545C0.242831 5.87394 0.819722 2.45166 3.70418 1.3109C6.58863 0.170147 8.3193 2.45166 8.8962 3.59242C9.47309 2.45166 11.7807 0.170147 14.6651 1.3109C17.5496 2.45166 17.5496 5.87394 15.8189 8.15545C14.0882 10.437 8.8962 15 8.8962 15C8.8962 15 3.70418 10.437 1.9735 8.15545Z" stroke="#DB3125" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </form>
       <?php } ?>
      <a class="webshop__secondary-btn-small" href="index.php?page=detail&id=3">meer info</a>
    </div>
  </div>
</section>





<section class="webshop__filter">
  <h2 class="hidden">Filter</h2>
  <form method="GET" class="webshop__filter__form" id="filterForm" action="index.php?page=home">
    <div class="webshop__filter__form-wrapper">
      <input class="webshop__filter__form__input hidden" type="checkbox" name="product_category[]" value="1" id="boeken" <?php if (!empty($_GET['product_category']) && in_array('1', $_GET['product_category'])) echo 'checked';?>>
      <label for="boeken" class="webshop__filter__form__label">Boeken</label>
      <input class="webshop__filter__form__input hidden" type="checkbox" name="product_category[]" value="2" id="ebooks" <?php if (!empty($_GET['product_category']) && in_array('2', $_GET['product_category'])) echo 'checked';?>>
      <label for="ebooks" class="webshop__filter__form__label">Ebooks</label>
      <input class="webshop__filter__form__input hidden" type="checkbox" name="product_category[]" value="3" id="accessoires" <?php if (!empty($_GET['product_category']) && in_array('3', $_GET['product_category'])) echo 'checked';?>>
      <label for="accessoires" class="webshop__filter__form__label">Accessoires</label>
    </div>
    <div class="webshop__filter__form__btns">
      <input class="webshop__primary-btn-small hide-js" type="submit" value="filteren">
      <a class="webshop__filter__remove" href="index.php">Wis filters</a>
    </div>
    <a href="index.php?page=subscriptions" class="webshop__filter__subscribe">abonnement nemen</a>
  </form>
</section>





<section class="webshop__products">
  <h2 class="hidden">Producten</h2>
  <?php foreach($products as $product): ?>
    <article class="webshop__product">
      <div class="webshop__product__img-wrapper">
        <picture class="webshop__product__img">
          <source srcset="assets/img/<?php echo $product['image']?>/0.webp, assets/img/<?php echo $product['image']?>/0-2X.webp 2x"
             type="image/webp">
          <source srcset="assets/img/<?php echo $product['image']?>/0.jpg, assets/img/<?php echo $product['image']?>/0-2X.jpg 2x"
             type="image/jpg">
          <img class="webshop__product__img" alt="<?php echo $product['name']?>" src="assets/img/<?php echo $product['image']?>/0.jpg">
        </picture>
        <?php
        $favos = 0;
        if(!empty($_SESSION['favorite'])){
          foreach($_SESSION['favorite'] as $favo){
            if($favo['product']['id'] === $product['id']){
              $favos = 1;
            }
          }
        }
      ?>
      <?php if($favos === 1){ ?>
        <form class="webshop__product__favorite" method="POST" action="index.php?page=home&id=<?php echo $product['id'];?>">
          <input type="hidden" name="product_id" value="<?php echo $product['id'];?>" />
          <button type="submit" name="action" value="remove">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="#DB3125" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.9735 8.15545C0.242831 5.87394 0.819722 2.45166 3.70418 1.3109C6.58863 0.170147 8.3193 2.45166 8.8962 3.59242C9.47309 2.45166 11.7807 0.170147 14.6651 1.3109C17.5496 2.45166 17.5496 5.87394 15.8189 8.15545C14.0882 10.437 8.8962 15 8.8962 15C8.8962 15 3.70418 10.437 1.9735 8.15545Z" stroke="#DB3125" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </form>
       <?php } else { ?>
        <form class="webshop__product__favorite" method="POST" action="index.php?page=home&id=<?php echo $product['id'];?>">
          <input type="hidden" name="product_id" value="<?php echo $product['id'];?>" />
          <button type="submit" name="action" value="add">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.9735 8.15545C0.242831 5.87394 0.819722 2.45166 3.70418 1.3109C6.58863 0.170147 8.3193 2.45166 8.8962 3.59242C9.47309 2.45166 11.7807 0.170147 14.6651 1.3109C17.5496 2.45166 17.5496 5.87394 15.8189 8.15545C14.0882 10.437 8.8962 15 8.8962 15C8.8962 15 3.70418 10.437 1.9735 8.15545Z" stroke="#DB3125" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </form>
       <?php } ?>
      </div>
      <div class="webshop__product__review-wrapper">
        <div class="webshop__product__review__score">
          <?php for ($i=0; $i < round($product['averagescore']); $i++) {
            echo '<svg width="17" height="16" viewBox="0 0 17 16" fill="#db3125" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
            </svg>';
          }?>
          <?php
            for ($i=0; $i < (5 - round($product['averagescore'])); $i++) {
              echo '<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
              </svg>';
          }?>
        </div>
        <p class="webshop__product__review__amount"><?php echo $product['countscore'] ?> reviews</p>
      </div>
      <div class="webshop__product__info-wrapper">
        <h3 class="webshop__product__title"><?php echo $product['name']?></h3>
          <?php if(!empty($product['author'])): ?>
            <p class="webshop__product__subtitle">
              <?php echo $product['author']; ?>
            </p>
          <?php endif; ?>
        </div>
        <div class="webshop__product__end-wrapper">
          <?php if($product['discount_price'] > 0){ ?>
            <div class="webshop__product__price-wrapper">
              <p class="webshop__product__price"><?php echo '€' . number_format(($product['discount_price']), 2 , "," , ".");?></p>
              <p class="webshop__product__discountprice"><?php echo number_format(($product['price']), 2 , "," , ".")?></p>
              <p class="webshop__product__discountprice-text">kortingscode uit je Humo</p>
            </div>
          <?php } else { ?>
            <p class="webshop__product__price"><?php echo '€' . number_format(($product['price']), 2 , "," , ".");?></p>
          <?php } ?>
          <div class="webshop__product__btn-wrapper">
            <form method="POST" action="index.php?page=cart">
              <input type="hidden" name="id" value="<?php echo $product['id'];?>"/>
              <button class="webshop__primary-btn-small" type="submit" name="action" value="add">
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M18.9905 6.38903L18.1937 10.96C18.0954 11.465 17.6931 11.772 17.2292 11.7778H5.61292L5.38229 13.0778H16.4534C17.0363 13.1221 17.4318 13.5351 17.4389 14.0633C17.3965 14.645 16.9835 15.0415 16.4534 15.0488H4.20807C3.54581 14.9892 3.15091 14.4613 3.22257 13.8746L3.74677 11.0229L2.94999 3.01314L0.685455 2.30028C0.132064 2.08056 -0.0937983 1.57994 0.0354492 1.06317C0.250355 0.5246 0.765303 0.278534 1.27256 0.413165L4.16613 1.33576C4.55595 1.48188 4.78019 1.80097 4.8371 2.17448L5.00484 3.76804L18.1308 5.23579C18.7339 5.36643 19.0613 5.84414 18.9905 6.38903ZM7.20847 17.118C7.20847 17.9489 6.53492 18.6224 5.70402 18.6224C4.87313 18.6224 4.19958 17.9489 4.19958 17.118C4.19958 16.2871 4.87315 15.6135 5.70402 15.6135C6.53491 15.6135 7.20847 16.2871 7.20847 17.118ZM16.19 17.118C16.19 17.9489 15.5164 18.6224 14.6855 18.6224C13.8546 18.6224 13.1811 17.9489 13.1811 17.118C13.1811 16.2871 13.8546 15.6135 14.6855 15.6135C15.5164 15.6135 16.19 16.2871 16.19 17.118Z" fill="white"/>
                </svg>kopen
              </button>
            </form>
            <a class="webshop__secondary-btn-small" href="index.php?page=detail&id=<?php echo $product['id'];?>">meer info</a>
          </div>
        </div>
    </article>
  <?php endforeach; ?>
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





<section class="webshop__subscription__footer">
  <div class="webshop__subscription__footer-wrapper">
    <h2 class="webshop__subscription__footer__title">Nog geen abonnement?</h2>
    <picture class="webshop__subscription__footer__image">
      <source srcset="assets/img/Subscription/1.webp, assets/img/Subscription/1-2X.webp 2x"
         type="image/webp">
      <source srcset="assets/img/Subscription/1.png, assets/img/Subscription1-2X.png 2x"
         type="image/png">
      <img class="webshop__subscription__footer__image" alt="Humo abonnement" src="assets/img/Subscription/1.png">
    </picture>
    <ul class="webshop__subscription__footer__list">
      <li class="webshop__subscription__footer__list__item">Sluit aan bij 50.000 andere humo(r) fans</li>
      <li class="webshop__subscription__footer__list__item">Je betaalt maandelijks</li>
      <li class="webshop__subscription__footer__list__item">1 x betalen en dan wordt het bedrag automatisch gestort</li>
    </ul>
  <form class="webshop__subscription__subscribe__form" method="POST" action="index.php?page=cart">
    <?php foreach($subscriptions as $subscription): ?>
      <input id="<?php echo $subscription['id']?>" class="webshop__subscription__subscribe__form__input" type="radio" name="id" value="<?php echo $subscription['id']?>" <?php if($subscription['id'] == 29){echo 'checked';} ?>>
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
      <a class="webshop__secondary-btn-big" href="index.php?page=subscriptions">meer info</a>
      <button class="webshop__primary-btn-big webshop__subscription__subscribe__form__submit" type="submit" name="action" value="add">
        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18.9905 6.38903L18.1937 10.96C18.0954 11.465 17.6931 11.772 17.2292 11.7778H5.61292L5.38229 13.0778H16.4534C17.0363 13.1221 17.4318 13.5351 17.4389 14.0633C17.3965 14.645 16.9835 15.0415 16.4534 15.0488H4.20807C3.54581 14.9892 3.15091 14.4613 3.22257 13.8746L3.74677 11.0229L2.94999 3.01314L0.685455 2.30028C0.132064 2.08056 -0.0937983 1.57994 0.0354492 1.06317C0.250355 0.5246 0.765303 0.278534 1.27256 0.413165L4.16613 1.33576C4.55595 1.48188 4.78019 1.80097 4.8371 2.17448L5.00484 3.76804L18.1308 5.23579C18.7339 5.36643 19.0613 5.84414 18.9905 6.38903ZM7.20847 17.118C7.20847 17.9489 6.53492 18.6224 5.70402 18.6224C4.87313 18.6224 4.19958 17.9489 4.19958 17.118C4.19958 16.2871 4.87315 15.6135 5.70402 15.6135C6.53491 15.6135 7.20847 16.2871 7.20847 17.118ZM16.19 17.118C16.19 17.9489 15.5164 18.6224 14.6855 18.6224C13.8546 18.6224 13.1811 17.9489 13.1811 17.118C13.1811 16.2871 13.8546 15.6135 14.6855 15.6135C15.5164 15.6135 16.19 16.2871 16.19 17.118Z" fill="white"/>
        </svg>kopen
      </button>
    </div>
  </form>
  </div>
</section>
