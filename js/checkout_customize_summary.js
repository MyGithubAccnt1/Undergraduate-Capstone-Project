$(document).ready(function() {
	var currentDate = new Date();
	var readyDate = currentDate.toISOString().slice(0,10);
	$('#date').text(readyDate);
});

$(document).on('click', '#proceed', function() {
    var preview = localStorage.getItem('preview');
    if (!preview) {
        alert('Something went wrong, there is currently no preview of customized item. Please try to customize again, thank you.');
        return;
    }
    const details = window.localStorage.getItem('details');
    if (!details) {
        alert('Something went wrong, there is currently no details of customized item. Please try to customize again, thank you.');
        return;
    }
    let quantity = window.localStorage.getItem('quantity');
    if (!quantity) {
        quantity = 1;
    }
    var buyer = $("#buyer").text().replace("Buyer: ", "");
    var address = $("#address").text().replace("Address: ", "");
    $.ajax({
        url: './php/add_order_customize.php',
        type: 'POST',
        data: {
            buyer: buyer,
            address: address,
            thumbnail: preview,
            details: details,
            quantity: quantity
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                alert('Only 1 checkout can be made every minute.');
            }else if (data === "2") {
                alert('Ordering successful.');
                window.localStorage.removeItem('xlink');
                window.location.href = "order.php";
            } else {
                alert('Unexpected Error: [' + data + ']');
            }
        }
    });
});

function ShowCart() {
    const details = window.localStorage.getItem('details');
    let quantity = window.localStorage.getItem('quantity');
    if (!quantity) {
        quantity = 1;
    }
    $.ajax({
        url: "./php/get_checkout_customize.php",
        method: "GET",
        data: {
            details: details,
            quantity: quantity
        },
        success: function (data) {
            data = data.trim();
            $("#cart-container").html(data);
            var preview = localStorage.getItem('preview');
            var preview = preview.replace(/\.\.\//g, '');
            $('#image').attr('src', preview);
            $('#hidden_image').val(preview);
        }
    });
}

$(document).ready(function() {
    ShowCart();
});

$('#choose_address').find("input[name='address']").on('click', function() {
    $('#address').text('Address: ' + $(this).val());
});

$('#choose_address').find("input[name='alternative']").on('input', function() {
    $('#address').text('Address: ' + $(this).val());
});

function location_api() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                const nominatimApiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;

                fetch(nominatimApiUrl)
                    .then(response => response.json())
                    .then(data => {
                        if (data.display_name) {
                            const address = data.display_name;
                            $.ajax({
                                url: "./php/update_verified_location.php",
                                method: "GET",
                                data: {
                                    address: address
                                },
                                success: function (data) {
                                    data = data.trim();
                                    $('#choose_address').find("input[name='alternative']").val('');
                                    $('#choose_address').find("input[name='alternative']").val(data);
                                    $('#address').text('Address: ' + data);
                                }
                            });
                        }
                    });
            }
        );
    }
}