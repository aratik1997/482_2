$(document).ready(function () {
    $('#live_search').keyup(function () {
    var name = $('#live_search').val();
    console.log(name);
    $.post("suggestion.php", {suggestion: name }, function (data, status) {
    $('#test').html(data);
    });
    });
    });