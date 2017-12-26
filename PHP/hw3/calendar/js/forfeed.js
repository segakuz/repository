$(function () {
    $("#btn").click(function () {
        var first_date = $("#first_date").val();
        var second_date = $("#second_date").val();

        var request = $.ajax({
            url: "handler_feed.php",
            method: "POST",
            data: {
                id: {feed_first_date: first_date, feed_second_date: second_date},
            },
            dataType: "json"
        });

        request.done(function (msg) {
            $("#event_list").html(msg);
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    });
});
