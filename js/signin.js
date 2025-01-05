$('#get-account').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: './php/verify_email.php',
        type: 'POST',
        data: {
            email: $(this).find('input[name="email"]').val()
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                var password = $('#get-account').find('input[name="password"]').val();
                if (password.length < 8 || password.length > 16) {
                    alert('The password lenght: ' + password.length + ', does not met the 8-16 character requirements, please try again.');
                    $('#get-account').find('input[name="password"]').focus();
                } else if (!/[a-zA-Z]/.test(password) || !/\d/.test(password)) {
                    alert('The password must contain atleast one alphabet and numeric, please try again.');
                    $('#get-account').find('input[name="password"]').focus();
                } else {
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
                            email: $('#get-account').find('input[name="email"]').val(),
                            password: encryptedText
                        },
                        success: function (data) {
                            data = data.trim();
                            if (data === "1") {
                                alert('Incorrect password, please try again.')
                                $('#get-account').find('input[name="password"]').focus();
                            } else if (data === "2") {
                                alert('Logging in successful, welcome back [Administrator]!')
                                window.location.href = "admin/index.php";
                            } else if (data === "3") {
                                alert('Logging in successful, welcome back!')
                                var xlink = window.localStorage.getItem('xlink');
                                if (xlink) {
                                    window.location.href = xlink;
                                    window.localStorage.removeItem('xlink');
                                } else {
                                    window.location.href = "index.php";
                                }
                            } else {
                                alert('Unexpected Error: [' + data + ']');
                            }
                        }
                    });
                }
            } else if (data === "2") {
                alert('We couldn`t find your SBM Account');
                $('#get-account').find('input[name="email"]').focus();
            } else {
                alert('Unexpected Error: [' + data + ']')
            }
        }
    });
})
$('#get-account').find('input[name="show-password"]').on('change', function() {
    if ($(this).prop('checked')) {
        $('#get-account').find('input[name="password"]').attr('type', 'text');
    } else {
        $('#get-account').find('input[name="password"]').attr('type', 'password');
    }
});
$('#sign-in-show-password-button').on('click', function() {
    $('#get-account').find('input[name="show-password"]').click();
})
let otp;
$('#forgot-password').on('click', function () {
    if ($('#get-account').find('input[name="email"]')[0].checkValidity()) {
        $.ajax({
            url: './php/verify_email.php',
            type: 'POST',
            data: {
                email: $('#get-account').find('input[name="email"]').val()
            },
            success: function (data) {
                data = data.trim();
                if (data === "1") {
                    $('.loader').fadeIn('slow');
                    $.ajax({
                        url: './php/send_verification.php',
                        type: 'POST',
                        data: {
                            email: $('#get-account').find('input[name="email"]').val()
                        },
                        success: function (data) {
                            if (data === 'ERROR') {
                                alert('Currently not working... Please be patient...');
                            } else {
                                otp = data;
                                $('#signin-1').hide();
                                $('#verify-forgot-password').find('span[name="display-email"]').text($('#get-account').find('input[name="email"]').val());
                                $('#title').text('Account recovery');
                                $('#sub-title').text('To help keep your account safe, SBM wants to make sure it’s really you trying to sign in');
                                $('#signin-2').fadeIn('slow');
                                $('#verify-forgot-password').find('input[name="verification"]').focus();
                                $(".loader").fadeOut('slow');
                            }
                        }
                    });
                } else if (data === "2") {
                    alert('We couldn`t find your SBM Account');
                    $('#get-account').find('input[name="email"]').focus();
                } else {
                    alert('Unexpected Error: [' + data + ']')
                }
            }
        });
    } else {
        alert('Please fill out the email field properly.');
        $('#get-account').find('input[name="email"]').focus();
    }
})

$('#back-2').on('click', function () {
    $('#title').text('Sign In');
    $('#sub-title').text('Use your SMB Account');
    $('#signin-2').hide();
    $('#signin-1').fadeIn('slow');
})
$('#verify-forgot-password').on('submit', function(event) {
    event.preventDefault();
    var verification = $(this).find('input[name="verification"]').val();
    if (verification === otp) {
        $('#signin-2').hide();
        $('#signin-3').fadeIn('slow', function() {
            alert('You can update your password now if you forgot it. Requirements: 8-16 Character, contain atleast one alphabet and numeric.');
        });
        $('#sub-title').text('Create a new, strong password that you don’t use for other websites');
        $('#verify-forgot-change-password').find('input[name="password"]').focus();
    } else {
        alert('The verification code you`ve provided is incorrect, please try again.');
        $(this).find('input[name="verification"]').focus();
    }
})

$('#verify-forgot-change-password').find('input[name="show-password"]').on('change', function() {
    if ($(this).prop('checked')) {
        $('#verify-forgot-change-password').find('input[name="password"]').attr('type', 'text');
    } else {
        $('#verify-forgot-change-password').find('input[name="password"]').attr('type', 'password');
    }
})
$('#verify-forgot-change-password').find('button[name="show-password-button"]').on('click', function() {
    $('#verify-forgot-change-password').find('input[name="show-password"]').click();
})
$('#back-3').on('click', function () {
    $('#title').text('Account recovery');
    $('#sub-title').text('To help keep your account safe, SBM wants to make sure it’s really you trying to sign in');
    $('#signin-3').hide();
    $('#signin-2').fadeIn('slow');
})
$('#verify-forgot-change-password').on('submit', function(event) {
    event.preventDefault();
    var password = $(this).find('input[name="password"]').val();
    if (password.length < 8 || password.length > 16) {
        alert('The password lenght: ' + password.length + ', does not met the 8-16 character requirements, please try again.');
        $(this).find('input[name="password"]').focus();
    } else if (!/[a-zA-Z]/.test(password) || !/\d/.test(password)) {
        alert('The password must contain atleast one alphabet and numeric, please try again.');
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
                email: $('#get-account').find('input[name="email"]').val(),
                password: encryptedText
            },
            success: function (data) {
                data = data.trim();
                if (data === "1") {
                    alert('Account password has been updated successfully.');
                    window.location.href = "signin.php";
                } else {
                    alert('Unexpected Error: [' + data + ']');
                }
            }
        });
    }
})

$('#register').on('click', function() {
    $('#title').text('Create a SBM Account');
    $('#sub-title').text('Enter your email');
    $('#signin-1').hide();
    $('#register-1').fadeIn('slow');
    $('#check-email').find('input[name="email"]').focus()
})
$('#sign-in').on('click', function() {
    $('#title').text('Sign In');
    $('#sub-title').text('Use your SMB Account');
    $('#register-1').hide();
    $('#signin-1').fadeIn('slow');
    $('#get-email').find('input[name="email"]').focus()
})

$('#check-email').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: './php/verify_email.php',
        type: 'POST',
        data: {
            email: $(this).find('input[name="email"]').val()
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                alert('There is already an existing SBM Account with this email, please try other email.');
                $(this).find('input[name="email"]').focus();
            } else if (data === "2") {
                $('#sub-title').text('Enter your password');
                $('#register-1').hide();
                $('#register-2').fadeIn('slow', function() {
                    alert('Requirements: 8-16 Character, contain atleast one alphabet and numeric.');
                });
                $('#check-password').find('input[name="password"]').focus();
            } else {
                alert('Unexpected Error: [' + data + ']')
            }
        }
    });
})

$('#register-back-2').on('click', function() {
    $('#sub-title').text('Enter your email');
    $('#register-2').hide();
    $('#register-1').fadeIn('slow');
})
$('#check-password').find('input[name="show-password"]').on('change', function() {
    if ($(this).prop('checked')) {
        $('#check-password').find('input[name="password"]').attr('type', 'text');
    } else {
        $('#check-password').find('input[name="password"]').attr('type', 'password');
    }
});
$('#register-show-password-button').on('click', function() {
    $('#check-password').find('input[name="show-password"]').click();
})
$('#OpenTermsAndConditions').on('click', function() {
    $('.termsNcondition').css('visibility', 'visible');
    $('.hero').css('visibility', 'hidden');
})
$('.tnc-close').on('click', function () {
    $('.termsNcondition').css('visibility', 'hidden');
    $('.hero').css('visibility', 'visible');
});
$('#pop-accept-button').on('click', function () {
    $("#pop-accept-check").click();
});
$('#check-password').on('submit', function(event) {
    event.preventDefault();
    var password = $(this).find('input[name="password"]').val();
    if (password.length < 8 || password.length > 16) {
        alert('The password lenght: ' + password.length + ', does not met the 8-16 digit requirements, please try again.');
        $(this).find('input[name="password"]').focus();
    } else if (!/[a-zA-Z]/.test(password) || !/\d/.test(password)) {
        alert('The password must contain atleast one alphabet and numeric, please try again.');
        $(this).find('input[name="password"]').focus();
    } else if (!$("#pop-accept-check").prop('checked')) {
        $('#OpenTermsAndConditions').click();
    } else {
        $(".loader").fadeIn('slow');
        var email = $('#check-email').find('input[name="email"]').val();
        $.ajax({
            url: './php/send_verification.php',
            type: 'POST',
            data: {
                email: email
            },
            success: function (data) {
                if (data === 'ERROR') {
                    alert('Unexpected error occur, please try again.');
                    $(".loader").fadeOut('slow');
                } else {
                    otp = data;
                    $('#register-2').hide();
                    $('#verify-email').find('span[name="display-email"]').text($('#check-email').find('input[name="email"]').val());
                    $('#title').text('Security check');
                    $('#sub-title').text('To help keep your account safe, SBM wants to make sure it’s really you trying to create an account');
                    $('#register-3').fadeIn('slow');
                    $('#verify-email').find('input[name="verification"]').focus();
                    $(".loader").fadeOut('slow');
                }
            }
        });
    }
})

$('#register-back-3').on('click', function() {
    $('#title').text('Create a SBM Account');
    $('#sub-title').text('Enter your password');
    $('#register-3').hide();
    $('#register-2').fadeIn('slow');
})
$('#verify-email').on('submit', function(event) {
    event.preventDefault();
    var password = $('#check-password').find('input[name="password"]').val();
    var verification = $(this).find('input[name="verification"]').val();
    if (verification === otp) {
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
                email: $('#check-email').find('input[name="email"]').val(),
                password: encryptedText
            },
            success: function (data) {
                data = data.trim();
                if (data === "1") {
                    alert('Congratulations on creating your SBM Account, '+ $('#check-email').find('input[name="email"]').val() +'.');
                    window.location.href = "account.php";
                } else {
                    alert('Unexpected Error: [' + data + ']');
                }
            }
        });
    } else {
        alert('The verification code you`ve provided is incorrect, please try again.');
        $(this).find('input[name="verification"]').focus();
    }
})

$(document).ready(function() {
    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();
        var threshold = 1;
        if (scrollPos > threshold) {
            $(".sticky-top").css("background-color", "rgba(0, 0, 0, 0.75)");
            $(".dropdown-menu").css("background-color", "rgba(0, 0, 0, 0.75)");
        } else {
            $(".sticky-top").css("background-color", "transparent");
            $(".dropdown-menu").css("background-color", "transparent");
        }
    });

    const openIconHeader = document.querySelector('.button,.icon');
    const navigationHeader = document.querySelector(".mobile-navigation");
    const closeIconHeader = document.querySelector(".close");

    openIconHeader.addEventListener('click', ()=> {
        navigationHeader.classList.toggle('active-navigation');
    });

    closeIconHeader.addEventListener('click', ()=> {
        navigationHeader.classList.remove('active-navigation');
    });
});