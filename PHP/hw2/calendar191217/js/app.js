let dt = '019.12.2017';

var request = $.ajax({
    method: "POST",
    url: "servicer.php",
    data: {
        id: dt
    },
    dataType: "json"
});

/* первый способ 
request.done(function (msg) {
    $('#day-calendar').html("<h1>" + msg.date + "</h1>" + "<h2>" + msg.header + "</h2>" + "<img src=" + msg.img + ">" + "<p>" + msg.desc + "</p>");
});
*/
/* второй способ */
request.done(function (msg) {
    $('#day-calendar').html("<h1>" + msg[0] + "</h1>" + "<h2>" + msg[1] + "</h2>" + "<img src=" + msg[3] + ">" + "<p>" + msg[2] + "</p>");
});

request.fail(function (jqXHR, textStatus) {
    alert('Request failed: ' + textStatus);
});
/**/