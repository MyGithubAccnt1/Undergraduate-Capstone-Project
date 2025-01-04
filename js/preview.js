// let thumbnails = document.getElementsByClassName('thumbnail')
// let activeImages = document.getElementsByClassName('active-img')
// for (var i=0; i < thumbnails.length; i++){
// 	thumbnails[i].addEventListener('mouseover', function(){
// 		console.log(activeImages)
// 		if (activeImages.length > 0){
// 			activeImages[0].classList.remove('active-img')
// 		}
// 		this.classList.add('active-img')
// 		document.getElementById('featured').src = this.src
// 	})
// }
// let buttonRight = document.getElementById('slideRight');
// let buttonLeft = document.getElementById('slideLeft');
// buttonLeft.addEventListener('click', function(){
// 	document.getElementById('slider').scrollLeft -= 180
// })
// buttonRight.addEventListener('click', function(){
// 	document.getElementById('slider').scrollLeft += 180
// })

$(document).on('change', '#quantity', function() {
    if ($(this).val() < 1) {
        $(this).val('1');
        $('#price').text('₱' + window.localStorage.getItem('price'));
    } else {
        var price = window.localStorage.getItem('price');
        var quantity = $(this).val();
        var total = price * quantity;
        $('#price').text('₱' + total.toFixed(2));
    }
});

function add_to_cart() {
    var title = window.localStorage.getItem('title');
    var thumbnail = window.localStorage.getItem('thumbnail');
    var price = window.localStorage.getItem('price');
    var quantity = $('#quantity').val();

    $.ajax({
        url: "./php/add_to_cart.php",
        method: "POST",
        data: {
            thumbnail: thumbnail,
            title: title,
            price: price,
            quantity: quantity
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                if (confirm("This item is already added to your cart, do you wish to continue to add it again?") === true) {
                    $.ajax({
                        url: './php/add_to_cart_forced.php',
                        type: 'POST',
                        data: {
                            thumbnail: thumbnail,
                            title: title,
                            price: price,
                            quantity: quantity
                        },
                        success: function (data) {
                            data = data.trim();
                            if (data === "1") {
                                alert('This item has been added successfully to your cart.');
                            } else {
                                alert('Unexpected Error: [' + data + '].');
                            }
                        }
                    });
                }
            } else if (data === "2") {
                alert('This item has been added successfully to your cart.');
            } else {
                alert('Unexpected Error: [' + data + '].');
            }
        }
    });
}

function buy_now() {
    var title = window.localStorage.getItem('title');
    var thumbnail = window.localStorage.getItem('thumbnail');
    var price = window.localStorage.getItem('price');
    var quantity = $('#quantity').val();

    $.ajax({
        url: "./php/add_to_cart.php",
        method: "POST",
        data: {
            thumbnail: thumbnail,
            title: title,
            price: price,
            quantity: quantity
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                if (confirm("This item is already added to your cart, do you wish to continue to add it again?") === true) {
                    $.ajax({
                        url: './php/add_to_cart_forced.php',
                        type: 'POST',
                        data: {
                            thumbnail: thumbnail,
                            title: title,
                            price: price,
                            quantity: quantity
                        },
                        success: function (data) {
                            data = data.trim();
                            if (data === "1") {
                                window.location.href = 'checkout_order_summary.php';
                            } else {
                                alert('Unexpected Error: [' + data + '].');
                            }
                        }
                    });
                }
            } else if (data === "2") {
                window.location.href = 'checkout_order_summary.php';
            } else {
                alert('Unexpected Error: [' + data + '].');
            }
        }
    });
}

function redirect_to_login() {
    if (confirm("You need to login in order to do this action. Do you wish to login now?") === true) {
        var xlink = window.location.href;
        window.localStorage.setItem('xlink', xlink);
        window.location.href = 'signin.php';
    }
}

function ShowComment() {
	var title = window.localStorage.getItem('title');
	var category = window.localStorage.getItem('category');

    $.ajax({
        url: "./php/get_comment.php",
        method: "GET",
        data: {
        	title: title,
            category: category
        },
        success: function (data) {
        	data = data.trim();
            $("#comment-container").html(data);
        }
    });
}
setInterval(ShowComment, 1000);

$("#comment-form").submit(function (e) {
    e.preventDefault();

    var title = window.localStorage.getItem('title');
    var category = window.localStorage.getItem('category');
    var comment = $(this).find('textarea[name="comment"]').val();

    $.ajax({
        url: "./php/add_comment.php",
        method: "POST",
        data: {
            title: title,
            category: category,
            comment: comment
        },
        success: function (data) {
            ShowComment();
        }
    });

    $(this).find('textarea[name="comment"]').val('');
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

$(window).on('load', function() {
    var category = window.localStorage.getItem('category');
    $.ajax({
        url: "./php/preview_options.php",
        method: "GET",
        data: {
            category: category
        },
        success: function (data) {
            data = data.trim();
            $("#options").html(data);
            $('#title').text(window.localStorage.getItem('title'));
            $('#featured').attr('src', window.localStorage.getItem('thumbnail'));
            $('#price').text('₱' + window.localStorage.getItem('price'));
            $('#decription').text(window.localStorage.getItem('description'));
        }
    });
})

function make_customize() {
    window.localStorage.setItem('quantity', $('#quantity').val());
    var category = window.localStorage.getItem('category');
    window.location.href = 'customize.php?&category=' + category;
}