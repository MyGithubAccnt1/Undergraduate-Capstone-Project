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
ShowCart();
setInterval(ShowCart, 30000);

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
ShowYouMayLike();
setInterval(ShowYouMayLike, 30000);

function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            if (entry.target.id === 'order-container') {
                $.ajax({
                    url: "./php/get_to_cart.php",
                    method: "GET",
                    success: function (data) {
                        data = data.trim();
                        $("#cart-container").html(data);
                    }
                });
            } else if (entry.target.id === 'you_may_like-container') {
                $.ajax({
                    url: "./php/get_you_may_like.php",
                    method: "GET",
                    success: function (data) {
                        data = data.trim();
                        $("#you_may_like-container").html(data);
                    }
                });
            }
        }
    });
}

const observerCartContainer = new IntersectionObserver(handleIntersection, {
    threshold: 0.165,
});
const cartContainerElement = document.getElementById('cart-container');
observerCartContainer.observe(cartContainerElement);

const observerYoumaylikeContainer = new IntersectionObserver(handleIntersection, {
    threshold: 0.165,
});
const youmaylikeContainerElement = document.getElementById('you_may_like-container');
observerYoumaylikeContainer.observe(youmaylikeContainerElement);

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