function ShowCart() {
    $.ajax({
        url: "./php/get_to_cart.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#cart-container").html(data);
        }
    });
}
setInterval(ShowCart, 1000);

$(document).on("submit", "#delete", function (event) {
    event.preventDefault(event);
    if (confirm("Are you sure you want to delete this item?") === true) {
        var id = $(this).find("input[name='id']").val();
        $.ajax({
            url: './php/delete_to_cart.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                data = data.trim();
                if (data === "1") {
                    
                } else {
                    alert('Unexpected Error: [' + data + ']');
                }
            }
        });
    }
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