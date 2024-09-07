const navbar = document.querySelector('.navbar');
const burguerNavbar = document.querySelector('.navbar__burguer');
const navbarItems = document.querySelectorAll('.navbar__burguer a');
const button = document.querySelector('.burguer');
const main = document.querySelector('.main');

button.addEventListener('click', function () {
    burguerNavbar.classList.toggle('active')
    main.classList.toggle('active')
   
})

navbarItems.forEach( function (button){
    button.addEventListener('click', function () {
        burguerNavbar.classList.remove('active')
        main.classList.remove('active')
    })
})

window.addEventListener('scroll', function () {
    if (this.window.pageYOffset > 0) return navbar.classList.add('active');
    return navbar.classList.remove('active')
})


