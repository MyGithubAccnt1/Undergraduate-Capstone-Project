function ShowProduct() {
    var filter = $('#filter').val();
    var min_price = $('#min-price').val();
    var max_price = $('#max-price').val();
    var page = window.localStorage.getItem('page');

    $.ajax({
        url: "./php/get_table_nameplate.php",
        method: "GET",
        data: {
            filter: filter,
            min_price: min_price,
            max_price: max_price,
            page: page
        },
        success: function (data) {
            $(".loader").fadeOut('slow');
            data = data.trim();
            $("#product-container").html(data);
        }
    });
}
setInterval(ShowProduct, 1000);

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

$(document).on('change', '#filter', function() {
    var category = $('#filter').val();
    if (category === "Price") {
        $('#price').fadeIn('slow');
    } else {
        $('#price').fadeOut('slow');
    }
});

$(document).on('input change', '#min-price', function() {
    if ($(this).val() > 0 && $('#max-price').val() < 1000) {
        if ($(this).val() > $('#max-price').val()) {
            $(this).val($('#max-price').val());
        }
    }

    $('#min-text').text('Min price: PHP ' + $(this).val());
});

$(document).on('input change', '#max-price', function() {
    if ($('#min-price').val() > 0 && $(this).val() < 1000) {
        if ($('#min-price').val() > $(this).val()) {
            $(this).val($('#min-price').val());
        }
    }

    $('#max-text').text('Max price: PHP ' + $(this).val());
});

$(document).on('click', '#prev', function() {
    let page = $('#viewProduct').find("input[name='page']").val();
    page = parseInt(page, 10);
    page = Math.max(0, page - 8);
    window.localStorage.setItem('page', page);
    $(".loader").fadeIn('slow');
});

$(document).on('click', '#next', function() {
    let page = $('#viewProduct').find("input[name='page']").val();
    page = parseInt(page, 10);
    page = page + 8;
    window.localStorage.setItem('page', page);
    $(".loader").fadeIn('slow');
});

$(document).on('submit', '#viewProduct', function(event) {
    event.preventDefault();
    var title = $(this).find("input[name='title']").val();
    var thumbnail = $(this).find("input[name='thumbnail']").val();
    var price = $(this).find("input[name='price']").val();
    var description = $(this).find("input[name='description']").val();
    var category = $(this).find("input[name='category']").val();

    window.localStorage.setItem('title', title);
    window.localStorage.setItem('thumbnail', thumbnail);
    window.localStorage.setItem('price', price);
    window.localStorage.setItem('description', description);
    window.localStorage.setItem('category', category);
    window.location.href = 'preview.php';
});