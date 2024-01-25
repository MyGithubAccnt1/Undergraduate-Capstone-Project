$(document).ready(function() {
    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();
        var threshold = 1;
        if (scrollPos > threshold) {
            $(".sticky-top").css("background-color", "rgba(0, 0, 0, 0.75)");
            $(".dropdown-menu").css("background-color", "rgba(0, 0, 0, 0.75)");
        } else {
            $(".sticky-top").css("background-color", "rgba(0, 0, 0, 1.0)");
            $(".dropdown-menu").css("background-color", "rgba(0, 0, 0, 1.0)");
        }
    });

    $('.dropdown').on('mouseenter', function(){
        var dropdown = new bootstrap.Dropdown($(this).find('.dropdown-toggle')[0]);
        dropdown.toggle();
    });

    function ShowCart() {
        $.ajax({
            url: "./php/get_header_cart.php",
            method: "GET",
            success: function (data) {
                data = data.trim();
                $("#cart-header-container").html(data);
            }
        });

        $.ajax({
            url: "./php/get_cart_count.php",
            method: "GET",
            success: function (data) {
                data = data.trim();
                $('.font-monospace').text(data);
            }
        });
    }
    setInterval(ShowCart, 1000);

    $('#cart-only').on({
        mouseover: function() {
            $('.cart-header').fadeIn('slow');
        },
        mouseout: function() {
            $('.cart-header').fadeOut('slow');
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