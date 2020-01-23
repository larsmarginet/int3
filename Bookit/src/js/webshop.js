import Review from './components/Review.js';
import Product from './components/Product.js';

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
    const $billingCheck = document.querySelector('.webshop__order__content__data__form__check');
    if($billingCheck){
      $billingCheck.addEventListener('click', handleBillingCheck);
  }
  };


  //Order
  const handleBillingCheck = e => {
    const click = e.currentTarget;
    const $billing = document.querySelector('.webshop__order__content__data__form__fieldset--billing');
    console.log(click);
    if(click.checked){
      $billing.style.display = 'none'
    } else {
      $billing.style.display = 'block'
    }
  }


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
    postReview($form.getAttribute('action'), formdataToJson($form));
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
    reviews.forEach(reviewObj => {
      const review = new Review(reviewObj);
      $parent.innerHTML += review.createHTMLForReviews();
    });
    updateAverage(reviews);
    checkOverFlow();
  }


  const updateAverage = reviews => {
    let totalScore = 0;
    reviews.forEach(review => {
      totalScore += review['score'];
    });
    const average = Math.round(totalScore/reviews.length);
    let score = ' ';
    for (let i = 0; i < average; i++) {
      score += `<svg width="17" height="16" viewBox="0 0 17 16" fill="#db3125" xmlns="http://www.w3.org/2000/svg">
               <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
               </svg>`;
     }
     for (let i = 0; i < (5 - average); i++) {
       score += `<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
               </svg>`;
     }
     document.querySelector('.webshop__product__review__score').innerHTML = score;
     document.querySelector('.webshop__product__review__amount').textContent = `${reviews.length} reviews`;
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
    const target = e.currentTarget;
    if(target.checked){
      target.nextElementSibling.style.color = '#DB3125';
    } else {
      target.nextElementSibling.style.color = 'black';
    }
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
    products.forEach(productObj => {
      const product = new Product(productObj);
      $webshopProducts.innerHTML += product.createHTMLForProducts();
    });

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
