function alt_address() {
    if ($('#alt-address').val() === "") {
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
	$('#date').text('Date: ' + readyDate);
});

$(document).on('click', '#proceed', function() {
    var date = $("#date").text();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var mnumber = $("#mnumber").val();
    var caddress = $("#caddress").val();
    var alt_address = $("#alternative_address").text();

    if (fname === "" || lname === "" || mnumber === "" || caddress === "Philippines") {
        alert('Notice: There are some empty field, please fill it up in you profile to continue.');
        window.location.href = 'account.php';
    } else {
        window.localStorage.setItem('date', date);
        window.localStorage.setItem('alt_address', alt_address);
        window.location.href = "checkout_order_proceed.php";
    }
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