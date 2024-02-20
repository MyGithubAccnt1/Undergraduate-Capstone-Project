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
    $.ajax({
        url: "./php/get_checkout_cart.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#cart-container").html(data);
            if ($('#gcash-total').val()) {
                $('#full-amount').text($('#gcash-total').val());
                $('#down-amount').text(((parseFloat($('#gcash-total').val().replace(/,/g, '')) / 2).toFixed(2)).toLocaleString());
            } else {
                $('#full-amount').text('0');
                $('#down-amount').text('0');
            }
            if ($("#full-payment").prop('checked')) {
                $('#method').text('Full-Payment');
            } else {
                $('#method').text('Down-Payment');
            }
        }
    });
}
setInterval(ShowCart, 1000);

$('.full-payment').on('click', function() {
    if ($("#full-payment").prop('checked')){
        $("#full-payment").prop("checked", false);
        $("#down-payment").prop("checked", true);
    } else {
        $("#full-payment").prop("checked", true);
        $("#down-payment").prop("checked", false);
    }
})

$('#full-payment').on('click', function() {
    $("#down-payment").prop("checked", false);
})

$('.down-payment').on('click', function() {
    if ($("#down-payment").prop('checked')){
        $("#down-payment").prop("checked", false);
        $("#full-payment").prop("checked", true);
    } else {
        $("#down-payment").prop("checked", true);
        $("#full-payment").prop("checked", false);
    }
})

$('#down-payment').on('click', function() {
    $("#full-payment").prop("checked", false);
})

$('#gcashfp_image').on('change', function (e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
            const imageUrl = event.target.result;
            const imageDataWithoutPrefix = imageUrl.split(',')[1];
            $.ajax({
                url: "./php/upload_temp.php",
                method: "POST",
                data: {
                    imageFile: imageDataWithoutPrefix
                },
                success: function (data) {
                    data = data.trim();
                    window.localStorage.setItem('images', data);
                    var data = data.replace(/\.\.\//g, '');
                    $('#uploaded_gcashfp_image').attr('src', data);
                }
            });
        };
        reader.readAsDataURL(file);
        $('#gcashfp_image').val('');
    } else {
        alert('Uploading image is canceled.');
        window.localStorage.removeItem('images');
    }
});

$('#gcashdp_image').on('change', function (e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
            const imageUrl = event.target.result;
            const imageDataWithoutPrefix = imageUrl.split(',')[1];
            $.ajax({
                url: "./php/upload_temp.php",
                method: "POST",
                data: {
                    imageFile: imageDataWithoutPrefix
                },
                success: function (data) {
                    data = data.trim();
                    window.localStorage.setItem('images', data);
                    var data = data.replace(/\.\.\//g, '');
                    $('#uploaded_gcashdp_image').attr('src', data);
                }
            });
        };
        reader.readAsDataURL(file);
        $('#gcashdp_image').val('');
    } else {
        alert('Uploading image is canceled.');
        window.localStorage.removeItem('images');
    }
});