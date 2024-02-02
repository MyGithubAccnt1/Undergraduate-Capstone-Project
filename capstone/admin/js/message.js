$(document).ready(function() {
    FillContacts();
    const defaultMessage = $('#message-container').css('height');
    $('#message-container').css('max-height', defaultMessage);
    const defaultContact = $('#contact-container').css('height');
    $('#contact-container').css('max-height', defaultContact);
});
function FillContacts() {
    $.ajax({
        url: "./php/get_contacts.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#contact-container").html(data);
        }
    });
}
setInterval(FillContacts, 1000);
let LoopKey, Loop = false;
function ShowMessages(email, date) {
    LoopKey = true;
    UpdateMessage(email, date);
    function UpdateMessage(email, date) {
        $.ajax({
            url: "./php/get_messages.php",
            method: "GET",
            data: {
                data: email + ' ' + date
            },
            success: function (data) {
                data = data.trim();
                $("#message-container").html(data);
                $('#message-form').find('input[name="email"]').val(email);
                $('#message-form').find('input[name="date"]').val(date);

                if (LoopKey) {
                    if (Loop) {
                        clearInterval(Loop);
                    }
                }
                
                $.ajax({
                    url: "./php/update_messages.php",
                    method: "POST",
                    data: {
                        data: email + ' ' + date
                    },
                    success: function (data) {
                        if (LoopKey) {
                            Loop = setInterval(function () {
                                UpdateMessage(email, date);
                            }, 1000);

                            LoopKey = false;
                        }
                    }
                });
            }
        });
    }
}
$(document).on("submit", "#message-form", function (event) {
    event.preventDefault();
    var email = $(this).find("input[name='email']").val();
    var date = $(this).find("input[name='date']").val();
    $.ajax({
        url: "./php/add_messages.php",
        method: "POST",
        data: {
            email: email,
            date: date,
            comment: $(this).find("textarea[name='comment']").val()
        },
        success: function (data) {
            ShowMessages(email, date);
        }
    });
    $(this).find('textarea[name="comment"]').val('');
});