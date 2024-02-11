//MENU DROPDOWN

var toggle = document.querySelector('.toggle');
var bar = document.querySelector('.bar');
var list = document.querySelector('.nav-menu');

toggle.addEventListener('click', () => {
    bar.classList.toggle('show');
    list.classList.toggle('show');
});