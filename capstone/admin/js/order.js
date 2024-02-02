$(document).ready(function() {
    ShowPendings();
    ShowOTW();
    ShowDelivered();
    ShowRejected();
    FillOrders();
});
function ShowPendings() {
    $.ajax({
        url: "./php/get_pendings.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#pending").html(data);
        }
    });
}
setInterval(ShowPendings, 1000);
function ShowOTW() {
    $.ajax({
        url: "./php/get_OTW.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#otw").html(data);
        }
    });
}
setInterval(ShowOTW, 1000);
function ShowDelivered() {
    $.ajax({
        url: "./php/get_delivered.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#delivered").html(data);
        }
    });
}
setInterval(ShowDelivered, 1000);
function ShowRejected() {
    $.ajax({
        url: "./php/get_rejected.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#rejected").html(data);
        }
    });
}
setInterval(ShowRejected, 1000);
function FillOrders() {
    $.ajax({
        url: "./php/get_orders.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#order_database").html(data);
            ShowOrders();
        }
    });
}
function ShowOrders() {
    const datatablesSimple = document.getElementById('order_database');
    
    if (datatablesSimple) {
        const dataTable = new simpleDatatables.DataTable(datatablesSimple);

        const columnWidths = ['5%', '25%', '20%', '20%', '20%', '10%'];
        const headers = datatablesSimple.querySelectorAll('th');

        headers.forEach((header, index) => {
            header.style.width = columnWidths[index];
        });

        $('#pending_search').on('click', function() {
            dataTable.search('Pending');
        });

        $('#on-the-way_search').on('click', function() {
            dataTable.search('On-The-Way');
        });

        $('#delivered_search').on('click', function() {
            dataTable.search('Delivered');
        });

        $('#rejected_search').on('click', function() {
            dataTable.search('Rejected');
        });
    }
}
let intervalId;
function select_button(data) {
    $('#selected').fadeIn('slow');
    $.ajax({
        url: "./php/get_invoice.php",
        method: "GET",
        data: {
            id: data
        },
        success: function (data) {
            data = data.trim();
            $("#invoice").html(data);
        }
    });
    function UpdateMessage(data) {
        var current = data;
        $.ajax({
            url: "./php/get_order_message.php",
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
    $.ajax({
        url: "./php/get_order_settings.php",
        method: "GET",
        data: {
            id: data
        },
        success: function (data) {
            data = data.trim();
            $("#settings-container").html(data);
        }
    });
}
$(document).on("submit", "#message-form", function (event) {
    event.preventDefault();
    var id = $(this).find("input[name='id']").val();
    $.ajax({
        url: "./php/add_order_message.php",
        method: "POST",
        data: {
            id: id,
            comment: $(this).find("textarea[name='comment']").val()
        },
        success: function (data) {
            select_button(id);
        }
    });
    $(this).find('textarea[name="comment"]').val('');
});
$(document).on("submit", "#change_status", function (event) {
    event.preventDefault();
    var id = $(this).find("input[name='id']").val();
    $.ajax({
        url: "./php/update_order_status.php",
        method: "POST",
        data: {
            id: id,
            status: $('#status').val()
        },
        success: function (data) {
            select_button(id);
        }
    });
});
$(document).on("submit", "#change_total", function (event) {
    event.preventDefault();
    var id = $(this).find("input[name='id']").val();
    $.ajax({
        url: "./php/update_order_total.php",
        method: "POST",
        data: {
            id: id,
            total: $(this).find("input[name='total']").val()
        },
        success: function (data) {
            select_button(id);
        }
    });
    $(this).find("input[name='total']").val('');
});
function validate(input) {
    var value = input.value;
    if (/^\d*\.?\d*$/.test(value)) {
        
    } else {
        input.value = value.slice(0, -1);
    }
}
$('#close_selected').on('click', function() {
    window.location.href = 'order.php';
})
function generatePDFsalesinvoice() {
    var element = document.getElementById('print_sales_invoice');
    var date = document.getElementById('current-date').textContent || document.getElementById('current-date').innerText;
    html2pdf(element, {
        margin: 10,
        filename: 'sales_invoice_' + date + '.pdf',
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
function generatePDFordertable() {
    var element = document.getElementById('print_order_table');
    var date = new Date();
    html2pdf(element, {
        margin: 10,
        filename: 'Order_Table' + date + '.pdf',
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