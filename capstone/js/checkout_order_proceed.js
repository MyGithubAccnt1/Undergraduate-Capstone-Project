$(document).ready(function() {
    var date = window.localStorage.getItem('date');
	var alt_address = window.localStorage.getItem('alt_address');
	$('#date').text(date);
    if (alt_address) {
        $('#alternative_address').text(alt_address);
    }
});

$(document).on('click', '#proceed', function() {
    var buyer = $("#buyer").text().replace("Buyer: ", "");
    var alt_address = $("#alternative_address").text().replace("Alternative: ", "");
    if (!alt_address) {
        alt_address = null;
    }
    $.ajax({
        url: './php/add_order.php',
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
                alert('Notice: Only 1 checkout can be made every minute.');
            }else if (data === "4") {
                alert('Notice: Ordering successful.');
                window.location.href = "order.php";
            } else {
                alert('Unexpected Error: [' + data + ']');
            }
        }
    });
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