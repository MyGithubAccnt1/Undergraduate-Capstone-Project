$('#register-tab').on('click', function() {
    $('#register').find("input[name='email']").focus();
});

$('#login-tab').on('click', function() {
    $('#login').find("input[name='email']").focus();
});

$('#remember-button').on('click', function () {
    if ($("#remember-check").prop('checked')){
        $("#remember-check").prop("checked", false);
    } else {
        $("#remember-check").prop("checked", true);
    }
});

$('#accept-button').on('click', function () {
    if ($("#accept-check").prop('checked')){
        $("#accept-check").prop("checked", false);
    } else {
        $("#accept-check").prop("checked", true);
        $('.termsNcondition').css('visibility', 'visible');
        $('.darker').css('visibility', 'visible');
    }
});

$('#accept-check').on('change', function () {
    if ($("#accept-check").prop('checked')){
        $('.termsNcondition').css('visibility', 'visible');
        $('.darker').css('visibility', 'visible');
    }
});

$('.tnc-close').on('click', function () {
    $('.termsNcondition').css('visibility', 'hidden');
    $('.darker').css('visibility', 'hidden');
});

$('#forgot-button').on('click', function () {
    $(".loader").fadeIn('slow');
    window.location.href = 'forgot.php';
});

$(document).ready(function() {
    const email = window.localStorage.getItem('remember-email');
    const password = window.localStorage.getItem('remember-password');
    $('#email').val(email);
    $('#password').val(password);
});

$(document).on("submit", "#register", function (event) {
    event.preventDefault();
    email = $(this).find("input[name='email']").val();
    password = $(this).find("input[name='password']").val();
    var repeat = $(this).find("input[name='repeat']").val();
    var acceptTNC = document.getElementById('accept-check');
    if (acceptTNC.checked) {

        if (password.length < 8) {
            alert('Error: The password does not met the 8-16 lenght requirement, please try again.');
            $(this).find("input[name='password']").val('');
            $(this).find("input[name='password']").focus();
            $(this).find("input[name='repeat']").val('');
        } else if (password.length > 16) {
            alert('Error: The password does not met the 8-16 lenght requirement, please try again.');
            $(this).find("input[name='password']").val('');
            $(this).find("input[name='password']").focus();
            $(this).find("input[name='repeat']").val('');
        } else {

            if (password === repeat) {
                $.ajax({
                    url: './php/check_register.php',
                    type: 'POST',
                    data: {
                        email: email,
                    },
                    success: function (data) {
                        data = data.trim();
                        if (data === "1") {
                            alert('Error: This email is already in use, please use another one.');
                            $('#register').find("input[name='email']").val('');
                            $('#register').find("input[name='email']").focus();
                        } else if (data === "2") {
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
                                    window.localStorage.setItem('password', password);
                                    window.localStorage.setItem('otp', otp);
                                    window.location.href = "verify.php";
                                },
                                error: function (error) {
                                    console.error(error);
                                }
                            });
                        }
                    }
                });
            } else {
                alert('Error: The password does not match, please try again.');
                $(this).find("input[name='repeat']").val('');
                $(this).find("input[name='repeat']").focus();
            }
        }
    } else {
        alert('Notice: Please read and accept our Terms and Conditions.');
    }
});

$(document).on("submit", "#login", function (event) {
    event.preventDefault();
    var email = $(this).find("input[name='email']").val();
    var password = $(this).find("input[name='password']").val();

    function rot13Encrypt(str) {
      return str.replace(/[a-zA-Z]/g, function (char) {
        var offset = char <= 'Z' ? 65 : 97;
        return String.fromCharCode((char.charCodeAt(0) - offset + 13) % 26 + offset);
      });
    }

    var encryptedText = rot13Encrypt(password);
    
    $.ajax({
        url: './php/login.php',
        type: 'POST',
        data: {
            email: email,
            password: encryptedText
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                alert('Error: Invalid Email or Password.')
                $('#login').find("input[name='email']").val('');
                $('#login').find("input[name='email']").focus();
                $('#login').find("input[name='password']").val('');
            } else if (data === "2") {
                if ($("#remember-check").prop("checked")) {
                    window.localStorage.setItem('remember-email', email);
                    window.localStorage.setItem('remember-password', password);
                } else {
                    window.localStorage.removeItem('remember-email');
                    window.localStorage.removeItem('remember-password');
                }
                alert('Notice: Logging in successful, welcome back [Administrator]!')
                var xlink = window.localStorage.getItem('xlink');
                console.log(xlink);
                if (xlink) {
                    window.location.href = xlink;
                    window.localStorage.removeItem('xlink');
                } else {
                    window.location.href = "dashboard.php";
                }
            } else if (data === "3") {
                if ($("#remember-check").prop("checked")) {
                    window.localStorage.setItem('remember-email', email);
                    window.localStorage.setItem('remember-password', password);
                } else {
                    window.localStorage.removeItem('remember-email');
                    window.localStorage.removeItem('remember-password');
                }
                alert('Notice: Logging in successful, welcome back!')
                var xlink = window.localStorage.getItem('xlink');
                if (xlink) {
                    window.location.href = xlink;
                    window.localStorage.removeItem('xlink');
                } else {
                    window.location.href = "index.php";
                }
            } else {
                alert('Unexpected Error: [' + data + ']')
            }
        }
    });
});
