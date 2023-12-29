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
        $('#price').text('PHP ' + window.localStorage.getItem('price'));
    } else {
        var price = window.localStorage.getItem('price');
        var quantity = $(this).val();
        var total = price * quantity;
        $('#price').text('PHP ' + total.toFixed(2));
    }
});

function add_to_cart() {
    var title = window.localStorage.getItem('title');
    var thumbnail = window.localStorage.getItem('thumbnail');
    var price = window.localStorage.getItem('price');
    var description = window.localStorage.getItem('description');
    var category = window.localStorage.getItem('category');
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
                if (confirm("Notice: This item is already added to your cart, do you wish to continue to add it again?") === true) {
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
                                alert('Notice: This item has been added successfully to your cart.');
                            } else {
                                alert('Unexpected Error: [' + data + '].');
                            }
                        }
                    });
                }
            } else if (data === "2") {
                alert('Notice: This item has been added successfully to your cart.');
            } else {
                alert('Unexpected Error: [' + data + '].');
            }
        }
    });
}

function buy_now() {
    alert('Test: buy now.');
}

function redirect_to_login() {
    if (confirm("Notice: You need to login in order to add this item to your cart. Do you wish to login now?") === true) {
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
            console.log(data);
            ShowComment();
        }
    });

    $(this).find('textarea[name="comment"]').val('');
});