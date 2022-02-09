$(document).ready(function () {
    $("#testfriends").on("input", function () {
        console.log($(this).val());
        $("#result").text($(this).val());
    });
});