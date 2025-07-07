$(document).ready(function () {
    $('#loadBtn').click(function () {
        $.get('select.php?my_limit=1', function (data, status) {
            $('#test').html(data);
            alert(status);
        });
    });
});