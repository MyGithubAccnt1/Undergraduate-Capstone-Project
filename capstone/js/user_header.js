$(document).ready(function() {
    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();
        var threshold = 1;
        if (scrollPos > threshold) {
            $(".sticky-top").css("background-color", "rgba(0, 0, 0, 0.75)");
            $(".dropdown-menu").css("background-color", "rgba(0, 0, 0, 0.75)");
        } else {
            var origin = window.location.origin;
            if (origin === "http://localhost") {
                var current_url = window.location.href;
                if (current_url === origin + '/capstone/index.php' | current_url === origin + '/capstone/signin.php') {
                    $(".sticky-top").css("background-color", "transparent");
                    $(".dropdown-menu").css("background-color", "transparent");
                }
            } else {
                var current_url = window.location.href;
                if (current_url === origin + '/index.php' | current_url === origin + '/signin.php') {
                    $(".sticky-top").css("background-color", "transparent");
                    $(".dropdown-menu").css("background-color", "transparent");
                }
            }
            
        }
    });
});

const openIconHeader = document.querySelector('.button,.icon');
const navigationHeader = document.querySelector(".mobile-navigation");
const closeIconHeader = document.querySelector(".close");

openIconHeader.addEventListener('click', ()=> {
    navigationHeader.classList.toggle('active-navigation');
});

closeIconHeader.addEventListener('click', ()=> {
    navigationHeader.classList.remove('active-navigation');
});