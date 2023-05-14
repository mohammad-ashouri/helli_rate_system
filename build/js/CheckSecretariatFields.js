function CheckFields() {
var fileshora=document.getElementById("fileshora");
var filesianati=document.getElementById("filesianati");
if (fileshora.value===''){
    alert ("فایل شورا انتخاب نشده است");
    return false;
}else if (filesianati===''){
    alert ("فایل صیانتی انتخاب نشده است");
    return false;
}else {
    return true;
}
}