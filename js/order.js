function ShowOrder() {
    $.ajax({
        url: "./php/get_order.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#order-container").html(data);
            var currentURL = window.location.href;
            if (currentURL !== "http://20.205.112.210/order.php" && currentURL !== "http://localhost/capstone/order.php") {
                var notification = new URLSearchParams(currentURL).get('notification');
                notification = decodeURIComponent(notification.replace(/\+/g, ' '));
                var element = document.getElementById(notification);
                element.click();
            }
        }
    });
}
$(document).ready(function() {
    ShowOrder();
});

function ShowYouMayLike() {
    $.ajax({
        url: "./php/get_you_may_like.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#you_may_like-container").html(data);
        }
    });
}
setInterval(ShowYouMayLike, 1000);

$(document).on('submit', '#viewProduct', function(event) {
    event.preventDefault();
    var title = $(this).find("input[name='title']").val();
    var thumbnail = $(this).find("input[name='thumbnail']").val();
    var price = $(this).find("input[name='price']").val();
    var description = $(this).find("input[name='description']").val();
    var category = $(this).find("input[name='category']").val();

    $.ajax({
        url: "./php/update_popularity.php",
        method: "POST",
        data: {
            title: title,
            thumbnail: thumbnail,
            price: price,
            description: description,
            category: category
        },
        success: function (data) {
            data = data.trim();
            if (data === '1'){
                window.localStorage.setItem('title', title);
                window.localStorage.setItem('thumbnail', thumbnail);
                window.localStorage.setItem('price', price);
                window.localStorage.setItem('description', description);
                window.localStorage.setItem('category', category);
                window.location.href = "preview.php";
            } else {
                alert('Unexpected Error: [' + data + '].');
            }
        }
    });
});

$(document).on("submit", "#cancel", function (event) {
    event.preventDefault(event);
    if (confirm("Are you sure you want to cancel this order? Your previous payments are not refundable.") === true) {
        var date = $(this).find("input[name='date']").val();
        $.ajax({
            url: './php/cancel_order.php',
            type: 'POST',
            data: {
                date: date
            },
            success: function (data) {
                data = data.trim();
                if (data === "1") {
                    window.location.href = "order.php";
                } else {
                    alert('Unexpected Error: [' + data + ']');
                }
            }
        });
    }
});

function horizontal_guide(element) {
    var $guide = $('#guide');
    var offset = element.offset();
    var rightPosition = offset.left + element.outerWidth();
    var topPosition = offset.top + element.outerHeight();
    $guide.css({
        top: topPosition + 'px',
        left: rightPosition + 'px'
    });
    $guide.stop(true, true).fadeIn('slow', function() {
        if ((rightPosition + $guide.width()) > $(window).width()) {
            $guide.css({
                width: ($(window).width() * 0.75) + 'px',
                height: 'auto',
            });
            if ((rightPosition + $guide.width()) > $(window).width()) {
                $guide.css({
                    width: ($(window).width() * 0.5) + 'px'
                });
                if ((rightPosition + $guide.width()) > $(window).width()) {
                    $guide.css({
                        width: $(window).width() + 'px',
                        top: topPosition + 'px',
                        left: 0 + 'px'
                    });
                }
            }
        }
    });
}
function vertical_guide(element) {
    var $guide = $('#guide');
    var offset = element.offset();
    var rightPosition = offset.left + element.outerWidth();
    var topPosition = offset.top + element.outerHeight();
    $guide.css({
        top: topPosition + 'px',
        left: rightPosition + 'px'
    });
    $guide.stop(true, true).fadeIn('slow', function() {
        $guide.css({
            height: ($(window).height() * 0.75) + 'px',
        });
    });
}
$(document).on({
    mouseover: function () {
        horizontal_guide($(this));
        $('#guide').attr('src', 'images/order-guide.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#order_guide');
$(document).on({
    mouseover: function () {
        vertical_guide($(this));
        $('#guide').attr('src', 'images/image-guide.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '.image_guide');
$(document).on({
    mouseover: function () {
        vertical_guide($(this));
        $('#guide').attr('src', 'images/text-guide.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '.text_guide');

$(document).on('submit', '.payment', function(event) {
    event.preventDefault();
    let proof;
    if ($(this).find('textarea[name="gcashfp_text"]').val()) {
        proof = $(this).find('textarea[name="gcashfp_text"]').val();
        proof = proof.replace(/,/g, '');
    } else {
        proof = window.localStorage.getItem('images');
    }
    if (!proof) {
        alert('You must provide any proof of payment.');
        return;
    }
    $.ajax({
        url: './php/update_order.php',
        type: 'POST',
        data: {
            id: $(this).find('input[name="id"]').val(),
            payment: 'Payment Method: Gcash / Full-Payment',
            proof: proof
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                alert('Submitting payment is successful.');
                window.location.href = "order.php";
            } else {
                alert('Unexpected Error: [' + data + ']');
            }
        }
    });
});

$(document).on('change', '.gcashfp_image', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
            const imageUrl = event.target.result;
            const imageDataWithoutPrefix = imageUrl.split(',')[1];
            $.ajax({
                url: "./php/upload_temp.php",
                method: "POST",
                data: {
                    imageFile: imageDataWithoutPrefix
                },
                success: function (data) {
                    data = data.trim();
                    window.localStorage.setItem('images', data);
                    var data = data.replace(/\.\.\//g, '');
                    $('.gcashfp_image').parents('.row').find('.uploaded_gcashfp_image').attr('src', data);
                }
            });
        };
        reader.readAsDataURL(file);
        $('#gcashfp_image').val('');
    } else {
        alert('Uploading image is canceled.');
        window.localStorage.removeItem('images');
    }
});

$(window).on('load', function() {
    window.localStorage.removeItem('images');
})

let current_date;

function open_order(date) {
    $('html, body').animate(
        {
            scrollTop: 0
        },
        500,
        'linear'
    );
    $.ajax({
        url: "./php/get_order_items.php",
        method: "GET",
        data: {
            date: date
        },
        success: function (data) {
            data = data.trim();
            $("#order_items").html(data);

            $.ajax({
                url: "./php/get_order_details.php",
                method: "GET",
                data: {
                    date: date
                },
                success: function (data) {
                    data = data.trim();
                    $("#order_details").html(data);

                    $.ajax({
                        url: "./php/get_order_payments.php",
                        method: "GET",
                        data: {
                            date: date
                        },
                        success: function (data) {
                            data = data.trim();
                            $("#order_payments").html(data);
                            $('#view_order').fadeIn('slow');
                            $('.floating_chat_head').fadeIn('slow');
                            current_date = date;
                        }
                    });
                }
            });
        }
    });
}

$('#close_order_details').on('click', function() {
    $('.floating_chat_head').fadeOut('slow');
    $('#view_order').fadeOut('slow');
})

let chat_condition = false;

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

function minimize_floating_chat() {
    chat_condition = false;
}

function ShowSupportMessages() {
    $.ajax({
        url: "./php/get_message.php",
        method: "GET",
        data: {
            date: current_date
        },
        success: function (data) {
            data = data.trim();
            $("#support-container").html(data);
        }
    });
}

$(document).on("submit", "#support-form", function(event) {
    event.preventDefault();
    var date = current_date;
    var comment = $(this).find('textarea[name="comment"]').val();
    $(this).find('textarea[name="comment"]').val('');

    $.ajax({
        url: "./php/add_message.php",
        method: "POST",
        data: {
            date: date,
            comment: comment
        },
        success: function (data) {
            ShowSupportMessages();
        }
    });
})