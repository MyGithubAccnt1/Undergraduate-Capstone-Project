function alt_address() {
    console.log('Function started');

    if ($('#alt-address').val() === "") {
        console.log('Alternative address is empty');

        if ("geolocation" in navigator) {
            console.log('Geolocation supported');

            navigator.geolocation.getCurrentPosition(function(position) {
                console.log('Got geolocation data:', position);

                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var currentOrigin = window.location.origin;
                var apiUrl = currentOrigin + ':3000/get-nominatim-data?format=json&lat=' + latitude + '&lon=' + longitude;
                console.log('API URL:', apiUrl);

                $.ajax({
                    url: apiUrl,
                    type: 'GET',
                    success: function(data) {
                        console.log('AJAX success:', data);

                        if (data && data.display_name) {
                            var formattedAddress = data.display_name;
                            $('#alt-address').val(formattedAddress);
                            $('#alt-address').focus();
                            $('#alternative_address').text('Alternative: ' + $('#alt-address').val());
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', status, error);
                    }
                });
            });
        }
    } else {
        console.log('Alternative address is not empty');
        $('#alternative_address').text('Alternative: ' + $('#alt-address').val());
    }
}


$(document).on('input change', '#alt-address', function() {
	alt_address();
});

$(document).ready(function() {
	var currentDate = new Date();
	var readyDate = currentDate.toISOString().slice(0,10);
	$('#date').text('Date: ' + readyDate);
	$('#full_name').text('Buyer: ' + $('#fname').val() + ' ' + $('#lname').val());
	$('#mobile_number').text('Number: ' + $('#mnumber').val());
	$('#complete_address').text('Address: ' + $('#caddress').val());
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