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
    $('#notif-only').on('click', function () {
        ShowNotif();
        if ($('.notif-header').is(':visible')) {
            $('.notif-header').fadeOut('slow');
        } else {
            $('.notif-header').fadeIn('slow');
        }
    });
    function CheckNotif() {
        $.ajax({
            url: "./php/check_header_notif.php",
            method: "GET",
            success: function (data) {
                if (data === 'Yes') {
                    $('.notification_dot').fadeIn('slow');
                } else {
                    $('.notification_dot').fadeOut('slow');
                }
            }
        });
    }
    CheckNotif();
    setInterval(CheckNotif, 5000);

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

function maximize_floating_chat() {
    
    if ($('.floating_chat_body').css('visibility') === 'hidden' && chat_condition === false) {

        $('.floating_chat_head').css({
            'background-image': 'none',
            'border-radius': '0',
            'min-height': '70vh',
            'max-width': '300px',
            'width': 'calc(100vw - 30px)'
        });

        $('.floating_chat_body').css({
            'visibility': 'visible'
        });

        chat_condition = true;

        var intervalId = setInterval(ShowSupportMessages, 1000);

    } else if ($('.floating_chat_body').css('visibility') === 'visible' && chat_condition === false) {
        
        $('.floating_chat_body').css({
            'visibility': 'hidden'
        });
        
        $('.floating_chat_head').css({
            'background-image': 'url("./images/chat_saint.png")',
            'border-radius': '90px',
            'min-height': '50px',
            'width': '50px'
        });

        clearInterval(intervalId);

    }
    
}

function redirect(data) {
    $.ajax({
        url: "./php/read_header_notif.php",
        method: "POST",
        success: function (data) {
            if (data === 'null') {
                $('#notif-only').click();
                maximize_floating_chat();
            } else {
                window.location.href = "order.php?&notification=" + data;
            }
        }
    });
}