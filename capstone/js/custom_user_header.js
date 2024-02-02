$(document).ready(function() {
    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();
        var threshold = 1;
        if (scrollPos > threshold) {
            $(".sticky-top").css("background-color", "rgba(0, 0, 0, 0.75)");
            $(".dropdown-menu").css("background-color", "rgba(0, 0, 0, 0.75)");
        } else {
            $(".sticky-top").css("background-color", "transparent");
            $(".dropdown-menu").css("background-color", "transparent");
        }
    });

    $('.dropdown').on('mouseenter', function(){
        var otherDropdowns = $('.dropdown-toggle').not($(this).find('.dropdown-toggle'));
        otherDropdowns.each(function() {
            var otherDropdown = new bootstrap.Dropdown($(this));
            if (otherDropdown._element.classList.contains('show')) {
                otherDropdown.hide();
            }
        });
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
                $('#cart-number').text(data);
            }
        });
    }
    ShowCart();
    $('#cart-only').on('mouseover', function () {
        ShowCart();
        $('.cart-header').stop(true, true).fadeIn('slow');
    });
    $('#cart-only').on('mouseout', function () {
        $('.cart-header').stop(true, true).delay(500).fadeOut('slow');
    });
    function ShowNotif() {
        $.ajax({
            url: "./php/get_header_notif.php",
            method: "GET",
            success: function (data) {
                data = data.trim();
                $("#notif-header-container").html(data);
            }
        });
    }
    ShowNotif();
    $('#notif-only').on('mouseover', function () {
        ShowCart();
        $('.notif-header').stop(true, true).fadeIn('slow');
    });
    $('#notif-only').on('click', function () {
        ShowCart();
        $('.notif-header').toggle('slow');
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