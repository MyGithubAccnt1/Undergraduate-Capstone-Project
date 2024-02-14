$(document).ready(function() {
    FillInventory();
});
function FillInventory() {
    $.ajax({
        url: "./php/get_inventory.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#materials_database").html(data);
            ShowInventory();
        }
    });
}
function ShowInventory() {
    const datatablesSimple = document.getElementById('materials_database');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);

        const columnWidths = ['5%', '40%', '15%', '20%', '20%'];
        const headers = datatablesSimple.querySelectorAll('th');

        headers.forEach((header, index) => {
            header.style.width = columnWidths[index];
        });
    }
}
$('#material').on('input change', function() {
    $('#erase_material').fadeIn('slow');
    if (!$(this).val()) {
        $('#erase_material').fadeOut('slow');
    }
})
$('#quantity').on('input change', function() {
    $('#erase_quantity').fadeIn('slow');
    if (!$(this).val()) {
        $('#erase_quantity').fadeOut('slow');
    }
})
$('#category').on('input change', function() {
    $('#erase_category').fadeIn('slow');
    if (!$(this).val()) {
        $('#erase_category').fadeOut('slow');
    }
})
$('#erase_material').on('click', function() {
    $('#material').val('');
    $(this).fadeOut('slow');
})
$('#erase_quantity').on('click', function() {
    $('#quantity').val('');
    $(this).fadeOut('slow');
})
$('#erase_category').on('click', function() {
    $('#category').val('');
    $(this).fadeOut('slow');
})

function delete_button(data) {
    if (confirm("Are you sure you want to delete this item?") === true) {
        $.ajax({
            url: "./php/delete_inventory.php",
            method: "POST",
            data: {
                id: data
            },
            success: function (data) {
                data = data.trim();
                window.location.href = 'inventory.php';
            }
        });
    }
}
function success_button(data) {
    $.ajax({
        url: "./php/get_inventory_settings.php",
        method: "GET",
        data: {
            id: data
        },
        success: function (data) {
            data = data.trim();
            $("#inventory_settings").html(data);
            $('#selected').fadeIn('slow');
        }
    });
}
$(document).on("submit", "#inventory_add_update", function (event) {
    event.preventDefault();

    var material = $('#material').val();
    var quantity = $('#quantity').val();
    var category = $('#category').val();
    console.log(material, quantity, category);
    $.ajax({
        url: "./php/add_inventory.php",
        method: "POST",
        data: {
            material: material,
            quantity: quantity,
            category: category
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                alert('A new material has added successfully.');
                window.location.href = 'inventory.php';
            } else {
                alert('Unexpected Error: [' + data + ']');
            }
        }
    });
});
function generatePDFinventorytable() {
    var element = document.getElementById('print_inventory_table');
    var date = new Date();
    html2pdf(element, {
        margin: 10,
        filename: 'Inventory_Table' + date + '.pdf',
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
function validate(input) {
    var value = input.value;
    if (/^\d*\.?\d*$/.test(value)) {
        
    } else {
        input.value = value.slice(0, -1);
    }
}
$('#close_selected').on('click', function() {
    window.location.href = 'inventory.php';
})
$(document).on("submit", "#change_material", function (event) {
    event.preventDefault();
    var id = $(this).find("input[name='id']").val();
    $.ajax({
        url: "./php/update_inventory.php",
        method: "POST",
        data: {
            id: id,
            material: $(this).find("input[name='material']").val(),
            quantity: $(this).find("input[name='quantity']").val(),
            category: $(this).find("input[name='category']").val()
        },
        success: function (data) {
            data = data.trim();
            if (data === "1") {
                alert('Inventory has been updated successfully.');
                window.location.href = 'inventory.php';
            } else {
                alert('Unexpected Error: [' + data + ']');
            }
        }
    });
});