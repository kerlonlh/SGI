const navbar = document.querySelector('.navbar');
const burguerNavbar = document.querySelector('.navbar__burguer');
const navbarItems = document.querySelectorAll('.navbar__burguer a');
const button = document.querySelector('.burguer');

button.addEventListener('click', function () {
    burguerNavbar.classList.toggle('active')
   
})

navbarItems.forEach( function (button){
    button.addEventListener('click', function () {
        burguerNavbar.classList.remove('active')
    })
})

window.addEventListener('scroll', function () {
    if (this.window.pageYOffset > 0) return navbar.classList.add('active');
    return navbar.classList.remove('active')
})


