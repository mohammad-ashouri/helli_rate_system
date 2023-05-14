var state=false;
function showtoggle(){
    if(state){
        document.getElementById("password").setAttribute("type","password");
        document.getElementById("eye").setAttribute("class","fas fa-eye-slash");
        document.getElementById("eye").style.color="rgb(153,152,255)";
    }
    else {
        document.getElementById("password").setAttribute("type","text");
        document.getElementById("eye").setAttribute("class","fas fa-eye");
        document.getElementById("eye").style.color="rgb(87,25,255)";
        state=true;
    }
}