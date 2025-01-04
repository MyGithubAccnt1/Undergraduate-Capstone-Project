$(document).on('mouseover', '.img-responsive', function() {
    var parentContainer = $(this).closest('.img-box');
    var image = parentContainer.find("input[name='image']").val();
    $('#imagePreview').attr("src", image);
    var offset = $(this).offset();
    var leftPosition = offset.left + $(this).outerWidth();

    if (leftPosition + $('#imagePreview').outerWidth() > $(window).width()) {
        $('#imagePreview').css({
            top: window.pageYOffset || document.documentElement.scrollTop + 'px',
            left: offset.left - $('#imagePreview').outerWidth() + 'px'
        });
    } else {
        $('#imagePreview').css({
            top: window.pageYOffset || document.documentElement.scrollTop + 'px',
            left: leftPosition + 'px'
        });
    }

    $('#imagePreview').stop().fadeIn('slow');
});

$(document).on('mouseout', '.img-responsive', function() {
    $('#imagePreview').stop().hide();
});