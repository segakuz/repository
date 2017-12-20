let dt = '19.12.2017';

var request = $.ajax({
    method: "POST",
    url: "servicer.php",
    data: {
        id: dt
    },
    dataType: "json"
});

request.done(function (msg) {
    $('#log').html(msg.header + "<img src=" + msg.img + ">" + msg.desc);
});

request.fail(function (jqXHR, textStatus) {
    alert('Request failed: ' + textStatus);
});
