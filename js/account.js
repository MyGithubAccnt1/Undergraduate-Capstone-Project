$(document).on("submit", "#personal_details_edit", function (event) {
    event.preventDefault();
    if (confirm("Are you sure you want to change your personal details?") === true) {
        var fname = $(this).find("input[name='fname']").val();
        var lname = $(this).find("input[name='lname']").val();
        var mnumber = $(this).find("input[name='mnumber']").val();
        var address_1 = $(this).find("input[name='address_1']").val();
        var address_2 = $(this).find("input[name='address_2']").val();

        $.ajax({
            url: "./php/update_personal.php",
            method: "POST",
            data: {
                fname: fname,
                lname: lname,
                mnumber: mnumber,
                address_1: address_1,
                address_2: address_2
            },
            success: function (data) {
                data = data.trim();
                if (data === "1") {
                    $('#personal_edit_close').click();
                    var xlink = window.localStorage.getItem('xlink');
                    if (xlink) {
                        window.location.href = xlink;
                        window.localStorage.removeItem('xlink');
                    }
                } else {
                    alert('Unexpected Error: [' + data + ']');
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Request Error:", status, error);
            }
        });
    } else {
        $('#personal_edit_close').click();
    }
});

function location_api(button) {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                const nominatimApiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;

                fetch(nominatimApiUrl)
                    .then(response => response.json())
                    .then(data => {
                        if (data.display_name) {
                            const address = data.display_name;
                            $.ajax({
                                url: "./php/update_verified_location.php",
                                method: "GET",
                                data: {
                                    address: address
                                },
                                success: function (data) {
                                    data = data.trim();
                                    $("input[name='" + button + "']").val(data);
                                }
                            });
                        }
                    });
            }
        );
    }
}

$(document).on('click input change', "input[name='caddress']", function() {
    caddress();
});

$(document).on("submit", "#passwords", function (event) {
    event.preventDefault();

    var old_password = $("#old_password").val();
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();

    if (old_password === password) {
        alert('The new password can not be the same with your old password, please try again.');
        $("#password").val('');
        $("#confirm_password").val('');
        $("#password").focus();
    } else if (password.length < 8 || password.length > 16) {
        alert('The password lenght: ' + password.length + ', does not met the 8-16 digit requirements, please try again.');
        $("#password").focus();
        $("#confirm_password").val('');
    } else if (!/[a-zA-Z]/.test(password) || !/\d/.test(password)) {
        alert('The password must contain atleast one alphabet and numeric, please try again.');
        $("#password").focus();
        $("#confirm_password").val('');
    } else if (password !== confirm_password) {
        alert('The new password and confirm password does not match, please try again.');
        $("#confirm_password").val('');
        $("#confirm_password").focus();
    } else {
        function rot13Encrypt(str) {
          return str.replace(/[a-zA-Z]/g, function (char) {
            var offset = char <= 'Z' ? 65 : 97;
            return String.fromCharCode((char.charCodeAt(0) - offset + 13) % 26 + offset);
          });
        }

        var encryptedText = rot13Encrypt(password);
        var old_encryptedText = rot13Encrypt(old_password);

        $.ajax({
            url: './php/update_password.php',
            type: 'POST',
            data: {
                old_password: old_encryptedText,
                password: encryptedText
            },
            success: function (data) {
                data = data.trim();
                if (data === "1") {
                    alert('Old password is incorrect.');
                    $("#old_password").val('');
                    $("#old_password").focus();
                } else if (data === "2") {
                    alert('Account password has been updated successfully.');
                    window.location.href = "./php/logout.php";
                } else {
                    alert('Unexpected Error: [' + data + ']');
                }

            }
        });
    }
});

$(document).on("submit", "#viewProduct", function (event) {
    event.preventDefault();

    var title = $(this).find("input[name='title']").val();
    var thumbnail = $(this).find("input[name='thumbnail']").val();
    var price = $(this).find("input[name='price']").val();
    var description = $(this).find("input[name='description']").val();
    var category = $(this).find("input[name='category']").val();

    $.ajax({
        url: "./php/update_personal.php",
        method: "POST",
        data: {
            title: title,
            thumbnail: thumbnail,
            price: price,
            description: description,
            category: category
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                window.location.href = 'preview.php';
            } else {
                alert('Unexpected Error: [' + data + ']');
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Request Error:", status, error);
        }
    });
});

function ShowSupportMessages() {
    $.ajax({
        url: "./php/get_support.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#support-container").html(data);
        }
    });
}
setInterval(ShowSupportMessages, 1000);

$("#support-form").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        url: "./php/add_support.php",
        method: "POST",
        data: formData,
        success: function (data) {
            ShowSupportMessages();
        }
    });

    $(this).find('textarea[name="comment"]').val('');
});

$(document).on('mouseover', '#caddress_guide', function() {
    var $guide = $('#guide');
    var offset = $(this).offset();
    var rightPosition = offset.left + $(this).outerWidth();
    var topPosition = offset.top + $(this).outerHeight();
    $guide.css({
        top: topPosition + 'px',
        left: rightPosition + 'px'
    });
    $guide.stop(true, true).fadeIn('slow', function() {
        if ((rightPosition + $guide.width()) > $(window).width()) {
            $guide.css({
                width: ($(window).width() * 0.75) + 'px',
                height: 'auto',
            });
            if ((rightPosition + $guide.width()) > $(window).width()) {
                $guide.css({
                    width: ($(window).width() * 0.5) + 'px'
                });
                if ((rightPosition + $guide.width()) > $(window).width()) {
                    $guide.css({
                        width: $(window).width() + 'px',
                        top: topPosition + 'px',
                        left: 0 + 'px'
                    });
                }
            }
        }
    });
});
$(document).on('mouseout', '#caddress_guide', function() {
    $('#guide').stop(true, true).delay(250).fadeOut('slow');
});

function ShowDetails() {
    $.ajax({
        url: "./php/get_personal.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#personal_details").html(data);
        }
    });
}
setInterval(ShowDetails, 1000);

$('#personal_button').on('click', function() {
    $('html, body').animate(
        {
            scrollTop: 0
        },
        500,
        'linear'
    );
    $('#personal_edit').fadeIn('slow');
})

function validate(input) {
    var value = input.value;
    if (/^[+\d\s]*$/.test(value)) {

    } else {
        input.value = value.slice(0, -1);
    }
}

$('#personal_edit_close').on('click', function() {
    $('#personal_edit').fadeOut('slow');
    $('#personal_details_edit').find("input[name='fname']").val('');
    $('#personal_details_edit').find("input[name='lname']").val('');
    $('#personal_details_edit').find("input[name='mnumber']").val('');
    $('#personal_details_edit').find("input[name='caddress']").val('');
})