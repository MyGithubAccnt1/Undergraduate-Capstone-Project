$(document).on('input change', '#fname', function() {
    $('#full_name').text('Buyer: ' + $(this).val() + ' ' + $('#lname').val());
});

$(document).on('input change', '#lname', function() {
    $('#full_name').text('Buyer: ' + $('#fname').val() + ' ' + $(this).val());
});

$(document).on('input change', '#mnumber', function() {
    $('#mobile_number').text('Number: ' + $(this).val());
});

$(document).on('input change', '#caddress', function() {
    $('#complete_address').text('Address: ' + $(this).val());
});

function alt_address() {
    if ($('#alt-address').val() === "") {
        // if (navigator.geolocation) {
        //     navigator.geolocation.getCurrentPosition(
        //         function (position) {
        //             const lat = position.coords.latitude;
        //             const lon = position.coords.longitude;
        //             const nominatimApiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;

        //             fetch(nominatimApiUrl)
        //                 .then(response => response.json())
        //                 .then(data => {
        //                     if (data.display_name) {
        //                         const address = data.display_name;
        //                         $('#alt-address').val(address);
        //                         $('#alternative_address').text('Alternative: ' + address);
        //                     }
        //                 });
        //         }
        //     );
        // }
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    const nominatimApiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;

                    fetch(nominatimApiUrl)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.display_name) {
                                const address = data.display_name;
                                $('#alt-address').val(address);
                                $('#alternative_address').text('Alternative: ' + address);
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching geolocation data:', error);
                        });
                },
                function (error) {
                    console.error('Error getting geolocation:', error);
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
    if ($('#fname').val() & $('#lname').val()) {
        $('#full_name').text('Buyer: ' + $('#fname').val() + ' ' + $('#lname').val());
    }
    if ($('#mnumber').val()) {
        $('#mobile_number').text('Number: ' + $('#mnumber').val());
    }
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