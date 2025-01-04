$(window).on('load', function() {
    ShowProduct();
    ShowArrival();
    window.localStorage.removeItem('preview');
    window.localStorage.removeItem('details');
    window.localStorage.removeItem('images');
})

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

    window.localStorage.setItem('title', title);
    window.localStorage.setItem('thumbnail', thumbnail);
    window.localStorage.setItem('price', price);
    window.localStorage.setItem('description', description);
    window.localStorage.setItem('category', category);
    window.location.href = 'preview.php';
});

function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            if (entry.target.classList.contains('why-container')) {
                document.querySelectorAll('.why-box').forEach(box => {
                    box.style.animationPlayState = "running";
                });
                
                setInterval(ShowArrival, 1000);
            }
        }
    });
}

const observerWhyChooseUs = new IntersectionObserver(handleIntersection, {
    threshold: 0.1,
});
observerWhyChooseUs.observe(document.querySelector('.why-container'));

const observerArrival = new IntersectionObserver(handleIntersection, {
    threshold: 0.1,
});
observerArrival.observe(document.getElementById('arrival'));