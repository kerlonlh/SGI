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

        
function setCurrentDate() {
    var today = new Date();
    var year = today.getFullYear();
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    var day = ('0' + today.getDate()).slice(-2);
    var formattedDate = year + '-' + month + '-' + day;

    document.getElementById('data_saida').value = formattedDate;
}
window.onload = setCurrentDate;