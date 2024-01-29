$(document).ready(function() {
    FillContacts();
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
function ShowMessages(email, date) {
    if (email) {
        $.ajax({
            url: "./php/get_messages.php",
            method: "GET",
            data: {
                data: email + ' ' + date
            },
            success: function (data) {
                data = data.trim();
                $("#message-container").html(data);
            }
        });
    } 
}