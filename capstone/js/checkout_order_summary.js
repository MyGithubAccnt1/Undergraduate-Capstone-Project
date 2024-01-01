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
        $('#alternative_address').text('Alternative: Test');
    } else {
        $('#alternative_address').text('Alternative: ' + $('#alt-address').val());
    }
}

$(document).on('input', '#alt-address', function() {
	alt_address();
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