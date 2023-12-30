function ShowCart() {
    $.ajax({
        url: "./php/get_to_cart.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#cart-container").html(data);
        }
    });
}
setInterval(ShowCart, 1000);

$(document).on("submit", "#delete", function (event) {
    event.preventDefault(event);
    if (confirm("Are you sure you want to delete this item?") === true) {
        var id = $(this).find("input[name='id']").val();
        $.ajax({
            url: './php/delete_to_cart.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                data = data.trim();
                if (data === "1") {
                    
                } else {
                    alert('Unexpected Error: [' + data + ']');
                }
            }
        });
    }
});

$(document).on('mouseover', '.img-responsive', function() {
    var parentContainer = $(this).closest('.img-box');
    var image = parentContainer.find("input[name='image']").val();
    $('#imagePreview').attr("src", image);

    var offset = $(this).offset();
    $('#imagePreview').css({
        top: window.pageYOffset || document.documentElement.scrollTop + 'px',
        left: offset.left + $(this).outerWidth() + 'px'
    });

    $('#imagePreview').stop().fadeIn('slow');
    
});

$(document).on('mouseout', '.img-responsive', function() {
    $('#imagePreview').stop().hide();
});