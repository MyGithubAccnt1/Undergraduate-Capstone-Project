$(document).ready(function() {
    ShowNecklace();
    ShowDirectory();
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
function ShowDirectory() {
    $.ajax({
        url: "./php/get_directory.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#directory").html(data);
        }
    });
}
setInterval(ShowDirectory, 1000);
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

        const columnWidths = ['5%', '25%', '25%', '15%', '15%', '15%'];
        const headers = datatablesSimple.querySelectorAll('th');

        headers.forEach((header, index) => {
            header.style.width = columnWidths[index];
        });

        $('#directory_search').on('click', function() {
            dataTable.search('Directory');
        });

        $('#necklace_search').on('click', function() {
            dataTable.search('Necklace');
        });

        $('#pin_search').on('click', function() {
            dataTable.search('Pin');
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
function select_button(data) {
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
}
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
    $.ajax({
        url: "./php/update_product.php",
        method: "POST",
        data: {
            id: id,
            title: $(this).find("input[name='title']").val(),
            description: $(this).find("textarea[name='description']").val(),
            price: $(this).find("input[name='price']").val()
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
    $.ajax({
        url: "./php/add_product.php",
        method: "POST",
        data: {
            title: $(this).find("input[name='title']").val(),
            price: $(this).find("input[name='price']").val(),
            description: $(this).find("textarea[name='description']").val(),
            category: $(this).find("select[name='category']").val()
        },
        success: function (data) {
            window.location.href = 'product.php';
        }
    });
});
$('#close_selected').on('click', function() {
    window.location.href = 'product.php';
})
function generatePDFproducttable() {
    var element = document.getElementById('print_product_table');
    var date = new Date();
    html2pdf(element, {
        margin: 10,
        filename: 'Product_Table' + date + '.pdf',
        image: { type: 'png', quality: 1.0 },
        html2canvas: { scale: 1 },
        jsPDF: { 
            unit: 'mm', 
            format: 'a4', 
            orientation: 'portrait',
        },
        pagebreak: { mode: 'avoid-all' },
        html2pdf: {
            margin: 10,
            jsPDF: { 
                unit: 'mm', 
                format: 'a4', 
                orientation: 'portrait',
            }
        },
    });
}