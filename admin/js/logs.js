$(document).ready(function() {
    FillInventory();
});
function FillInventory() {
    $.ajax({
        url: "./php/get_logs.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#logs_database").html(data);
            ShowInventory();
        }
    });
}
function ShowInventory() {
    const datatablesSimple = document.getElementById('logs_database');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
}