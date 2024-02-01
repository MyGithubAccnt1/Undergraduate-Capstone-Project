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

        const columnWidths = ['5%', '40%', '25%', '15%', '15%'];
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
    if ($(this).val() < 1) {
        $(this).val('0');
        $('#erase_quantity').fadeOut('slow');
    } else {
        $('#erase_quantity').fadeIn('slow');
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
    $('#quantity').val('0');
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
        url: "./php/get_update_inventory.php",
        method: "POST",
        data: {
            id: data
        },
        success: function (data) {
            data = data.trim();
            var data = data.split(',').map(function(item) {
                return item.trim();
            });
            $('#material').val(data[0]);
            $('#quantity').val(Number(data[1]));
            $('#category').val(data[2]);
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
        url: "./php/update_inventory.php",
        method: "POST",
        data: {
            material: material,
            quantity: quantity,
            category: category
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