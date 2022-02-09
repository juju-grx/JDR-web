function showOption(){
    var option_user = document.getElementById("option-user")
    option_user.classList.remove('hidden-option-user')
    option_user.classList.remove('OnLoadHidden')
    option_user.classList.add('show-option-user')
}

function hiddenOptionUser(){
    var option_user = document.getElementById("option-user")
    option_user.classList.remove('show-option-user')
    option_user.classList.add('hidden-option-user')
}