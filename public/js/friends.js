$(document).ready(function () {
    var userlist = document.getElementById("userList");
    var userlistSearch = document.getElementById("userListSearch");

    /**
     * idée afficher avec twig seulement les 10 premières recherches // système de page / ajax pour récup les autre données
     * mappé le retour sql en objet type User, récuperer 
    */

    $("#testfriends").on("input", function () {
        var val = $(this).val();
        if (val != '') {
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
                            htmlData += "    <td> " + user.roles + "</td>"
                            htmlData += "    <td>" + user.email + "</td>"
                            htmlData += "    <td>"
                            htmlData += "        <a href=\"/user/" + user.id + "/edit\" class=\"btn btn-sg btn-primary\" style=\"float: left; \">edit</a>"
                            htmlData += "        {{ include('user/_delete_form.html.twig') }}"
                            htmlData += "    </td>"
                            htmlData += "</tr>"
                        });
                        userlistSearch.innerHTML = htmlData;
                    } else {
                        console.log(Data.message);
                        userlistSearch.innerHTML = Data.message;
                    }
                }
            });
            userlist.classList.add('hidden-user-list');
            userlistSearch.classList.remove('hidden-user-list');
        } else {
            userlist.classList.remove('hidden-user-list');
            userlistSearch.classList.add('hidden-user-list');
        }
    });
});

