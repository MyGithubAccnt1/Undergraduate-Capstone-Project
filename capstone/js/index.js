$(document).ready(function() {
    $('a[href="#learn-more"]').on('click', function (e) {
        e.preventDefault();

        $('html, body').animate(
            {
                scrollTop: $($(this).attr('href')).offset().top
            },
            500,
            'linear'
        );
    });

    function ShowProduct() {
        var category = $('#category').val();
        $.ajax({
            url: "./php/get_popular_product.php",
            method: "GET",
            data: {
                category: category
            },
            success: function (data) {
                data = data.trim();
                $("#product-container").html(data);
            }
        });
    }
    setInterval(ShowProduct, 1000);

    function ShowArrival() {
        $.ajax({
            url: "./php/get_new_arrival.php",
            method: "GET",
            success: function (data) {
                data = data.trim();
                $("#new_arrival-container").html(data);
            }
        });
    }
    setInterval(ShowArrival, 1000);
});

$(document).on('change', '#category', function() {
    function ShowProduct() {
        var category = $('#category').val();
        $.ajax({
            url: "./php/get_popular_product.php",
            method: "GET",
            data: {
                category: category
            },
            success: function (data) {
                data = data.trim();
                $("#product-container").html(data);
            }
        });
    }
    ShowProduct();
});

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
                window.location.href = 'preview.php';
            } else {
                alert('Unexpected Error: [' + data + '].');
            }
        }
    });
});

$(document).on('mouseover', '.img-responsive', function() {
    var parentContainer = $(this).closest('.img-box');
    var image = parentContainer.find("input[name='image']").val();
    $('#imagePreview').attr("src", image);

    var offset = $(this).offset();
    $('#imagePreview').css({
        top: window.pageYOffset || document.documentElement.scrollTop + 'px',
        left: offset.left + $(this).outerWidth() + 'px'
    });

    $('#imagePreview').stop().fadeIn('slow');
    
});

$(document).on('mouseout', '.img-responsive', function() {
    $('#imagePreview').stop().hide();
});

function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            document.querySelectorAll('.why-box').forEach(box => {
                box.style.animationPlayState = "running";
            });
        }
    });
}

const observer = new IntersectionObserver(handleIntersection, {
    threshold: 0.01,
});

const targetElement = document.querySelector('.why-box');
observer.observe(targetElement);