let signupBtn = document.querySelector('#signup-btn')
let signupForm = document.querySelector('#signup-form')

if (signupBtn !== null && signupForm !== null) {
    signupBtn.addEventListener('click', () => submitForm(signupForm))
}

let loginBtn = document.querySelector('#login-btn')
let loginForm = document.querySelector('#login-form')

if (loginBtn !== null && loginForm !== null) {
    loginBtn.addEventListener('click', () => submitForm(loginForm))
}

let filterButtons = document.querySelectorAll('.listing-item[data-category]')
let products = document.querySelectorAll('.product[data-category]')

if (filterButtons !== null && products !== null) {
    filterButtons.forEach(function (item, index) {
        item.addEventListener('click', function(e) {
            e.preventDefault()
            filterButtons.forEach(btn => btn.classList.remove('active'))
            item.classList.add('active')
            products.forEach(product => {
                if (item.dataset.category == 'All') {
                    product.style.display = 'block'
                } else {
                    product.dataset.category == item.dataset.category ? 
                    product.style.display = 'block' :
                    product.style.display = 'none'
                }
            })
        })
      });
}

let searchButton = document.querySelector('.product-search')
let searchedWord = '';

if (searchButton != null) {
    searchButton.addEventListener('keydown', event => {

        if (event.keyCode == 8) {
            searchedWord.slice(0, -1)
        }
    
        if ((event.keyCode >= 65 && event.keyCode <= 90) ||
        (event.keyCode >= 97 && event.keyCode <= 122)) {
            searchedWord += event.key
    
            products.forEach(product => {
                product.querySelector('.product-title').innerHTML.includes(searchedWord) ?
                product.style.display = 'block' :
                product.style.display = 'none'
            })
        }
    })
}

function submitForm(form) {
    form.submit()
}