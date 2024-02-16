Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
$(document).ready(function() {
    FillInventory();
    ShowProducts()
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
        const dataTable = new simpleDatatables.DataTable(datatablesSimple);

        const columnWidths = ['5%', '30%', '15%', '15%', '15%', '20%'];
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

        $('#default_search').on('click', function() {
            dataTable.search('');
        });

        $('#other_search').on('click', function() {
            dataTable.search('Other');
        });

        $('#table_search').on('click', function() {
            dataTable.search('Table');
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
$('#erase_material').on('click', function() {
    $('#material').val('');
    $(this).fadeOut('slow');
})
$('#erase_quantity').on('click', function() {
    $('#quantity').val('');
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
            $('html, body').animate(
                {
                    scrollTop: 0
                },
                500,
                'linear'
            );
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
            category: $(this).find("select[name='category']").val()
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
function ShowProducts() {
    $.ajax({
        url: "./php/get_material.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            data = data.split(',').map(Number);
            Product_Count(data);
        }
    });
}
function Product_Count(data) {
    var max = Math.max.apply(null, data);
    var ctx = document.getElementById("myBarChart");
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
                labels: ["Directory Marker", "Necklace", "Table Nameplate", "Other"],
                datasets: [{
                    label: "Quantity",
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                data: data,
                }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: max,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        display: true
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });
}

function ShowNecklace() {
    $.ajax({
        url: "./php/get_necklace_materials.php",
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
        url: "./php/get_directory_materials.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#directory").html(data);
        }
    });
}
setInterval(ShowDirectory, 1000);
function ShowTable() {
    $.ajax({
        url: "./php/get_table_materials.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#table").html(data);
        }
    });
}
setInterval(ShowTable, 1000);
function ShowOther() {
    $.ajax({
        url: "./php/get_other_materials.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#other").html(data);
        }
    });
}
setInterval(ShowOther, 1000);

function open_print(data) {
    var currentDate = new Date();
    var readyDate = currentDate.toISOString().slice(0,10);
    $('#date').text('DATE: ' + readyDate);
    if (data === 'stocklist') {
        $.ajax({
            url: "./php/get_print_stocklist.php",
            method: "GET",
            success: function (data) {
                data = data.trim();
                $("#fill_print").html(data);
            }
        });
    } else {
        $.ajax({
            url: "./php/get_print_stockcount.php",
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
        filename: 'SBM-Stock_Report.pdf',
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