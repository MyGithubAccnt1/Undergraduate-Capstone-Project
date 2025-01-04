Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
$(document).ready(function() {
    ShowNecklace();
    ShowLogo();
    ShowPin();
    ShowTable();
    FillInventory();
});
function ShowNecklace() {
    $.ajax({
        url: "./php/get_necklace.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#necklace").html(data);
        }
    });
}
setInterval(ShowNecklace, 1000);
function ShowLogo() {
    $.ajax({
        url: "./php/get_logo.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#logo").html(data);
        }
    });
}
setInterval(ShowLogo, 1000);
function ShowPin() {
    $.ajax({
        url: "./php/get_pin.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#pin").html(data);
        }
    });
}
setInterval(ShowPin, 1000);
function ShowTable() {
    $.ajax({
        url: "./php/get_table.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#table").html(data);
        }
    });
}
setInterval(ShowTable, 1000);
function FillInventory() {
    $.ajax({
        url: "./php/get_product_database.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#products_database").html(data);
            ShowInventory();
        }
    });
}
function ShowInventory() {
    const datatablesSimple = document.getElementById('products_database');
    if (datatablesSimple) {
        const dataTable = new simpleDatatables.DataTable(datatablesSimple);

        const columnWidths = ['25%', '25%', '15%', '15%', '20%'];
        const headers = datatablesSimple.querySelectorAll('th');

        headers.forEach((header, index) => {
            header.style.width = columnWidths[index];
        });

        $('#logo_search').on('click', function() {
            dataTable.search('Logo');
        });

        $('#necklace_search').on('click', function() {
            dataTable.search('Necklace');
        });

        $('#all_search').on('click', function() {
            dataTable.search('');
        });

        $('#table_search').on('click', function() {
            dataTable.search('Table');
        });
    }
}
function delete_button(data) {
    if (confirm("Are you sure you want to delete this item?") === true) {
        $.ajax({
            url: "./php/delete_product.php",
            method: "POST",
            data: {
                id: data
            },
            success: function (data) {
                data = data.trim();
                window.location.href = 'product.php';
            }
        });
    }
}
let intervalId;
function select_button(data) {
    $('html, body').animate(
        {
            scrollTop: 0
        },
        500,
        'linear'
    );
    $('#selected').fadeIn('slow');
    $.ajax({
        url: "./php/get_product_details.php",
        method: "GET",
        data: {
            id: data
        },
        success: function (data) {
            data = data.trim();
            $("#product_details").html(data);
        }
    });
    $.ajax({
        url: "./php/get_product_settings.php",
        method: "GET",
        data: {
            id: data
        },
        success: function (data) {
            data = data.trim();
            $("#product_settings").html(data);
        }
    });
    function UpdateMessage(data) {
        var current = data;
        $.ajax({
            url: "./php/get_product_comments.php",
            method: "GET",
            data: {
                id: current
            },
            success: function (data) {
                data = data.trim();
                $("#message-container").html(data);
                $('#message-form').find('input[name="id"]').val(current);
            }
        });
    }
    clearInterval(intervalId);
    $("#message-container").empty();
    intervalId = setInterval(function () {
        UpdateMessage(data);
    }, 1000);
}
$(document).on("submit", "#message-form", function (event) {
    event.preventDefault();
    var id = $(this).find("input[name='id']").val();
    var comment = $(this).find("textarea[name='comment']").val();
    $.ajax({
        url: "./php/add_product_comments.php",
        method: "POST",
        data: {
            id: id,
            comment: comment
        },
        success: function (data) {
            function UpdateMessage(id) {
                var current = id;
                $.ajax({
                    url: "./php/get_product_comments.php",
                    method: "GET",
                    data: {
                        id: current
                    },
                    success: function (data) {
                        data = data.trim();
                        $("#message-container").html(data);
                        $('#message-form').find('input[name="id"]').val(current);
                    }
                });
            }
            clearInterval(intervalId);
            $("#message-container").empty();
            intervalId = setInterval(function () {
                UpdateMessage(id);
            }, 1000);
        }
    });
    $(this).find('textarea[name="comment"]').val('');
});
function validate(input) {
    var value = input.value;
    if (/^\d*\.?\d*$/.test(value)) {
        
    } else {
        input.value = value.slice(0, -1);
    }
}
$(document).on("submit", "#change_product", function (event) {
    event.preventDefault();

    var id = $(this).find("input[name='id']").val();
    var title = $(this).find("input[name='title']").val();
    var price = $(this).find("input[name='price']").val();
    var description = $(this).find("textarea[name='description']").val();

    if (title.trim() === '') {
        return alert('Invalid material input, please enter a valid text.');
    }

    if (isNaN(parseFloat(price))) {
        return alert('Invalid price input, please enter a valid number.');
    }

    if (description.trim() === '') {
        return alert('Invalid description input, please enter a valid text.');
    }

    if (confirm("Are you sure you want to update this product?") === false) {
        return;
    }

    $.ajax({
        url: "./php/update_product.php",
        method: "POST",
        data: {
            id: id,
            title: title,
            description: description,
            price: price
        },
        success: function (data) {
            select_button(id);
        }
    });
});
$("input[name='title']").on('input change', function() {
    $('#erase_title').fadeIn('slow');
    if (!$(this).val()) {
        $('#erase_title').fadeOut('slow');
    }
})
$('#erase_title').on('click', function() {
    $("input[name='title']").val('');
    $(this).fadeOut('slow');
})
$("input[name='price']").on('input change', function() {
    $('#erase_price').fadeIn('slow');
    if (!$(this).val()) {
        $('#erase_price').fadeOut('slow');
    }
})
$('#erase_price').on('click', function() {
    $("input[name='price']").val('');
    $(this).fadeOut('slow');
})
$("textarea[name='description']").on('input change', function() {
    $('#erase_description').fadeIn('slow');
    if (!$(this).val()) {
        $('#erase_description').fadeOut('slow');
    }
})
$('#erase_description').on('click', function() {
    $("textarea[name='description']").val('');
    $(this).fadeOut('slow');
})
$(document).on("submit", "#product_add", function (event) {
    event.preventDefault();

    var title = $(this).find("input[name='title']").val();
    var price = $(this).find("input[name='price']").val();
    var description = $(this).find("textarea[name='description']").val();

    if (title.trim() === '') {
        return alert('Invalid material input, please enter a valid text.');
    }

    if (isNaN(parseFloat(price))) {
        return alert('Invalid price input, please enter a valid number.');
    }

    if (description.trim() === '') {
        return alert('Invalid description input, please enter a valid text.');
    }

    $.ajax({
        url: "./php/add_product.php",
        method: "POST",
        data: {
            title: title,
            price: price,
            description: description,
            category: $(this).find("select[name='category']").val()
        },
        success: function (data) {
            window.location.href = 'product.php';
            alert('A new product has added successfully, view your new product to add your thumbnail.');
        }
    });
});
$('#close_selected').on('click', function() {
    window.location.href = 'product.php';
})
function open_print(data) {
    var currentDate = new Date();
    var readyDate = currentDate.toISOString().slice(0,10);
    $('#date').text('DATE: ' + readyDate);
    if (data === 'productlist') {
        $.ajax({
            url: "./php/get_print_productlist.php",
            method: "GET",
            success: function (data) {
                data = data.trim();
                $("#fill_print").html(data);
            }
        });
    }
    $('html, body').animate(
        {
            scrollTop: 0
        },
        500,
        'linear'
    );
    $('#print').fadeIn('slow');
}
$('#close_print').on('click', function() {
    $('#print').fadeOut('slow');
})
function download_print() {
    var element = document.getElementById('printable');
    var date = new Date();
    html2pdf(element, {
        margin: 10,
        filename: 'SBM-Product_Report.pdf',
        image: { type: 'png', quality: 1.0 },
        html2canvas: { scale: 1 },
        jsPDF: { 
            unit: 'mm', 
            format: 'a3', 
            orientation: 'portrait',
        },
        pagebreak: { mode: 'avoid-all' },
        html2pdf: {
            margin: 10,
            jsPDF: { 
                unit: 'mm', 
                format: 'a3', 
                orientation: 'portrait',
            }
        },
    });
}
function delete_comment(data) {
    if (confirm("Are you sure you want to delete this comment?") === true) {
        var dataArray = data.split(", ");
        var delete_id = dataArray[0];
        var form_id = dataArray[1];
        $.ajax({
            url: "./php/delete_product_comments.php",
            method: "POST",
            data: {
                id: delete_id
            },
            success: function (data) {
                function UpdateMessage(id) {
                    var current = id;
                    $.ajax({
                        url: "./php/get_product_comments.php",
                        method: "GET",
                        data: {
                            id: current
                        },
                        success: function (data) {
                            data = data.trim();
                            $("#message-container").html(data);
                            $('#message-form').find('input[name="id"]').val(current);
                        }
                    });
                }
                clearInterval(intervalId);
                $("#message-container").empty();
                intervalId = setInterval(function () {
                    UpdateMessage(form_id);
                }, 1000);
            }
        });
    }
}

function open_add_product() {
    $('html, body').animate(
        {
            scrollTop: 0
        },
        500,
        'linear'
    );
    $('#add_product').fadeIn('slow');
}
$('#close_add_product').on('click', function() {
    $('#add_product').fadeOut('slow');
})