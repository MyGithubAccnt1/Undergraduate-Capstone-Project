function alt_address() {
    if ($('#alt-address').val() === "") {
        $('#alternative_address').text('');
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
                                $('#alt-address').val(address);
                                $('#alternative_address').text('Alternative: ' + address);
                            }
                        });
                }
            );
        }
    } else {
        $('#alternative_address').text('Alternative: ' + $('#alt-address').val());
    }
}

$(document).on('input', '#alt-address', function() {
	alt_address();
});

$(document).on('change', '#alt-address', function() {
    $('#alternative_address').text('Alternative: ' + $('#alt-address').val());
});

$(document).ready(function() {
	var currentDate = new Date();
	var readyDate = currentDate.toISOString().slice(0,10);
	$('#date').text(readyDate);
});

$(document).on('click', '#proceed', function() {
    var buyer = $("#buyer").text().replace("Buyer: ", "");
    var alt_address = $("#alternative_address").text().replace("Alternative: ", "");
    if (!alt_address) {
        alt_address = null;
    }
    $.ajax({
        url: './php/add_order_customize.php',
        type: 'POST',
        data: {
            buyer: buyer,
            alt_address: alt_address
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                alert('Error: Your cart is empty.');
                window.location.href = "cart.php";
            } else if (data === "2") {
                alert('Only 1 checkout can be made every minute.');
            }else if (data === "4") {
                alert('Ordering successful.');
                window.location.href = "order.php";
            } else {
                alert('Unexpected Error: [' + data + ']');
            }
        }
    });
});

function ShowCart() {
    const details = window.localStorage.getItem('details');
    $.ajax({
        url: "./php/get_checkout_customize.php",
        method: "GET",
        data: {
            details: details
        },
        success: function (data) {
            data = data.trim();
            $("#cart-container").html(data);
            var dataURL = localStorage.getItem('Object');
            $('#image').attr('src', dataURL);
            $('#hidden_image').val(dataURL);
        }
    });
}

$(document).ready(function() {
    ShowCart();
});