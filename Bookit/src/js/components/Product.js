class Product {
  constructor(product) {
    this.name = product['name'];
    this.id = product['id'];
    this.averagescore = Math.round(product['averagescore']);
    this.countscore = product['countscore'];
    this.author = product['author'];
    this.discount_price = product['discount_price'];
    this.price = product['price'];
    this.image = product['image'];
    this.stars = ` `;
    this.html = ``;
  }

  createHTMLForProducts() {
    if (this.averagescore){
      for (let i = 0; i < this.averagescore; i++) {
        this.stars += `<svg width="17" height="16" viewBox="0 0 17 16" fill="#db3125" xmlns="http://www.w3.org/2000/svg">
                 <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
                 </svg>`;
       }
       for (let i = 0; i < (5 -  this.averagescore); i++) {
        this.stars += `<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
                 </svg>`;
       }
    } else {
      for (let i = 0; i < 5; i++) {
        this.stars += `<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.58853 9.01337L1.95486 6.37336L6.44632 6.37336C6.74958 6.37336 7.01835 6.17808 7.11206 5.88967L8.5 1.61804L9.88794 5.88967C9.98165 6.17809 10.2504 6.37336 10.5537 6.37336L15.0451 6.37336L11.4115 9.01337L11.7054 9.41788L11.4115 9.01337C11.1661 9.19162 11.0635 9.50758 11.1572 9.79599L12.5451 14.0676L8.91145 11.4276C8.66611 11.2494 8.33389 11.2494 8.08855 11.4276L4.45488 14.0676L5.84282 9.79599C5.93653 9.50758 5.83387 9.19162 5.58853 9.01337L5.29464 9.41788L5.58853 9.01337Z" stroke="#DB3125"/>
                </svg>`;
      }
    };

    this.html += `<article class="webshop__product">
      <div class="webshop__product__img-wrapper">
        <picture class="webshop__product__img">
          <source srcset="assets/img/${this.image}/0.webp, assets/img/${this.image}/0-2X.webp 2x"
            sizes="220w" type="image/webp">
          <source srcset="assets/img/${this.image}/0.jpg, assets/img/${this.image}/0-2X.jpg 2x"
            sizes="220w" type="image/jpg">
          <img class="webshop__product__img" alt="${this.name}" src="assets/img/${this.image}/0.jpg">
        </picture>
        <form class="webshop__product__favorite" method="POST" action="index.php?page=home&id=${this.id}">
          <input type="hidden" name="product_id" value="${this.id}" />
          <button type="submit" name="action" value="add">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.9735 8.15545C0.242831 5.87394 0.819722 2.45166 3.70418 1.3109C6.58863 0.170147 8.3193 2.45166 8.8962 3.59242C9.47309 2.45166 11.7807 0.170147 14.6651 1.3109C17.5496 2.45166 17.5496 5.87394 15.8189 8.15545C14.0882 10.437 8.8962 15 8.8962 15C8.8962 15 3.70418 10.437 1.9735 8.15545Z" stroke="#DB3125" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </form>
      </div>
      <div class="webshop__product__review-wrapper">
        <div class="webshop__product__review__score">
          ${this.stars}
        </div>
        <p class="webshop__product__review__amount">${this.countscore} reviews</p>
      </div>
      <div class="webshop__product__info-wrapper">
        <h3 class="webshop__product__title">${this.name}</h3>`;

    if(this.author) {
      this.html += `<p class="webshop__product__subtitle">${this.author}</p>`;
    }

    this.html += `</div>
    <div class="webshop__product__end-wrapper">`;

    if (this.discount_price > 0){
      this.html += `
        <div class="webshop__product__price-wrapper">
          <p class="webshop__product__price">€${this.discount_price}</p>
          <p class="webshop__product__discountprice">${this.price}</p>
          <p class="webshop__product__discountprice-text">kortingscode uit je Humo</p>
        </div>`;
    } else {
      this.html += `<p class="webshop__product__price">€${this.price}</p>`;
    }

    this.html += ` <div class="webshop__product__btn-wrapper">
        <form method="POST" action="index.php?page=cart">
          <input type="hidden" name="id" value="${this.id}"/>
          <button class="webshop__primary-btn-small" type="submit" name="action" value="add">
            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.9905 6.38903L18.1937 10.96C18.0954 11.465 17.6931 11.772 17.2292 11.7778H5.61292L5.38229 13.0778H16.4534C17.0363 13.1221 17.4318 13.5351 17.4389 14.0633C17.3965 14.645 16.9835 15.0415 16.4534 15.0488H4.20807C3.54581 14.9892 3.15091 14.4613 3.22257 13.8746L3.74677 11.0229L2.94999 3.01314L0.685455 2.30028C0.132064 2.08056 -0.0937983 1.57994 0.0354492 1.06317C0.250355 0.5246 0.765303 0.278534 1.27256 0.413165L4.16613 1.33576C4.55595 1.48188 4.78019 1.80097 4.8371 2.17448L5.00484 3.76804L18.1308 5.23579C18.7339 5.36643 19.0613 5.84414 18.9905 6.38903ZM7.20847 17.118C7.20847 17.9489 6.53492 18.6224 5.70402 18.6224C4.87313 18.6224 4.19958 17.9489 4.19958 17.118C4.19958 16.2871 4.87315 15.6135 5.70402 15.6135C6.53491 15.6135 7.20847 16.2871 7.20847 17.118ZM16.19 17.118C16.19 17.9489 15.5164 18.6224 14.6855 18.6224C13.8546 18.6224 13.1811 17.9489 13.1811 17.118C13.1811 16.2871 13.8546 15.6135 14.6855 15.6135C15.5164 15.6135 16.19 16.2871 16.19 17.118Z" fill="white"/>
            </svg>kopen
          </button>
        </form>
        <a class="webshop__secondary-btn-small" href="index.php?page=detail&id=${this.id}">meer info</a>
      </div>
    </div>
    </article>`

    return this.html;
  }
}
export default Product;
