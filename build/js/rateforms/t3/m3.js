    function validateForm() {
    var t1 = document.forms["myform"]["t1"].style.backgroundColor="white";
    var t2 = document.forms["myform"]["t2"].style.backgroundColor="white";
    var t3 = document.forms["myform"]["t3"].style.backgroundColor="white";
    var t4 = document.forms["myform"]["t4"].style.backgroundColor="white";
    var t5 = document.forms["myform"]["t5"].style.backgroundColor="white";
    var t6 = document.forms["myform"]["t6"].style.backgroundColor="white";
    var t7 = document.forms["myform"]["t7"].style.backgroundColor="white";
    var t8 = document.forms["myform"]["t8"].style.backgroundColor="white";
    var t9 = document.forms["myform"]["t9"].style.backgroundColor="white";
    var t10 = document.forms["myform"]["t10"].style.backgroundColor="white";
    var t11 = document.forms["myform"]["t11"].style.backgroundColor="white";
    var t12 = document.forms["myform"]["t12"].style.backgroundColor="white";
    var t13 = document.forms["myform"]["t13"].style.backgroundColor="white";
    var t14 = document.forms["myform"]["t14"].style.backgroundColor="white";
    var t15 = document.forms["myform"]["t15"].style.backgroundColor="white";
    var t1 = document.forms["myform"]["t1"].value;
    var t2 = document.forms["myform"]["t2"].value;
    var t3 = document.forms["myform"]["t3"].value;
    var t4 = document.forms["myform"]["t4"].value;
    var t5 = document.forms["myform"]["t5"].value;
    var t6 = document.forms["myform"]["t6"].value;
    var t7 = document.forms["myform"]["t7"].value;
    var t8 = document.forms["myform"]["t8"].value;
    var t9 = document.forms["myform"]["t9"].value;
    var t10 = document.forms["myform"]["t10"].value;
    var t11 = document.forms["myform"]["t11"].value;
    var t12 = document.forms["myform"]["t12"].value;
    var t13 = document.forms["myform"]["t13"].value;
    var t14 = document.forms["myform"]["t14"].value;
    var t15 = document.forms["myform"]["t15"].value;
    var tosifi = document.forms["myform"]["tosifi"].value;
    var tosifilength = (document.forms["myform"]["tosifi"].value).length;


    if (t1 == ""){
    document.forms["myform"]["t1"].style.backgroundColor="yellow";
    alert("فیلد اول وارد نشده است");
    return false;
}
    else if (t2 == ""){
    document.forms["myform"]["t2"].style.backgroundColor="yellow";
    alert("فیلد دوم وارد نشده است");
    return false;
}
    else if (t3 == ""){
    document.forms["myform"]["t3"].style.backgroundColor="yellow";
    alert("فیلد سوم وارد نشده است");
    return false;
}
    else if (t4 == ""){
    document.forms["myform"]["t4"].style.backgroundColor="yellow";
    alert("فیلد چهارم وارد نشده است");
    return false;
}
    else if (t5 == ""){
    document.forms["myform"]["t5"].style.backgroundColor="yellow";
    alert("فیلد پنجم وارد نشده است");
    return false;
}
    else if (t6 == ""){
    document.forms["myform"]["t6"].style.backgroundColor="yellow";
    alert("فیلد ششم وارد نشده است");
    return false;
}
    else if (t7 == ""){
    document.forms["myform"]["t7"].style.backgroundColor="yellow";
    alert("فیلد هفتم وارد نشده است");
    return false;
}
    else if (t8 == ""){
    document.forms["myform"]["t8"].style.backgroundColor="yellow";
    alert("فیلد هشتم وارد نشده است");
    return false;
}
    else if (t9 == ""){
    document.forms["myform"]["t9"].style.backgroundColor="yellow";
    alert("فیلد نهم وارد نشده است");
    return false;
}
    else if (t10 == ""){
    document.forms["myform"]["t10"].style.backgroundColor="yellow";
    alert("فیلد دهم وارد نشده است");
    return false;
}
    else if (t11 == ""){
    document.forms["myform"]["t11"].style.backgroundColor="yellow";
    alert("فیلد یازدهم وارد نشده است");
    return false;
}
    else if (t12 == ""){
    document.forms["myform"]["t12"].style.backgroundColor="yellow";
    alert("فیلد دوازدهم وارد نشده است");
    return false;
}
    else if (t13 == ""){
    document.forms["myform"]["t13"].style.backgroundColor="yellow";
    alert("فیلد سیزدهم وارد نشده است");
    return false;
}
    else if (t14 == ""){
    document.forms["myform"]["t14"].style.backgroundColor="yellow";
    alert("فیلد چهاردهم وارد نشده است");
    return false;
}
    else if (t15 == ""){
    document.forms["myform"]["t15"].style.backgroundColor="yellow";
    alert("فیلد پانزدهم وارد نشده است");
    return false;
}
    if (t1 > 17){
    document.forms["myform"]["t1"].style.backgroundColor="yellow";
    alert("فیلد اول بیشتر از 17 وارد شده است");
    return false;
}
    else if (t2 > 5){
    document.forms["myform"]["t2"].style.backgroundColor="yellow";
    alert("فیلد دوم بیشتر از 5 وارد شده است");
    return false;
}
    else if (t3 > 5){
    document.forms["myform"]["t3"].style.backgroundColor="yellow";
    alert("فیلد سوم بیشتر از 5 وارد شده است");
    return false;
}
    else if (t4 > 7){
    document.forms["myform"]["t4"].style.backgroundColor="yellow";
    alert("فیلد چهارم بیشتر از 7 وارد شده است");
    return false;
}
    else if (t5 > 8){
    document.forms["myform"]["t5"].style.backgroundColor="yellow";
    alert("فیلد پنجم بیشتر از 8 وارد شده است");
    return false;
}
    else if (t6 > 3){
    document.forms["myform"]["t6"].style.backgroundColor="yellow";
    alert("فیلد ششم بیشتر از 3 وارد شده است");
    return false;
}
    else if (t7 > 7){
    document.forms["myform"]["t7"].style.backgroundColor="yellow";
    alert("فیلد هفتم بیشتر از 7 وارد شده است");
    return false;
}
    else if (t8 > 21){
    document.forms["myform"]["t8"].style.backgroundColor="yellow";
    alert("فیلد هشتم بیشتر از 21 است");
    return false;
}
    else if (t9 > 4){
    document.forms["myform"]["t9"].style.backgroundColor="yellow";
    alert("فیلد نهم بیشتر از 4 است");
    return false;
}
    else if (t10 > 5){
    document.forms["myform"]["t10"].style.backgroundColor="yellow";
    alert("فیلد دهم بیشتر از 5 است");
    return false;
}
    else if (t11 > 5){
    document.forms["myform"]["t11"].style.backgroundColor="yellow";
    alert("فیلد یازدهم بیشتر از 5 است");
    return false;
}
    else if (t12 > 4){
    document.forms["myform"]["t12"].style.backgroundColor="yellow";
    alert("فیلد دوازدهم بیشتر از 4 است");
    return false;
}
    else if (t13 > 5){
    document.forms["myform"]["t13"].style.backgroundColor="yellow";
    alert("فیلد سیزدهم بیشتر از 5 است");
    return false;
}
    else if (t14 > 4){
    document.forms["myform"]["t14"].style.backgroundColor="yellow";
    alert("فیلد چهاردهم بیشتر از 4 است");
    return false;
}
    else if (t15 > 5){
    document.forms["myform"]["t15"].style.backgroundColor="yellow";
    alert("فیلد پانزدهم بیشتر از 5 است");
    return false;
}
    else if (t1 < 0){
    document.forms["myform"]["t1"].style.backgroundColor="yellow";
    alert("فیلد اول کمتر از 0 وارد شده است");
    return false;
}
    else if (t2 < 0){
    document.forms["myform"]["t2"].style.backgroundColor="yellow";
    alert("فیلد دوم کمتر از 0 وارد شده است");
    return false;
}
    else if (t3 < 0){
    document.forms["myform"]["t3"].style.backgroundColor="yellow";
    alert("فیلد سوم کمتر از 0 وارد شده است");
    return false;
}
    else if (t4 < 0){
    document.forms["myform"]["t4"].style.backgroundColor="yellow";
    alert("فیلد چهارم کمتر از 0 وارد شده است");
    return false;
}
    else if (t5 < 0){
    document.forms["myform"]["t5"].style.backgroundColor="yellow";
    alert("فیلد پنجم کمتر از 0 وارد شده است");
    return false;
}
    else if (t6 < 0){
    document.forms["myform"]["t6"].style.backgroundColor="yellow";
    alert("فیلد ششم کمتر از 0 وارد شده است");
    return false;
}
    else if (t7 < 0){
    document.forms["myform"]["t7"].style.backgroundColor="yellow";
    alert("فیلد هفتم کمتر از 0 وارد شده است");
    return false;
}
    else if (t8 < 0){
    document.forms["myform"]["t8"].style.backgroundColor="yellow";
    alert("فیلد هشتم کمتر از 0 وارد شده است");
    return false;
}
    else if (t9 < 0){
    document.forms["myform"]["t9"].style.backgroundColor="yellow";
    alert("فیلد نهم کمتر از 0 وارد شده است");
    return false;
}
    else if (t10 < 0){
    document.forms["myform"]["t10"].style.backgroundColor="yellow";
    alert("فیلد دهم کمتر از 0 وارد شده است");
    return false;
}
    else if (t11 < 0){
    document.forms["myform"]["t11"].style.backgroundColor="yellow";
    alert("فیلد یازدهم کمتر از 0 وارد شده است");
    return false;
}
    else if (t12 < 0){
    document.forms["myform"]["t12"].style.backgroundColor="yellow";
    alert("فیلد دوازدهم کمتر از 0 وارد شده است");
    return false;
}
    else if (t13 < 0){
    document.forms["myform"]["t13"].style.backgroundColor="yellow";
    alert("فیلد سیزدهم کمتر از 0 وارد شده است");
    return false;
}
    else if (t14 < 0){
    document.forms["myform"]["t14"].style.backgroundColor="yellow";
    alert("فیلد چهاردهم کمتر از 0 وارد شده است");
    return false;
}
    else if (t15 < 0){
    document.forms["myform"]["t15"].style.backgroundColor="yellow";
    alert("نیازی به وارد کردن علامت - نیست");
    return false;
}
    else if (tosifi == ""){
    document.forms["myform"]["tosifi"].style.backgroundColor="yellow";
    alert("ارزشیابی توصیفی وارد نشده است");
    return false;
}
    else if (tosifilength<250){
    document.forms["myform"]["tosifi"].style.backgroundColor="yellow";
    alert("ارزشیابی توصیفی کمتر از 250 کاراکتر است");
    return false;
}
    else{
    return true;
}
}
    function calcular() {

    var t1 = parseFloat(document.getElementById('t1').value);
    var t2 = parseFloat(document.getElementById('t2').value);
    var t3 = parseFloat(document.getElementById('t3').value);
    var t4 = parseFloat(document.getElementById('t4').value);
    var t5 = parseFloat(document.getElementById('t5').value);
    var t6 = parseFloat(document.getElementById('t6').value);
    var t7 = parseFloat(document.getElementById('t7').value);
    var t8 = parseFloat(document.getElementById('t8').value);
    var t9 = parseFloat(document.getElementById('t9').value);
    var t10 = parseFloat(document.getElementById('t10').value);
    var t11= parseFloat(document.getElementById('t11').value);
    var t12 = parseFloat(document.getElementById('t12').value);
    var t13 = parseFloat(document.getElementById('t13').value);
    var t14= parseFloat(document.getElementById('t14').value);
    var t15 = parseFloat(document.getElementById('t15').value);
    if (isNaN(t1)){
    t1 = 0;
}
    if (isNaN(t2)){
    t2 = 0;
}
    if (isNaN(t3)){
    t3 = 0;
}
    if (isNaN(t4)){
    t4 = 0;
}
    if (isNaN(t5)){
    t5 = 0;
}
    if (isNaN(t6)){
    t6 = 0;
}
    if (isNaN(t7)){
    t7 = 0;
}
    if (isNaN(t8)){
    t8 = 0;
}
    if (isNaN(t9)){
    t9 = 0;
}
    if (isNaN(t10)){
    t10 = 0;
}
    if (isNaN(t11)){
    t11 = 0;
}
    if (isNaN(t12)){
    t12 = 0;
}
    if (isNaN(t13)){
    t13 = 0;
}
    if (isNaN(t14)){
    t14 = 0;
}
    if (isNaN(t15)){
    t15 = 0;
}


    document.getElementById('resultado').innerHTML = t1+t2+t3+t4+t5+t6+t7+t8+t9+t10+t11+t12+t13+t14-t15;
}
    function submitconfirm(){
        return confirm('کاربر گرامی: آیا از صحت اطلاعات وارد شده اطمینان دارید؟');
    }