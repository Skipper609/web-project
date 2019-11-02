var check = "";
var btnStatus = false;
function toggle(id){
    if(check!=""){
        if(check == id){
            var prev = document.getElementById(check);
            prev.style.backgroundColor = "#66ff33";
            check = "";
            btnStatus = false;
        }
        else{
            var prev = document.getElementById(check);
            prev.style.backgroundColor = "#66ff33";
            var now = document.getElementById(id);
            now.style.backgroundColor ="#d9d9d9";
            check = id;
            btnStatus = true
        }
    }
    else{
        var now = document.getElementById(id);
        now.style.backgroundColor ="#d9d9d9";
        check = id;
        btnStatus = true;
    }
    updateBtn();
}
function updateBtn(){
    var btn = document.getElementById("btn");
    if(btnStatus == true){
        btn.style.backgroundColor = "green";
    }
    else{
        btn.style.backgroundColor = "red";
    }
}
function sendtime(){
    if(btnStatus == false){
        alert("Select a time duration before Sending");
    }
    else{
        window.location.assign("confirmation.php?time="+check);
    }
}
var showthis = '';

function show(id){
    if(showthis === ''){
        document.getElementById(id).style.display="inherit";
        showthis = id;
    }
    else{
        document.getElementById(showthis).style.display = "none";
        document.getElementById(id).style.display="inherit";
        showthis = id;
    }
}