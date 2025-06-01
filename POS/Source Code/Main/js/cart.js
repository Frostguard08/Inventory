import products from "./products.js";

const cart = () => {
  let listCartHTML = document.querySelector('.product-section');
  let cart = [];


const setProductInCart = (idProduct, quantity, position) => {
  if(quantity > 0){
    if(position < 0){
      cart.push({
        product_id: idProduct,
        quantity: quantity
      });
    }
    else{
      cart[position].quantity = quantity;
    }
  }
  else{
    cart.splice(position, 1);
  }
  
  refreshCartHTMl();
}

const refreshCartHTMl = () => {
  let listHTML = document.querySelector('.product-section');
  let totalQuantity = 0;
  listHTML.innerHTML = '';
  cart.forEach(item => {
    totalQuantity = totalQuantity + item.quantity;
    let position = products.findIndex((value) => value.id == item.product_id);
    let info = products[position];
    let newItem = document.createElement('div');
    newItem.classList.add('item');
    newItem.innerHTML =
    `
      <div class="cart-img">
        <img src="${info.image}">
      </div>
      <div class="cart-name">${info.name}</div>
      <div class="cart-price"><span>&#8369;</span>
      ${info.price * item.quantity}
      </div>
      <div class="cart-quant">
        <span class="minus" data-id="${info.id}">-</span>
        <span>${item.quantity}</span>
        <span class="plus" data-id="${info.id}">+</span>
      </div>
    `;
    listHTML.appendChild(newItem);
  })
}

  document.addEventListener('click', (event) => {
    let buttonClick = event.target;
    let idProduct = buttonClick.dataset.id;
    let position = cart.findIndex((value) => value.product_id);
    let quantity = position < 0 ? 0 : cart[position].quantity;

    if(buttonClick.classList.contains('addCart')){
      quantity++;
      setProductInCart(idProduct, quantity, position);
    }
    else if(buttonClick.classList.contains('plus')){
      quantity++;
      setProductInCart(idProduct, quantity, position);
    }
    else if(buttonClick.classList.contains('minus')){
      quantity--;
      setProductInCart(idProduct, quantity, position);
    }
  })
  const initApp = () => {
    if(localStorage.getItem('cart')){
      cart = JSON.parse(localStorage.getItem('cart'));
    }
    refreshCartHTMl();
  }
  initApp();

}
export default cart;