$(document).on("submit", "#verify", function (event) {
    event.preventDefault();
    var email = $(this).find("input[name='email']").val();

    $.ajax({
        url: './php/check_register.php',
        type: 'POST',
        data: {
            email: email,
        },
        success: function (data) {  
            data = data.trim();
            if (data === "1") {
                $(".loader").fadeIn('slow');
                var currentOrigin = window.location.origin;
                var apiUrl = currentOrigin + ':3000/send-otp';
                $.ajax({
                    type: 'POST',
                    url: apiUrl,
                    contentType: 'application/json',
                    data: JSON.stringify({ email }),
                    success: function (response) {
                        otp = response.otp;
                        window.localStorage.setItem('email', email);
                        window.localStorage.setItem('otp', otp);
                        window.location.href = "forgot_verify.php";
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            } else {
                alert('Error: This email is not recognized by our system, please try another email.');
                $(this).find("input[name='email']").val('');
            }
        }
    });
});

$(document).on("click", ".verification-close", function () {
    $('#verify').find("input[name='email']").val('');
    window.location.href = 'signin.php';
});