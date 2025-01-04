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
setInterval(FillContacts, 5000);
let LoopKey, Loop;
function ShowMessages(email, date) {
    LoopKey = true;
    UpdateMessage(email, date);
    function UpdateMessage(email, date) {
        $.ajax({
            url: "./php/get_messages.php",
            method: "GET",
            data: {
                email: email,
                date: date
            },
            success: function (data) {
                data = data.trim();
                $("#message-container").html(data);
                $('#message-form').find('input[name="email"]').val(email);
                $('#message-form').find('input[name="date"]').val(date);

                if (LoopKey) {
                    clearInterval(Loop);
                }

                $.ajax({
                    url: "./php/update_messages.php",
                    method: "POST",
                    data: {
                        email: email,
                        date: date
                    },
                    success: function (data) {
                        data = data.trim();
                        if (LoopKey) {
                            LoopKey = false;
                            Loop = setInterval(function () {
                                UpdateMessage(email, date);
                            }, 2000);
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
    var comment = $(this).find("textarea[name='comment']").val();
    if (date.trim() === "") {
        date = undefined;
    }
    $.ajax({
        url: "./php/add_messages.php",
        method: "POST",
        data: {
            email: email,
            date: date,
            comment: comment
        },
        success: function (data) {
            ShowMessages(email, date);
            $.ajax({
                url: "./php/send_notification.php",
                method: "POST",
                data: {
                    email: email,
                    message: '[Adminintrator]: ' + comment
                },
                success: function (data) {
                    
                }
            });
        }
    });
    $(this).find('textarea[name="comment"]').val('');
});