/*

function login() {

    var hid=document.getElementById('login_hidden');
    if(hid.style.display=="block"){
        hid.style.display="none";
    }
    else{
        hid.style.display="block";
    }



}
var log = document.getElementById('login');
var errors = document.getElementById('login_errors');
log.addEventListener('submit',function (e) {
    e.preventDefault();

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    console.log(email);
    console.log(password);
    if(email !== "" && password !== "" ){
                window.location.href = "account.php";
    }
    else{
            errors.textContent = "Fill all the fields";
    }

})
*/
var friend = document.getElementById('friend');
friend.addEventListener('click',function () {
    friend.innerText="send";
friend.disabled='disabled';
    window.location.href = "index.php?page=account&action=get&send="+get;
})
