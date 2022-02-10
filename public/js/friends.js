$(document).ready(function () {
    $("#testfriends").on("input", function () {
        var val = $(this).val();
        $.ajax({
            method: "POST",
            url: $("#pathSearchUser").val(),
            data: {searchValue: val},
            succes: function(resultData){
                console.log(JSON.parse(resultData));
                //$("#result").text($(this).val());
            }
        });
    });
});