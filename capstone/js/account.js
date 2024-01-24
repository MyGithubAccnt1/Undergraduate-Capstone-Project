$(document).on("submit", "#personal", function (event) {
    event.preventDefault();

    var fname = $(this).find("input[name='fname']").val();
    var lname = $(this).find("input[name='lname']").val();
    var mnumber = $(this).find("input[name='mnumber']").val();
    var caddress = $(this).find("input[name='caddress']").val();

    $.ajax({
        url: "./php/update_personal.php",
        method: "POST",
        data: {
            fname: fname,
            lname: lname,
            mnumber: mnumber,
            caddress: caddress
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                alert('Notice: Personal details has been updated successfully.');
                window.location.href = 'account.php';
            } else {
                alert('Unexpected Error: [' + data + ']');
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Request Error:", status, error);
        }
    });
});

function caddress() {
    if ($("input[name='caddress']").val() === "") {
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
                                $("input[name='caddress']").val(address);
                            }
                        });
                }
            );
        }
    }
}

$(document).on('input', "input[name='caddress']", function() {
    caddress();
});

// $(document).on("submit", "#address", function (event) {
//     event.preventDefault();

//     var region = $("#region option:selected").text();
//     var province = $("#province option:selected").text();
//     var city = $("#city option:selected").text();
//     var barangay = $("#barangay option:selected").text();
//     var subdivision = $(this).find("input[name='subdivision']").val();
//     var street = $(this).find("input[name='street']").val();
//     var phase = $(this).find("input[name='phase']").val();
//     var block = $(this).find("input[name='block']").val();
//     var lot = $(this).find("input[name='lot']").val();
//     $.ajax({
//         url: "./php/update_address.php",
//         method: "POST",
//         data: {
//             region: region,
//             province: province,
//             city: city,
//             barangay: barangay,
//             subdivision: subdivision,
//             street: street,
//             phase: phase,
//             block: block,
//             lot: lot
//         },
//         success: function (data) {
//             data = data.trim();
//             if (data === "1") {
//                 alert('Notice: Address has been updated successfully.');
//                 window.location.href = 'account.php';
//             } else {
//                 alert('Unexpected Error: [' + data + ']');
//             }
//         },
//         error: function (xhr, status, error) {
//             console.error("AJAX Request Error:", status, error);
//         }
//     });
// });

$(document).on("submit", "#passwords", function (event) {
    event.preventDefault();

    var old_password = $("#old_password").val();
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();

    if (password.length < 8) {
        alert('Error: The password does not met the 8-16 lenght requirement, please try again.');
        $(this).find("input[name='password']").val('');
        $(this).find("input[name='password']").focus();
    } else if (password.length > 16) {
        alert('Error: The password does not met the 8-16 lenght requirement, please try again.');
        $(this).find("input[name='password']").val('');
        $(this).find("input[name='password']").focus();
    } else {

        if (password === confirm_password) {

            if (old_password === password) {
                alert('Error: The new password can not be the same with your old password, please try again.');
                $("#password").val('');
                $("#confirm_password").val('');
                $("#password").focus();
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
                            alert('Error: Old password is incorrect.');
                            $("#old_password").val('');
                            $("#old_password").focus();
                        } else if (data === "2") {
                            alert('Notice: Account password has been updated successfully, proceed to log out.');
                            window.location.href = "./php/logout.php";
                        } else {
                            alert('Unexpected Error: [' + data + ']');
                        }

                    }
                });

            }
            
        } else {

            alert('Error: The new password and confirm password does not match, please try again.');
            $("#confirm_password").val('');
            $("#confirm_password").focus();

        }
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
