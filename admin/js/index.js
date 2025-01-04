Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
$(document).ready(function() {
    ShowOnlines();
    ShowPendings();
    ShowDelivered();
    ShowEarnings();
    ShowProducts();
    ShowProductPopularity();
    ShowMaterialCount()
    FillSales();
    FillYear();
    $.ajax({
        url: "./php/get_monthly_earnings.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            createDynamicChart(JSON.parse(data));
        }
    });
});
function ShowOnlines() {
    $.ajax({
        url: "./php/get_onlines.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#online").html(data);
        }
    });
}
setInterval(ShowOnlines, 1000);
function ShowPendings() {
    $.ajax({
        url: "./php/get_daily_pendings.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#pending").html(data);
        }
    });
}
setInterval(ShowPendings, 1000);
function ShowDelivered() {
    $.ajax({
        url: "./php/get_daily_delivered.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#delivered").html(data);
        }
    });
}
setInterval(ShowDelivered, 1000);
function ShowEarnings() {
    $.ajax({
        url: "./php/get_daily_earnings.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#earnings").html(data);
        }
    });
}
setInterval(ShowEarnings, 1000);
function ShowProducts() {
    $.ajax({
        url: "./php/get_products.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            data = data.split(',').map(Number);
            Product_Count(data);
        }
    });
}
function FillSales() {
    $.ajax({
        url: "./php/get_sales.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#sales_database").html(data);
            ShowSales();
        }
    });
}
function ShowSales() {
    const datatablesSimple = document.getElementById('sales_database');
    
    if (datatablesSimple) {
        const dataTable = new simpleDatatables.DataTable(datatablesSimple);

        const columnWidths = ['40%', '40%', '10%'];
        const headers = datatablesSimple.querySelectorAll('th');

        headers.forEach((header, index) => {
            header.style.width = columnWidths[index];
        });
    }
}
function FillYear() {
    var currentYear = new Date().getFullYear();
    for (var year = 2024; year <= currentYear; year++) {
        var option = document.createElement("option");
        option.value = year;
        option.text = year;
        document.getElementById("year").add(option);
    }
}

function open_print(data) {
    var currentDate = new Date();
    var readyDate = currentDate.toISOString().slice(0,10);
    $('#date').text('DATE: ' + readyDate);
    if (data === 'salesreport') {
        $.ajax({
            url: "./php/get_print_salesreport.php",
            method: "GET",
            data: {
                from: $('#month-start').val(),
                to: $('#month-end').val(),
                year: $('#year').val()
            },
            success: function (data) {
                data = data.trim();
                $("#fill_print").html(data);
            }
        });
    } else if (data === 'stockcount') {
        $.ajax({
            url: "./php/get_print_stockcount.php",
            method: "GET",
            success: function (data) {
                data = data.trim();
                $("#fill_print").html(data);
            }
        });
    } else if (data === 'productpopularity') {
        $.ajax({
            url: "./php/get_print_productpopularity.php",
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
        filename: 'SBM-Sales_Report.pdf',
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

function getDaysInMonth(year, month) {
    return new Date(year, month + 1, 0).getDate();
}

function generateMonthLabels() {
    var today = new Date();
    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var currentMonth = today.getMonth();
    var totalDaysInMonth = getDaysInMonth(today.getFullYear(), currentMonth);

    var labels = [];
    for (var i = 1; i <= today.getDate(); i++) {
        labels.push(monthNames[currentMonth] + " " + i);
    }

    return labels;
}

function createDynamicChart(data) {
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: generateMonthLabels(),
            datasets: [{
                label: "Earnings",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: data.data,
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: generateMonthLabels().length
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: Math.max(...data.data),
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });
}

function Product_Count(data) {
    var max = Math.max.apply(null, data);
    var ctx = document.getElementById("myBarChart");
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
                labels: ["Logo Seal", "Necklace", "Table Nameplate"],
                datasets: [{
                    label: "Items",
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
function ShowProductPopularity() {
    $.ajax({
        url: "./php/get_products_popularity.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            data = data.split(',').map(Number);
            ProductPopularityCount(data);
        }
    });
}
function ProductPopularityCount(data) {
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Logo Seal", "Necklace", "Table Nameplate"],
            datasets: [{
                data: data,
                backgroundColor: ['#4E73DF', '#1CC88A', '#36B9CC', '#F6C23E'], 
            }],
        },
    });
}
function ShowMaterialCount() {
    $.ajax({
        url: "./php/get_material.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            data = data.split(',').map(Number);
            MaterialCount(data);
        }
    });
}
function MaterialCount(data) {
    var max = Math.max.apply(null, data);
    var ctx = document.getElementById("myBarChart1");
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
                labels: ["Logo Seal", "Necklace", "Table Nameplate", "Other"],
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