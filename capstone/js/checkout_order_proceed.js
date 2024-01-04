$(document).ready(function() {
    var date = window.localStorage.getItem('date');
	var alt_address = window.localStorage.getItem('alt_address');
	$('#date').text(date);
    if (alt_address) {
        $('#alternative_address').text(alt_address);
    }
});

$(document).on('click', '#proceed', function() {
    var date = $("#date").val();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var mnumber = $("#mnumber").val();
    var caddress = $("#caddress").val();
    var alt_address = $("#alt-address").val();

    if (fname === "" || lname === "" || mnumber === "" || caddress === "Philippines") {
        alert('Notice: There are some empty field, please fill it up in you profile to continue.');
        window.location.href = 'account.php';
    } else {
        
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