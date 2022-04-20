$(function () {
    $(".user").hover(function () {
        $("#option-user").css({ "height": "10rem", "display": "block", "visibility": "visible" });
    }, function () {
        $("#option-user").css({ "height": "", "display": "", "visibility": "" });
    });
});
