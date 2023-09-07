$(document).ready(function() {
    
    function updateChat() {
        $.ajax({
            url: './php/get_message.php',
            type: 'GET',
            success: function(data) {
                $('#chat').html(data);
            }
        });
    }
    
    $('#send').click(function() {
        var message = $('#message').val();
        $.ajax({
            url: './php/send_message.php',
            type: 'POST',
            data: {message: message},
            success: function() {
                $('#message').val('');
                updateChat();
            }
        });
    });
    
    setInterval(updateChat, 1000); // Refresh chat every second
};
