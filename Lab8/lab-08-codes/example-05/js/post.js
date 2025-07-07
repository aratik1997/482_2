$(document).ready(function () {
    $('#loadBtn').click(function () {
        $.post('select.php',{my_limit : '2'}, function (data, status) {
            $('#test').html(data);
            alert(status);
        });
    });
});