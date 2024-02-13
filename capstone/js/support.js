let chat_condition = false;

function maximize_floating_chat() {
    
    if ($('.floating_chat_body').css('visibility') === 'hidden' && chat_condition === false) {

        if (window.matchMedia('(max-width: 320px)').matches) {
            $('.floating_chat_head').css({
                'background-image': 'none',
                'border-radius': '0',
                'min-height': 'calc(100vh - 80px)',
                'max-width': '300px',
                'width': 'calc(100vw - 30px)'
            });

            $('.floating_chat_body').css({
                'visibility': 'visible'
            });

            chat_condition = true;
        } else if (window.matchMedia('(max-width: 768px)').matches) {
            $('.floating_chat_head').css({
                'background-image': 'none',
                'border-radius': '0',
                'min-height': 'calc(100vh - 80px)',
                'max-width': '300px',
                'width': 'calc(100vw - 30px)'
            });

            $('.floating_chat_body').css({
                'visibility': 'visible'
            });

            chat_condition = true;
        } else if (window.matchMedia('(max-width: 1024px)').matches) {
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
        } else if (window.matchMedia('(max-width: 1440px)').matches) {
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
        }

    } else if ($('.floating_chat_body').css('visibility') === 'visible' && chat_condition === false) {
        $('.floating_chat_body').css({
            'visibility': 'hidden'
        });
        
        $('.floating_chat_head').css({
            'background-image': 'url("./images/chat_saint.png")',
            'border-radius': '90px',
            'min-height': '75px',
            'width': '75px'
        });
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
setInterval(ShowSupportMessages, 1000);

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