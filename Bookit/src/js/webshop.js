{
  const init = () => {
    checkOverFlow();
    document.querySelectorAll('.hide-js').forEach(hide => hide.style.display = 'none');
    document.querySelectorAll('.show-js').forEach(hide => hide.style.display = 'block');
    document.querySelectorAll('.webshop__filter__form__input').forEach($input => $input.addEventListener('change', handleInputField));
    document.querySelectorAll('.webshop__detail__general__img__small__item__link').forEach($link => $link.addEventListener('click', handleClickLink));
    const $modalBtn = document.querySelector('.webshop__detail__general__btn');
    if ($modalBtn) {
      $modalBtn.addEventListener('click', handleClickModal);
    }
    document.querySelectorAll('.webshop__cart__orders__form__table__order__quantity__input').forEach($quantity => $quantity.addEventListener('input', handleInputQuantity));
    const $gift = document.querySelector('.webshop__cart__orders__form__gift__input');
    if ($gift) {
      $gift.addEventListener('change', handleClickCheckbox);
    }
    const $reviewForm = document.querySelector('.webshop__detail__reviews__input__form');
    if($reviewForm){
        $reviewForm.addEventListener('submit', handleReviewSubmit);
    }
  };

  //Review
  const checkOverFlow = () => {
    const $reviewWrapper = document.querySelector('.webshop__detail__reviews__overview');
    if($reviewWrapper) {
     if($reviewWrapper.scrollHeight > 400) {
      $reviewWrapper.style.height = "40rem";
      $reviewWrapper.style.overflow = "hidden";
      addMoreButton($reviewWrapper)
     }
    }
  }

  const addMoreButton = (wrapper) => {
    let button = document.createElement('button');
    const $button = document.querySelector('.review__button');
    if($button) {
      $button.remove();
    }
    if(wrapper){
      wrapper.after(button);
      button.textContent = `Meer reviews`;
      button.classList.add('webshop__secondary-btn-big');
      button.classList.add('review__button');
      button.style.margin = "0 auto";
      button.addEventListener('click', handleClickButton);
    }
  }

  const handleClickButton = e => {
    const button = e.currentTarget;
    const $reviewWrapper = document.querySelector('.webshop__detail__reviews__overview');
    $reviewWrapper.style.height = "auto";
    button.textContent = `Minder reviews`;
    button.addEventListener('click', handleClickLessButton);
  }

  const handleClickLessButton = e => {
    const button = e.currentTarget;

    const $reviewWrapper = document.querySelector('.webshop__detail__reviews__overview');
    $reviewWrapper.style.height = "40rem";
    $reviewWrapper.style.overflow = "hidden";
    button.textContent = `Meer reviews`;
    addMoreButton($reviewWrapper);
  }

  const handleReviewSubmit = e => {
    const $form = e.currentTarget;
    e.preventDefault();
    postReview($form.getAttribute('action'), formdataToJson($form)); // object opmaken
  };


  const formdataToJson = $from => {
    const data = new FormData($from);
    const obj = {}
    data.forEach((value, key) => {
      obj[key] = value;
    });
    return obj;
  }


  const postReview = async (url, data) => {
    const response = await fetch(url, {
      method: "POST",
      headers: new Headers({
        'Content-Type': 'application/json'
      }),
      body: JSON.stringify(data)
    });
    const returned = await response.json();
    if(returned.error){
    }else{
      showReviews(returned);
    }
    const $notification = document.querySelector(`.thanks`);
    $notification.textContent = `Bedankt voor je review`;
  };

  const showReviews = reviews => {
    document.querySelectorAll('.webshop__detail__reviews__input__form__input').forEach(input => {input.value=''});
    const $parent = document.querySelector('.webshop__detail__reviews__overview');
    $parent.innerHTML = '<h3 class="webshop__detail__info__title">Reviews</h3>'
    reviews.forEach(review => {
    let score = ' ';
    if (review['score']){
      for (let i = 0; i < Math.round(review['score']); i++) {
        score += `<svg width="17" height="16" viewBox="0 0 17 16" fill="#db3125" xmlns="http://www.w3.org/2000/svg">
                 <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
                 </svg>`;
       }
       for (let i = 0; i < (5 - Math.round(review['score'])); i++) {
         score += `<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
                 </svg>`;
       }
    } else {
      for (let i = 0; i < 5; i++) {
        score += `<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
                </svg>`;
      }
    };
    $parent.innerHTML += `
      <div class="webshop__detail__reviews__overview-wrapper">
          <p class="webshop__detail__reviews__overview__name">${review['author']}</p>
          <div class="webshop__product__review__score">
            ${score}
          </div>
          <p class="webshop__detail__reviews__overview__comment">${review['comment']}</p>
        </div>
      `;
    })
    checkOverFlow();
  }



  //Cart
  const handleInputQuantity = e => {
    const $input = e.currentTarget;
    const $value = $input.value;
    const $subtotal = $input.parentElement.parentElement.querySelector('.webshop__cart__orders__form__table__order__price');
    const $amount = $input.parentElement.parentElement.querySelector('.webshop__cart__orders__form__table__order__title__amount');
    const $totalPrice = document.querySelector('.webshop__cart__orders__form__price__total-price');
    const $original = document.querySelector('.webshop__cart__orders__form__price__original');
    const $save = document.querySelector('.webshop__cart__orders__form__price__savings');
    const $discountprice = $subtotal.dataset.discountprice;
    const subtotal = $discountprice * $value;
    $subtotal.textContent = `€${numberToMoney(subtotal)}`;
    let originalPrice = 0;
    let totalPrice = 0;
    document.querySelectorAll('.webshop__cart__orders__form__table__order__price').forEach(price => {
      const $quantity = price.parentElement.querySelector('.webshop__cart__orders__form__table__order__quantity__input').value;
      originalPrice += parseFloat(price.dataset.price) * $quantity;
      totalPrice += moneyToNumber(price);
    });
    if(document.querySelector('.webshop__cart__orders__form__gift__input').checked){
      totalPrice += 2;
      originalPrice += 2;
    }
    $amount.textContent = `${$value}X`;
    $totalPrice.textContent = `€${numberToMoney(totalPrice)}`;
    $original.textContent = `€${numberToMoney(originalPrice)}`;
    $save.textContent = `Je bespaart €${numberToMoney(originalPrice - totalPrice)}`;
  }

  const handleClickCheckbox = e => {
    const $totalPrice = document.querySelector('.webshop__cart__orders__form__price__total-price');
    const $original = document.querySelector('.webshop__cart__orders__form__price__original');
    if(e.target.checked){
      const totalPrice = moneyToNumber($totalPrice) + 2;
      const original = moneyToNumber($original) + 2;
      $totalPrice.textContent = `€${numberToMoney(totalPrice)}`;
      $original.textContent = `€${numberToMoney(original)}`;
    } else {
      const totalPrice = moneyToNumber($totalPrice) - 2;
      const original = moneyToNumber($original) - 2;
      $totalPrice.textContent = `€${numberToMoney(totalPrice)}`;
      $original.textContent = `€${numberToMoney(original)}`;
    }
  }

  const moneyToNumber = value => {
    return parseFloat(value.textContent.substring(1).replace(',', '.'));
  }

  const numberToMoney = value => {
    return value.toFixed(2).toString().replace('.', ',')
  }


  // Filter
  const handleInputField = e => {
    e.preventDefault();
    submitWithJS(document.getElementById('filterForm'));
  };

  const submitWithJS = async (form) => {
    const $form = form;
    const data = new FormData($form);
    const entries = [...data.entries()];
    const qs = new URLSearchParams(entries).toString();
    const url = `${$form.getAttribute('action')}&${qs}`;
    const response = await fetch(url, {
        headers: new Headers({
          Accept: 'application/json'
        })
      });
    const products = await response.json();
    updateProducts(products);
    window.history.pushState(
      {},
      '',
      `${window.location.href.split('?')[0]}?${qs}`
    );
  }

  const updateProducts = products => {
    const $webshopProducts = document.querySelector('.webshop__products');
    $webshopProducts.innerHTML = '<h2 class="hidden">Producten</h2>';
    products.forEach(product => {

      let score = ' ';
      if (product['averagescore']){
        for (let i = 0; i < Math.round(product['averagescore']); i++) {
          score += `<svg width="17" height="16" viewBox="0 0 17 16" fill="#db3125" xmlns="http://www.w3.org/2000/svg">
                   <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
                   </svg>`;
         }
         for (let i = 0; i < (5 - Math.round(product['averagescore'])); i++) {
           score += `<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
                   </svg>`;
         }
      } else {
        for (let i = 0; i < 5; i++) {
          score += `<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
                  </svg>`;
        }
      };

      let author = '';
      if (product['author']) {
        author = `<p class="webshop__product__subtitle">${product['author']}</p>`
      }

      let discountPrice = '';
      if (product['discount_price'] > 0){
        discountPrice = `
          <div class="webshop__product__price-wrapper">
            <p class="webshop__product__price">€${product['discount_price']}</p>
            <p class="webshop__product__discountprice">${product['price']}</p>
            <p class="webshop__product__discountprice-text">kortingscode uit je Humo</p>
          </div>`;
      } else {
        discountPrice = `<p class="webshop__product__price">€${product['price']}</p>`;
      }


      $webshopProducts.innerHTML += `
        <article class="webshop__product">
        <div class="webshop__product__img-wrapper">
          <picture class="webshop__product__img">
            <source srcset="../../assets/img/${product['image']}/0.webp, ../../assets/img/${product['image']}/0-2X.webp 2x"
              sizes="220w" type="image/webp">
            <source srcset="../../assets/img/${product['image']}/0.jpg, ../../assets/img/${product['image']}/0-2X.jpg 2x"
              sizes="220w" type="image/jpg">
            <img class="webshop__product__img" alt="${product['name']}" src="../../assets/img/${product['image']}/0.jpg">
          </picture>
          <div class="webshop__product__favorite">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.9735 8.15545C0.242831 5.87394 0.819722 2.45166 3.70418 1.3109C6.58863 0.170147 8.3193 2.45166 8.8962 3.59242C9.47309 2.45166 11.7807 0.170147 14.6651 1.3109C17.5496 2.45166 17.5496 5.87394 15.8189 8.15545C14.0882 10.437 8.8962 15 8.8962 15C8.8962 15 3.70418 10.437 1.9735 8.15545Z" stroke="#DB3125" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
        </div>
        <div class="webshop__product__review-wrapper">
          <div class="webshop__product__review__score">
            ${score}
          </div>
          <p class="webshop__product__review__amount">${product['countscore']} reviews</p>
        </div>
        <div class="webshop__product__info-wrapper">
          <h3 class="webshop__product__title">${product['name']}</h3>
            ${author}
          </div>
          <div class="webshop__product__end-wrapper">
           ${discountPrice}
            <div class="webshop__product__btn-wrapper">
              <form method="POST" action="index.php?page=home">
                <input type="hidden" name="product_id" value="${product['id']}"/>
                <button class="webshop__primary-btn-small" type="submit" name="action" value="add">
                  <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.9905 6.38903L18.1937 10.96C18.0954 11.465 17.6931 11.772 17.2292 11.7778H5.61292L5.38229 13.0778H16.4534C17.0363 13.1221 17.4318 13.5351 17.4389 14.0633C17.3965 14.645 16.9835 15.0415 16.4534 15.0488H4.20807C3.54581 14.9892 3.15091 14.4613 3.22257 13.8746L3.74677 11.0229L2.94999 3.01314L0.685455 2.30028C0.132064 2.08056 -0.0937983 1.57994 0.0354492 1.06317C0.250355 0.5246 0.765303 0.278534 1.27256 0.413165L4.16613 1.33576C4.55595 1.48188 4.78019 1.80097 4.8371 2.17448L5.00484 3.76804L18.1308 5.23579C18.7339 5.36643 19.0613 5.84414 18.9905 6.38903ZM7.20847 17.118C7.20847 17.9489 6.53492 18.6224 5.70402 18.6224C4.87313 18.6224 4.19958 17.9489 4.19958 17.118C4.19958 16.2871 4.87315 15.6135 5.70402 15.6135C6.53491 15.6135 7.20847 16.2871 7.20847 17.118ZM16.19 17.118C16.19 17.9489 15.5164 18.6224 14.6855 18.6224C13.8546 18.6224 13.1811 17.9489 13.1811 17.118C13.1811 16.2871 13.8546 15.6135 14.6855 15.6135C15.5164 15.6135 16.19 16.2871 16.19 17.118Z" fill="white"/>
                  </svg>kopen
                </button>
              </form>
              <a class="webshop__secondary-btn-small" href="index.php?page=detail&id=${product['id']}">meer info</a>
            </div>
          </div>
      </article>`;
    })
  };




  //Images
  const handleClickLink = e => {
    e.preventDefault();
    const $link = e.currentTarget;
    highlightSelectedPicture($link.parentElement);
    const $picture = $link.firstElementChild.innerHTML;

    document.querySelector(`.webshop__detail_general__img__large-wrapper`).innerHTML = `${$picture}`;
    const path = window.location.href.split('?')[0];
    const qs = $link.getAttribute(`href`).split('?')[1];
     window.history.pushState({},'',`${path}?${qs}`);
  };

  const highlightSelectedPicture = item => {
    const $items = document.querySelectorAll('.webshop__detail__general__img__small__item');
    $items.forEach($item => {
      $item.removeAttribute('class');
      $item.classList.add('webshop__detail__general__img__small__item');
    });
    item.classList.add('webshop__detail__general__img__small__item--highlight');
  }



  //Modal
  const handleClickModal = e => {
    e.preventDefault();
    const $modal = document.querySelector('.webshop__detail__general__modal');
    $modal.style.display = 'block';

    const $close = document.querySelector('.webshop__detail__general__modal-conten__close');
    $close.addEventListener('click', handleClickCrossClose);
    window.addEventListener('click', handleClickModalClose);
  }

  const handleClickCrossClose = e => {
    const $modal = document.querySelector('.webshop__detail__general__modal');
    $modal.style.display = 'none';
  }

  const handleClickModalClose = e => {
    if (e.target.getAttribute('class') === 'webshop__detail__general__modal') {
      const $modal = document.querySelector('.webshop__detail__general__modal');
      $modal.style.display = 'none';
    }
  }


  init();
}
