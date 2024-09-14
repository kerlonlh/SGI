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


