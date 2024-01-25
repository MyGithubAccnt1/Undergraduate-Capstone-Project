function ShowOrder() {
    $.ajax({
        url: "./php/get_order.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#order-container").html(data);
        }
    });
}
setInterval(ShowOrder, 1000);

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
    if (confirm("Are you sure you want to cancel this order?") === true) {
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

$(window).on('load', function() {
    function ShowMessages() {
        var row = $("input[name='row']").val();
        let loop = 1;
        function GetMessage() {
            $.ajax({
                url: "./php/get_message.php",
                method: "GET",
                data: {
                    date: $('#message-form' + loop).find("input[name='date']").val()
                },
                success: function (data) {
                    data = data.trim();
                    $("#message-container" + loop).html(data);
                    loop++;
                    if (loop <= row) {
                        GetMessage();
                    }
                }
            });
        }
        GetMessage();
    }
    setInterval(ShowMessages, 1000);
});

$(document).on("submit", ".message-form", function (event) {
    event.preventDefault();
    $.ajax({
        url: "./php/add_message.php",
        method: "POST",
        data: {
            date: $(this).find("input[name='date']").val(),
            comment: $(this).find("textarea[name='comment']").val()
        },
        success: function (data) {
            var row = $("input[name='row']").val();
            let loop = 1;
            function GetMessage() {
                $.ajax({
                    url: "./php/get_message.php",
                    method: "GET",
                    data: {
                        date: $('#message-form' + loop).find("input[name='date']").val()
                    },
                    success: function (data) {
                        data = data.trim();
                        $("#message-container" + loop).html(data);
                        loop++;
                        if (loop <= row) {
                            GetMessage();
                        }
                    }
                });
            }
            GetMessage();
        }
    });

    $(this).find('textarea[name="comment"]').val('');
});