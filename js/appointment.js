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
// function senddoc(){
//     if(btnStatus == false){
//         alert("Select a Doctor to Book Appointment");
//     }
//     else{
//         window.location.assign("getappointment.php?did="+check);
//     }
// }