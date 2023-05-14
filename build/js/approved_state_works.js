document.getElementById('submit').addEventListener("submit", CheckValueOfSelect);

function CheckValueOfSelect() {
    var jashnvareh = document.getElementById('jashnvareh').value;
    if (jashnvareh == 'انتخاب کنید') {
        alert("لطفا جشنواره مورد نظر خود را انتخاب کنید");
        return false;
    } else {
        return true;
    }
}