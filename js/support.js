let chat_condition = false;

function maximize_floating_chat() {
    
    if ($('.floating_chat_body').css('visibility') === 'hidden' && chat_condition === false) {

        $('.floating_chat_head').css({
            'background-image': 'none',
            'border-radius': '0',
            'min-height': '70vh',
            'max-width': '300px',
            'width': 'calc(100vw - 30px)'
        });

        $('.floating_chat_body').css({
            'visibility': 'visible'
        });

        chat_condition = true;

        var intervalId = setInterval(ShowSupportMessages, 1000);

    } else if ($('.floating_chat_body').css('visibility') === 'visible' && chat_condition === false) {
        
        $('.floating_chat_body').css({
            'visibility': 'hidden'
        });
        
        $('.floating_chat_head').css({
            'background-image': 'url("./images/chat_saint.png")',
            'border-radius': '90px',
            'min-height': '50px',
            'width': '50px'
        });

        clearInterval(intervalId);

    }
    
}

function minimize_floating_chat() {
    chat_condition = false;
}

function ShowSupportMessages() {
    $.ajax({
        url: "./php/get_support.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#support-container").html(data);
        }
    });
}

$("#support-form").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $(this).find('textarea[name="comment"]').val('');

    $.ajax({
        url: "./php/add_support.php",
        method: "POST",
        data: formData,
        success: function (data) {
            ShowSupportMessages();
        }
    });
});

function faq(number) {
    if (number === 'FAQ') {
        $.ajax({
            url: "./php/add_new_faq.php",
            method: "POST",
            success: function (data) {
                ShowSupportMessages();
            }
        });
    } else {
        $.ajax({
            url: "./php/add_faq.php",
            method: "POST",
            data: {
                number: number
            },
            success: function (data) {
                ShowSupportMessages();
            }
        });
    }
    
}