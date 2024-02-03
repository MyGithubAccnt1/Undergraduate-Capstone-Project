$(document).ready(function() {
    ShowOnlines();
    ShowPendings();
    ShowDelivered();
    ShowEarnings();
    ShowProducts();
    FillAccounts();
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
function FillAccounts() {
    $.ajax({
        url: "./php/get_accounts.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#account_database").html(data);
            ShowAccounts();
        }
    });
}
function ShowAccounts() {
    const datatablesSimple = document.getElementById('account_database');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);

        const columnWidths = ['40%', '20%', '10%', '10%', '20%'];
        const headers = datatablesSimple.querySelectorAll('th');

        headers.forEach((header, index) => {
            header.style.width = columnWidths[index];
        });
    }
}
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

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
                labels: ["Directory Markers", "Necklaces", "Pins", "Table Nameplates"],
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
