<h1 class="hidden"><?php echo $product['name'] ?></h1>
<section class="webshop__detail__general">
  <h2 class="hidden">Algemene info</h2>
  <article class="webshop__detail__general__img">
    <h3 class="hidden">Afbeeldingen</h3>
    <div class="webshop__detail_general__img__large-wrapper">
      <picture class="webshop__detail_general__img__large">
        <source srcset="assets/img/<?php echo $largeImage['image-webp-1X']?>, assets/img/<?php echo $largeImage['image-webp-2X']?> 2x"
          type="image/webp">
        <source srcset="assets/img/<?php echo $largeImage['image-jpg-1X']?>, assets/img/<?php echo $largeImage['image-jpg-2X']?> 2x"
          type="image/jpg">
        <img alt="<?php echo $product['name']?>" src="assets/img/<?php echo $largeImage['image-jpg-1X']?>">
      </picture>
    </div>
    <ul class="webshop__detail__general__img__small">
      <?php foreach($images as $image): ?>
        <li class="webshop__detail__general__img__small__item <?php
          if(!empty($_GET['image']) && $_GET['image'] == $image['id']){
            echo 'webshop__detail__general__img__small__item--highlight';
          } else {
            if ($image['id'] == $largeImage['id']) {
              echo 'webshop__detail__general__img__small__item--highlight';
            }
          }
            ; ?>">
          <a class="webshop__detail__general__img__small__item__link" href="index.php?page=detail&id=<?php echo $product['id']?>&image=<?php echo $image['id']?>">
            <picture class="webshop__detail_general__img__small__picture">
              <source srcset="assets/img/<?php echo $image['image-webp-1X']?>, assets/img/<?php echo $image['image-webp-2X']?> 2x"
                type="image/webp">
              <source srcset="assets/img/<?php echo $image['image-jpg-1X']?>, assets/img/<?php echo $image['image-jpg-2X']?> 2x"
                type="image/jpg">
              <img class="webshop__detail_general__img__small__picture__img" alt="<?php echo $product['name']?>" src="assets/img/<?php echo $image['image-jpg-1X']?>">
          </picture>
          </a>
      <?php endforeach ?>
    </ul>
    <?php if(!empty($product['viewing_copy'])): ?>
      <a class="webshop__detail__general__btn" href="index.php?page=detailViewingCopy&id=<?php echo $product['id']?>" target="_blank">Inkijkexemplaar</a>
      <div class="webshop__detail__general__modal">
        <div class="webshop__detail__general__modal-content">
          <p class="webshop__detail__general__modal-conten__close">&times;</p>
          <p class="webshop__detail__general__modal-content__text"><?php echo $product['viewing_copy']?></p>
        </div>
      </div>
    <?php endif; ?>
  </article>
  <article class="webshop__detail__general__info">
    <h3 class="webshop__detail__general__info__title"><?php echo $product['name']?></h3>
    <?php if(!empty($product['author'])): ?>
      <p class="webshop__detail__general__info__subtitle"><?php echo $product['author']?></p>
    <?php endif; ?>
    <div class="webshop__product__review-wrapper">
      <div class="webshop__product__review__score" data-average="<?php echo $average?>" data-count="<?php echo $count?>">
        <?php for ($i=0; $i < $average; $i++) {
          echo '<svg width="17" height="16" viewBox="0 0 17 16" fill="#db3125" xmlns="http://www.w3.org/2000/svg">
          <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
          </svg>';
        }?>
        <?php
          for ($i=0; $i < (5 - $average); $i++) {
            echo '<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
            </svg>';
        }?>
      </div>
      <a href="#reviews" class="webshop__product__review__amount"><?php echo $count ?> reviews</a>
    </div>
    <?php if($product['paperback_id'] > 0): ?>
      <div class="webshop__detail__general__version-wrapper">
        <a href="index.php?page=detail&id=<?php echo $product['paperback_id']?>" class="<?php
          if($product['id'] == $product['paperback_id']) {
            echo 'webshop__primary-btn-small';
          } else {
            echo 'webshop__secondary-btn-small';
          }
        ?>">paperback</a>
        <a href="index.php?page=detail&id=<?php echo $product['ebook_id']?>" class="<?php
          if($product['id'] == $product['ebook_id']) {
            echo 'webshop__primary-btn-small';
          } else {
            echo 'webshop__secondary-btn-small';
          }
        ?>">ebook</a>
      </div>
    <?php endif; ?>
    <?php if(!empty($versions)): ?>
      <div class="webshop__detail__general__version-wrapper">
        <?php foreach($versions as $i => $version): ?>
          <!-- Voorlopig gewoon links, eens nadenken als je het effectief kunt kopen -->
          <a href="index.php?page=detail&id=<?php echo $product['id']?>&color=<?php echo $version['color'] ?>" class="<?php
          if(isset($_GET['color']) && !empty($_GET['color'])) {
            if($_GET['color'] == $version['color']) {
              echo 'webshop__primary-btn-small';
            } else {
              echo 'webshop__secondary-btn-small';
            }
          } else {
            if($i == 0) {
              echo 'webshop__primary-btn-small';
            } else {
              echo 'webshop__secondary-btn-small';
            }
          }
        ?>"><?php echo $version['color'] ?></a>
        <?php endforeach ?>
      </div>
    <?php endif; ?>
    <p class="webshop__detail__general__stock">Op voorraad</p>
    <div class="webshop__detail__general__price-wrapper">

        <p class="webshop__detail__general__price">
          <?php
          $discount = 0;
            if(isset($_SESSION['discount']) && !empty($_SESSION['discount'])){
              foreach($_SESSION['discount'] as $item){
                if($item['product']['id'] == $product['id']) {
                  $discount = 1;
                } else {
                  $discount = 0;
                }
              }
            }

            if($discount === 1) {
              echo '&euro;' . number_format(($product['discount_price']), 2 , "," , ".");
            } else {
              echo '&euro;' . number_format(($product['price']), 2 , "," , ".");
            }
          ?>
        </p>


        <?php if(($product['discount_price'] > 0 || $product['product_category'] == 2) && $discount === 0):  ?>
        <p class="webshop__detail__general__price-detail">
          <?php
            if($product['discount_price'] > 0){
              echo '&euro;' . number_format(($product['discount_price']), 2 , "," , ".") . ' met kortingscode uit je Humo';
            } else if ($product['product_category'] == 2) {
              echo 'Na de betaling krijg je de code in jouw mailbox';
            }
          ?>
        </p>
        <?php endif; ?>



    </div>
    <?php if($product['discount_price'] > 0): ?>
      <form class="webshop__detail__general__discount-form" method="POST" action="index.php?page=detail&id=<?php echo $product['id']?>">
        <input type="hidden" name="id" value="<?php echo $product['id'];?>"/>
        <label for="discount" class="webshop__detail__general__discount__label">Kortingscode</label>
        <p class="webshop__detail__general__discount__explain">Je vindt hem op de eerste pagina van jouw Humo (ABCDEF123)</p>
        <div class="webshop__detail__general__discount__input-wrapper">
          <input id="discount" type="text" name="discount" class="webshop__detail__general__discount__input" value="<?php
              if(isset($_SESSION['discount']) && !empty($_SESSION['discount'])){
                foreach($_SESSION['discount'] as $discount) {
                  if($discount['product']['id'] === $product['id']) {
                    echo $discount['discount'];
                  }
                }
              }?>">
          <button class="webshop__primary-btn-small" type="submit" name="action" value="addDiscount">&#43;</button>
        </div>
      </form>
    <?php endif; ?>
    <div class="webshop__detail__general__btn-wrapper">
      <form class="webshop__detail__general__buy-form" method="POST" action="index.php?page=cart<?php if(isset($_GET['color'])) { echo '&color=' . $_GET['color']; }?>">
      <input type="hidden" name="id" value="<?php echo $product['id'];?>"/>
        <button class="webshop__primary-btn-big" type="submit" name="action" value="add">
          <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.9905 6.38903L18.1937 10.96C18.0954 11.465 17.6931 11.772 17.2292 11.7778H5.61292L5.38229 13.0778H16.4534C17.0363 13.1221 17.4318 13.5351 17.4389 14.0633C17.3965 14.645 16.9835 15.0415 16.4534 15.0488H4.20807C3.54581 14.9892 3.15091 14.4613 3.22257 13.8746L3.74677 11.0229L2.94999 3.01314L0.685455 2.30028C0.132064 2.08056 -0.0937983 1.57994 0.0354492 1.06317C0.250355 0.5246 0.765303 0.278534 1.27256 0.413165L4.16613 1.33576C4.55595 1.48188 4.78019 1.80097 4.8371 2.17448L5.00484 3.76804L18.1308 5.23579C18.7339 5.36643 19.0613 5.84414 18.9905 6.38903ZM7.20847 17.118C7.20847 17.9489 6.53492 18.6224 5.70402 18.6224C4.87313 18.6224 4.19958 17.9489 4.19958 17.118C4.19958 16.2871 4.87315 15.6135 5.70402 15.6135C6.53491 15.6135 7.20847 16.2871 7.20847 17.118ZM16.19 17.118C16.19 17.9489 15.5164 18.6224 14.6855 18.6224C13.8546 18.6224 13.1811 17.9489 13.1811 17.118C13.1811 16.2871 13.8546 15.6135 14.6855 15.6135C15.5164 15.6135 16.19 16.2871 16.19 17.118Z" fill="white"/>
          </svg>kopen
        </button>
      </form>

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
        <form class="webshop__detail__general__favorite-form" method="POST" action="index.php?page=detail&id=<?php echo $product['id']?>">
        <input type="hidden" name="product_id" value="<?php echo $product['id'];?>" />
          <button class="webshop__favorite-btn-big" type="submit" name="action" value="remove">
            <svg width="27" height="24" viewBox="0 0 27 24" fill="#DB3125" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.5211 12.2443C-0.183077 8.65904 0.718315 3.28118 5.22528 1.48856C9.73224 -0.304055 12.4364 3.28118 13.3378 5.0738C14.2392 3.28118 17.8448 -0.304055 22.3517 1.48856C26.8587 3.28118 26.8587 8.65904 24.1545 12.2443C21.4503 15.8295 13.3378 23 13.3378 23C13.3378 23 5.22528 15.8295 2.5211 12.2443Z" stroke="#DB3125" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </form>
       <?php } else { ?>
        <form class="webshop__detail__general__favorite-form" method="POST" action="index.php?page=detail&id=<?php echo $product['id']?>">
        <input type="hidden" name="product_id" value="<?php echo $product['id'];?>" />
          <button class="webshop__favorite-btn-big" type="submit" name="action" value="add">
            <svg width="27" height="24" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.5211 12.2443C-0.183077 8.65904 0.718315 3.28118 5.22528 1.48856C9.73224 -0.304055 12.4364 3.28118 13.3378 5.0738C14.2392 3.28118 17.8448 -0.304055 22.3517 1.48856C26.8587 3.28118 26.8587 8.65904 24.1545 12.2443C21.4503 15.8295 13.3378 23 13.3378 23C13.3378 23 5.22528 15.8295 2.5211 12.2443Z" stroke="#DB3125" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </form>
       <?php } ?>
    </div>
    <?php if($product['product_category'] !== 2): ?>
      <ul class="webshop__detail__general__list">
        <li class="webshop__detail__general__list__item"><strong class="webshop__strong">Gratis</strong> geleverd</li>
        <li class="webshop__detail__general__list__item">Thuis geleverd op <strong class="webshop__strong"><?php echo $date ?></strong></li>
        <li class="webshop__detail__general__list__item">30 dagen bedenktijd</li>
      </ul>
    <?php endif; ?>
  </article>
</section>





<?php if(!empty($product['longread'])): ?>
  <section class="webshop__detail__longread">
  <picture class="webshop__detail__longread__img">
    <source srcset="assets/img/<?php echo $product['image']?>/3.webp, assets/img/<?php echo $product['image']?>/3-2X.webp 2x"
      type="image/webp">
    <source srcset="assets/img/<?php echo $product['image']?>/3.jpg, assets/img/<?php echo $product['image']?>/3-2X.jpg 2x"
      type="image/jpg">
    <img class="webshop__detail__longread__img" alt="<?php echo $product['name']?>" src="assets/img/<?php echo $product['image']?>/3.jpg">
  </picture>
  <h2 class="webshop__detail__longread__title">ontdek het verhaal in een prachtige longread!</h2>
  <a href="<?php echo $product['longread']?>" class="webshop__primary-btn-small webshop__detail__longread__btn">ga naar de longread</a>
  </section>
<?php  endif; ?>





<section class="webshop__detail__info">
  <h2 class="hidden">Gedetailleerde info</h2>
  <article class="webshop__detail__info__description-wrapper">
    <h3 class="webshop__detail__info__title">Beschrijving</h3>
    <p class="webshop__detail__info__description"><?php echo $product['description']?></p>
  </article>
  <?php if(!empty($testimonials)): ?>
    <article class="webshop__detail__info__testimonials">
      <h3 class="webshop__detail__info__title">Testimonials</h3>
      <?php foreach($testimonials as $testimonial): ?>
        <blockquote class="webshop__detail__info__quote">"<?php echo $testimonial['quote']?>"</blockquote>
        <small class="webshop__detail__info__author">- <?php echo $testimonial['author']?></small>
      <?php endforeach;?>
    </article>
  <?php endif;?>
</section>





<section class="webshop__detail__specs">
  <h2 class="webshop__detail__info__title">Specificaties</h2>
  <table class="webshop__detail__specs__table">
  <?php if($product['product_category'] == 1 || $product['product_category'] == 2): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Titel:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['name']?></td>
    </tr>
  <?php endif ?>

  <?php if($product['product_category'] == 1 || $product['product_category'] == 2): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Auteur:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['author']?></td>
    </tr>
  <?php endif ?>

  <?php if(!empty($product['designer'])): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Designer:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['designer']?></td>
    </tr>
  <?php endif ?>

  <?php if(!empty($product['material'])): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Materiaal:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['material']?></td>
    </tr>
  <?php endif ?>

  <?php if($product['zoom'] > 0): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Vergroting:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['zoom']?>X</td>
    </tr>
  <?php endif ?>

  <?php if($product['diameter'] > 0): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Diameter:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['diameter']?>mm</td>
    </tr>
  <?php endif ?>

  <?php if(!empty($product['connection'])): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Connectie:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['connection']?></td>
    </tr>
  <?php endif ?>

  <?php if($product['battery'] > 0): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Batterijen incl.:</td>
      <td class="webshop__detail__specs__table__text">ja</td>
    </tr>
  <?php endif ?>

  <?php if(!empty($product['language'])): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Taal:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['language']?></td>
    </tr>
  <?php endif ?>

  <?php if(!empty($product['version'])): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Versie:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['version']?></td>
    </tr>
  <?php endif ?>

  <?php if($product['pages'] > 0): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Aantal pagina’s:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['pages']?> pagina's</td>
    </tr>
  <?php endif ?>

  <?php if(!empty($product['dimensions'])): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Afmetingen (hxbxd):</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['dimensions']?></td>
    </tr>
  <?php endif ?>

  <?php if($product['readtime'] > 0): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Gemiddelde leestijd:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['readtime']?> uur</td>
    </tr>
  <?php endif ?>

  <?php if($product['weight'] > 0): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Gewicht:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['weight']?> g</td>
    </tr>
  <?php endif ?>

  <?php if($product['ISBN'] > 0): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">ISBN-nummer:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['ISBN']?></td>
    </tr>
  <?php endif ?>

  <?php if(!empty($product['publisher'])): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Uitgeverij:</td>
      <td class="webshop__detail__specs__table__text"><?php echo $product['publisher']?></td>
    </tr>
  <?php endif ?>

  <?php if($product['date'] > date('1979-01-01')): ?>
    <tr>
      <td class="webshop__detail__specs__table__title">Verschijningsdatum:</td>
      <td class="webshop__detail__specs__table__text"><?php echo date('d/m/Y', strtotime($product['date']))?></td>
    </tr>
  <?php endif ?>
  </table>
</section>





<section id="reviews" class="webshop__detail__reviews">
<h2 class="hidden">Reviews</h2>
<div>
  <article class="webshop__detail__reviews__overview">
    <h3 class="webshop__detail__info__title">Reviews</h3>
    <?php if(!empty($reviews)){ ?>
      <?php foreach($reviews as $review): ?>
        <div class="webshop__detail__reviews__overview-wrapper">
          <p class="webshop__detail__reviews__overview__name"><?php echo $review['author']?></p>
          <div class="webshop__product__review__score">
            <?php for ($i=0; $i < round($review['score']); $i++) {
              echo '<svg width="17" height="16" viewBox="0 0 17 16" fill="#db3125" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
              </svg>';
            }?>
            <?php
              for ($i=0; $i < (5 - round($review['score'])); $i++) {
                echo '<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
                </svg>';
            }?>
          </div>
          <p class="webshop__detail__reviews__overview__comment"><?php echo $review['comment']?></p>
        </div>

      <?php endforeach; ?>
    <?php } else {
      echo '<p> Er zijn nog geen reviews... Schrijf jij er één?</p>';
    } ?>
  </article>
  </div>
  <article class="webshop__detail__reviews__input">
    <h3 class="webshop__detail__info__title">Wat vond jij ervan?</h3>
    <p class="thanks"></p>
    <form class="webshop__detail__reviews__input__form" method="POST" action="index.php?page=detail&id=<?php echo $product['id']?><?php if(isset($_GET['color'])){ echo '&color=' . $_GET['color'];};?>">
      <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
      <input type="hidden" name="action" value="insertComment">
      <div>
        <label for="name" class="webshop__detail__reviews__input__form__label">naam</label>
        <p class="form-error"></p>
        <input type="text" id="name" name="name" class="webshop__detail__reviews__input__form__input valid-input" required>
      </div>
      <div>
        <p class="webshop__detail__reviews__input__form__label">score</p>
        <div class="webshop__detail__reviews__input__form__stars">
          <p class="form-error"></p>
          <input class="webshop__detail__reviews__input__form__stars__star hidden valid-input" type="radio" name="review" id="five" value="5" required>
          <label class="full" for="five"></label>
          <input class="webshop__detail__reviews__input__form__stars__star hidden valid-input" type="radio" name="review" id="four" value="4" required>
          <label class="full" for="four"></label>
          <input class="webshop__detail__reviews__input__form__stars__star hidden valid-input" type="radio" name="review" id="three" value="3" required>
          <label class="full" for="three"></label>
          <input class="webshop__detail__reviews__input__form__stars__star hidden valid-input" type="radio" name="review" id="two" value="2" required>
          <label class="full" for="two"></label>
          <input class="webshop__detail__reviews__input__form__stars__star hidden valid-input" type="radio" name="review" id="one" value="1" required>
          <label class="full" for="one"></label>
        </div>
      </div>
      <div>
        <label class="webshop__detail__reviews__input__form__label" for="review">Review</label>
        <p class="form-error"></p>
        <textarea id="review" name="message" class="webshop__detail__reviews__input__form__input webshop__detail__reviews__input__form__input--textarea valid-input" required></textarea>
      </div>
      <button type="submit" class="webshop__primary-btn-small">verzenden</button>
    </form>
  </article>
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
