const openIconHeader = document.querySelector('.button,.icon');
const navigationHeader = document.querySelector(".mobile-navigation");
const closeIconHeader = document.querySelector(".close");

openIconHeader.addEventListener('click', ()=> {
    navigationHeader.classList.toggle('active-navigation');
});

closeIconHeader.addEventListener('click', ()=> {
    navigationHeader.classList.remove('active-navigation');
});