$(document).ready(function () {
    $("#testfriends").on("input", function () {
        var val = $(this).val();
        var userlist = $("#userList")
        var userlistSearch = $("#userListSearch")
        console.log(val);
        if (val != '') {
            userlist.userlist.classList.add('hidden-user-list');
            userlistSearch.userlist.classList.remove('hidden-user-list');
            $.ajax({
                method: "POST",
                url: $("#pathSearchUser").val(),
                data: { searchValue: val },
                success: function (Data) {
                    if (Data.code == 200) {
                        console.log(Data);
                        var htmlData = ""
                        Data.resultData.forEach(user => {
                            htmlData += "<tr>"
                            htmlData += "    <td>" + user.id + "</td>"
                            htmlData += "    <td>" + user.username + "</td>"
                            htmlData += "    <td>" + user.roles + "</td>"
                            htmlData += "    <td>" + user.email + "</td>"
                            htmlData += "    <td>"
                            htmlData += "        <a href=\"{ { path('user_edit', { 'id': " + user.id + " }) } } \" class=\"btn btn - sg btn - primary\" style=\"float: left; \">edit</a>"
                            htmlData += "        {{ include('user/_delete_form.html.twig') }}"
                            htmlData += "    </td>"
                            htmlData += "</tr>"
                        });
                        userlistSearch.innerHTML = htmlData;
                    } else {
                        userlistSearch.innerHTML = Data.message;
                    }
                }
            });
        } else {
            console.log("vide")
            userlist.classList.remove('hidden-user-list');
            userlistSearch.userlist.classList.add('hidden-user-list');
        }
    });
});

