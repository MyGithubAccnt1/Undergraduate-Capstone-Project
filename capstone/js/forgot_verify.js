$(document).on("submit", "#verify", function (event) {
    event.preventDefault();
    var otp = window.localStorage.getItem('otp');
    var input = $(this).find("input[name='otp']").val();

    if (otp === input) {
        alert('The system verified you, proceed to change password.');
        window.location.href = 'forgot_change.php';
    } else {
        alert('Error: The verification code does not match, please try again.');
        $(this).find("input[name='otp']").val('');
        $(this).find("input[name='otp']").focus();
    }
});

$(document).on("click", ".verification-close", function (event) {
    $('#verify').find("input[name='otp']").val('');
    window.location.href = 'signin.php';
});