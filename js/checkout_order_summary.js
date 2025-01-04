$(document).ready(function() {
	var currentDate = new Date();
	var readyDate = currentDate.toISOString().slice(0,10);
	$('#date').text(readyDate);
});

$(document).on('click', '#proceed', function() {
    var date = $("#date").text();
    window.localStorage.setItem('date', date);
    window.localStorage.setItem('address', $('#address').text());
    window.location.href = "checkout_order_proceed.php";
});

function ShowCart() {
    $.ajax({
        url: "./php/get_checkout_cart.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#cart-container").html(data);
        }
    });
}
setInterval(ShowCart, 1000);

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