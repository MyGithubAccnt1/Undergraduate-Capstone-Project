$(document).on("submit", "#verify", function (event) {
    event.preventDefault();
    var email = window.localStorage.getItem('email');
    var password = $(this).find("input[name='password']").val();

    if (password.length < 8) {
        alert('Notice: The password does not met the 8-16 lenght requirement, please try again.');
        $(this).find("input[name='password']").val('');
        $(this).find("input[name='password']").focus();
    } else if (password.length > 16) {
        alert('Notice: The password does not met the 8-16 lenght requirement, please try again.');
        $(this).find("input[name='password']").val('');
        $(this).find("input[name='password']").focus();
    } else {
        function rot13Encrypt(str) {
          return str.replace(/[a-zA-Z]/g, function (char) {
            var offset = char <= 'Z' ? 65 : 97;
            return String.fromCharCode((char.charCodeAt(0) - offset + 13) % 26 + offset);
          });
        }

        var encryptedText = rot13Encrypt(password);

        $.ajax({
            url: './php/forgot.php',
            type: 'POST',
            data: {
                email: email,
                password: encryptedText
            },
            success: function (data) {
                data = data.trim();
                if (data === "1") {
                    alert('Notice: Your password is successfully changed.');
                    window.location.href = "signin.php";
                } else if (data === "2") {
                    alert('Error: An error occur during the creation of your account due to connection problems, please try again.');
                } else {
                    alert('Unexpected Error: [' + data + ']');
                }
            }
        });
    }
});

$(document).on("click", ".verification-close", function () {
    $('#verify').find("input[name='password']").val('');
    window.location.href = 'signin.php';
});