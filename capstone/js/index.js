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
    ShowProduct();
    setInterval(ShowProduct, 30000);

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
    ShowArrival();
    setInterval(ShowArrival, 30000);
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

function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            if (entry.target.classList.contains('why-box')) {
                document.querySelectorAll('.why-box').forEach(box => {
                    box.style.animationPlayState = "running";
                });
            } else if (entry.target.id === 'product-container') {
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
            } else if (entry.target.id === 'new_arrival-container') {
                $.ajax({
                    url: "./php/get_new_arrival.php",
                    method: "GET",
                    success: function (data) {
                        data = data.trim();
                        $("#new_arrival-container").html(data);
                    }
                });
            }
        }
    });
}

const observerWhyChooseUs = new IntersectionObserver(handleIntersection, {
    threshold: 0.165,
});
const whyChooseUsElement = document.querySelector('.why-box');
observerWhyChooseUs.observe(whyChooseUsElement);

const observerProductContainer = new IntersectionObserver(handleIntersection, {
    threshold: 0.165,
});
const productContainerElement = document.getElementById('product-container');
observerProductContainer.observe(productContainerElement);

const observerNewArrivalContainer = new IntersectionObserver(handleIntersection, {
    threshold: 0.165,
});
const newArrivalContainerElement = document.getElementById('new_arrival-container');
observerNewArrivalContainer.observe(newArrivalContainerElement);