$(document).on("submit", "#verify", function (event) {
    event.preventDefault();
    var email = window.localStorage.getItem('email');
    var password = window.localStorage.getItem('password');
    var otp = window.localStorage.getItem('otp');
    var input = $(this).find("input[name='otp']").val();
    if (otp === input) {
        function rot13Encrypt(str) {
          return str.replace(/[a-zA-Z]/g, function (char) {
            var offset = char <= 'Z' ? 65 : 97;
            return String.fromCharCode((char.charCodeAt(0) - offset + 13) % 26 + offset);
          });
        }

        var encryptedText = rot13Encrypt(password);

        $.ajax({
            url: './php/register.php',
            type: 'POST',
            data: {
                email: email,
                password: encryptedText
            },
            success: function (data) {
                data = data.trim();
                if (data === "1") {
                    alert('Your account is successfully created.');
                    window.location.href = "account.php";
                    window.localStorage.removeItem('xlink');
                } else {
                    alert('Unexpected Error: [' + data + ']');
                }
            }
        });
    } else {
        alert('The verification code does not match, please try again.');
        $(this).find("input[name='otp']").val('');
        $(this).find("input[name='otp']").focus();
    }
});

$(document).on("click", ".verification-close", function() {
    $('#verify').find("input[name='otp']").val('');
    window.location.href = 'signin.php';
});