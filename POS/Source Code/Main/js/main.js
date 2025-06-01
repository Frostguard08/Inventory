import cart from "./cart.js";
import products from "./products.js";
let app = document.getElementById('app');
let temporaryContent = document.querySelector('.prodAndCart');

const loadTemplate = () => {
    fetch('template.php')
    .then(response => response.text())
    .then(html => {
        app.innerHTML = html;
        let contentTab = document.querySelector('.bevList');
        contentTab.innerHTML = temporaryContent.innerHTML;
        temporaryContent.innerHTML = null;
        cart();
        initApp();
    })
}

loadTemplate();
const initApp = () => {
    let listProduct = document.querySelector('.bevList');
    listProduct.innerHTML = null;
    products.forEach(product => {
        let newProduct = document.createElement('div');
        newProduct.classList.add('bevProdCard');
        newProduct.innerHTML =
        `
            <img src="${product.image}">
                <span>${product.name}</span>
                <span><span>&#8369</span>${product.price}</span>
                <div class="cardBtn">
                    <a href="customize.html"><button>Customize...</button></a>
                    <button class="addCart" data-id="${product.id}">Add to Cart</button>
                </div>
        `;
        listProduct.appendChild(newProduct);
    })
}