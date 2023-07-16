function getStates(center) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            updateStatesSelect(response);
        }
    };
    xhr.open("GET", "./build/ajax/GettingProvincesInfo.php?work=getStates&center=" + center, true);
    xhr.send();
}

function updateStatesSelect(states) {
    var selectElement = document.getElementById("ostantahsili");
    selectElement.innerHTML = "";
    var option = document.createElement("option");
    option.text = 'انتخاب کنید';
    option.disabled = true;
    option.selected = true;
    selectElement.add(option);
    states.forEach(function (state) {
        var option = document.createElement("option");
        option.text = state;
        selectElement.add(option);
    });
}

function getCities(center, state) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            updateCitiesSelect(response);
        }
    };
    xhr.open("GET", "./build/ajax/GettingProvincesInfo.php?work=getCities&center=" + center + "&state=" + state, true);
    xhr.send();
}

function updateCitiesSelect(cities) {
    var selectElement = document.getElementById("shahrtahsili");
    selectElement.innerHTML = "";
    var option = document.createElement("option");
    option.text = 'انتخاب کنید';
    option.disabled = true;
    option.selected = true;
    selectElement.add(option);
    cities.forEach(function (city) {
        var option = document.createElement("option");
        option.text = city;
        selectElement.add(option);
    });
}

function getSchools(center, state, city) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            updateSchoolsSelect(response);
        }
    };
    xhr.open("GET", "./build/ajax/GettingProvincesInfo.php?work=getSchools&center=" + center + "&state=" + state + "&city=" + city, true);
    xhr.send();
}

function updateSchoolsSelect(schools) {
    var selectElement = document.getElementById("madresetahsili");
    selectElement.innerHTML = "";
    var option = document.createElement("option");
    option.text = 'انتخاب کنید';
    option.disabled = true;
    option.selected = true;
    selectElement.add(option);
    schools.forEach(function (school) {
        var option = document.createElement("option");
        option.text = school;
        selectElement.add(option);
    });
}

//Contact
document.getElementById('phone').oninput = function () {
    $.ajax({
        url: "./build/ajax/Signup_Users.php",
        type: "POST",
        data: {
            work: "phoneChange",
            value: phone.value,
            nationalCode: national_code.value,
        }
    });
}

document.getElementById('mobile').oninput = function () {
    $.ajax({
        url: "./build/ajax/Signup_Users.php",
        type: "POST",
        data: {
            work: "mobileChange",
            value: mobile.value,
            nationalCode: national_code.value,
        }
    });
}

document.getElementById('postal_code').oninput = function () {
    $.ajax({
        url: "./build/ajax/Signup_Users.php",
        type: "POST",
        data: {
            work: "postalcodeChange",
            value: postal_code.value,
            nationalCode: national_code.value,
        }
    });
}

document.getElementById('address').oninput = function () {
    $.ajax({
        url: "./build/ajax/Signup_Users.php",
        type: "POST",
        data: {
            work: "addressChange",
            value: address.value,
            nationalCode: national_code.value,
        }
    });
}

if (document.getElementById('contactSaveTo1')) {
    document.getElementById('contactSaveTo1').onclick = function () {
        $.ajax({
            url: "./build/ajax/Signup_Users.php",
            type: "POST",
            data: {
                work: "contactSaveTo1",
                value: 1,
                nationalCode: national_code.value,
            },
            success: function (response) {
                location.reload();
            }
        });
    }
}

if (document.getElementById('contactSaveTo0')) {
    document.getElementById('contactSaveTo0').onclick = function () {
        $.ajax({
            url: "./build/ajax/Signup_Users.php",
            type: "POST",
            data: {
                work: "contactSaveTo0",
                value: 0,
                nationalCode: national_code.value,
            },
            success: function (response) {
                location.reload();
            }
        });
    }
}

//Education
document.getElementById("namemarkaztahsili").onchange = function () {
    if (confirm('توجه داشته باشید که در صورت تغییر این مورد، باید تا فیلد مدرسه را انتخاب نمایید، سپس اطلاعات انتخاب شده پس از انتخاب مدرسه به صورت خودکار در سامانه ثبت خواهند شد.')) {
        getStates(this.value);
    }
};

document.getElementById("ostantahsili").onchange = function () {
    getCities(namemarkaztahsili.value, this.value);
};

document.getElementById("shahrtahsili").onchange = function () {
    getSchools(namemarkaztahsili.value, ostantahsili.value, this.value);
};

document.getElementById("madresetahsili").onchange = function () {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert('اطلاعات مدرسه با موفقیت تغییر یافت.');
        }
    };
    xhr.open("POST", "./build/ajax/GettingProvincesInfo.php?work=changeSchool&center=" + namemarkaztahsili.value + "&state=" + ostantahsili.value + "&city=" + shahrtahsili.value + "&school=" + this.value + "&userNationalCode=" + nationalcodeForInc.value, true);
    xhr.send();
};

document.getElementById('noetahsilhozavi').onchange=function (){
    $.ajax({
        url: "./build/ajax/Signup_Users.php",
        type: "POST",
        data: {
            work: "noetahsilhozaviChange",
            value: this.value,
            nationalCode: national_code.value,
        }
    });
}

if (document.getElementById("paye")) {
    document.getElementById("paye").onchange = function () {
        $.ajax({
            url: "./build/ajax/Signup_Users.php",
            type: "POST",
            data: {
                work: "changePaye",
                value: this.value,
                nationalCode: national_code.value,
            }
        });
    };
}

if (document.getElementById("term")) {
    document.getElementById("term").onchange = function () {
        $.ajax({
            url: "./build/ajax/Signup_Users.php",
            type: "POST",
            data: {
                work: "changeTerm",
                sath: sath.value,
                term: term.value,
                nationalCode: nationalcodeForInc.value
            },
            success: function (response) {
                console.log(response);
            }
        });
    };
}

if (document.getElementById("sath")) {
    document.getElementById('sath').onchange = function () {
        alert('برای تغییر سطح، حتما باید پایه را تغییر دهید. پس از تغییر پایه، اطلاعات وارد شده به صورت خودکار در سامانه ثبت خواهد شد.');
        var selectElement = document.getElementById("term");
        selectElement.innerHTML = "";
        var option = document.createElement("option");
        option.text = 'انتخاب کنید';
        option.disabled = true;
        option.selected = true;
        selectElement.add(option);

        switch (sath.value) {
            case '2':
                for (let i = 1; i <= 10; i++) {
                    option = document.createElement("option");
                    option.text = i;
                    selectElement.add(option);
                }
                break;
            case '3':
            case '4':
                for (let i = 1; i <= 6; i++) {
                    option = document.createElement("option");
                    option.text = i;
                    selectElement.add(option);
                }
        }
    }
}

document.getElementById('shparvandetahsili').oninput = function () {
    $.ajax({
        url: "./build/ajax/Signup_Users.php",
        type: "POST",
        data: {
            work: "shparvandetahsiliChange",
            value: shparvandetahsili.value,
            nationalCode: national_code.value,
        }
    });
}

document.getElementById('tahsilatghhozavi').onchange = function () {
    if (tahsilatghhozavi.value == 'دیپلم' || tahsilatghhozavi.value == 'زیر دیپلم') {
        $.ajax({
            url: "./build/ajax/Signup_Users.php",
            type: "POST",
            data: {
                work: "tahsilatghhozaviChange",
                tahsilatghhozavi: tahsilatghhozavi.value,
                nationalCode: national_code.value,
            }
        });
        reshtedaneshgahi.style.display = 'none';
    } else {
        reshtedaneshgahi.style.display = '';
        $.ajax({
            url: "./build/ajax/Signup_Users.php",
            type: "POST",
            data: {
                work: "tahsilatghhozaviChange",
                tahsilatghhozavi: tahsilatghhozavi.value,
                reshtedaneshgahi: reshtedaneshgahi.value,
                nationalCode: national_code.value,
            }
        });
    }
}

document.getElementById('reshtedaneshgahi').oninput = function () {
    $.ajax({
        url: "./build/ajax/Signup_Users.php",
        type: "POST",
        data: {
            work: "tahsilatghhozaviChange",
            tahsilatghhozavi: tahsilatghhozavi.value,
            reshtedaneshgahi: reshtedaneshgahi.value,
            nationalCode: national_code.value,
        }
    });
}

document.getElementById('markaztakhasosihozavi').onchange = function () {
    if (markaztakhasosihozavi.value == 'اشتغال ندارم' || markaztakhasosihozavi.value == null) {
        $.ajax({
            url: "./build/ajax/Signup_Users.php",
            type: "POST",
            data: {
                work: "markaztakhasosihozaviChange",
                markaztakhasosihozavi: markaztakhasosihozavi.value,
                nationalCode: national_code.value,
            }
        });
        reshtetakhasosihozavi.style.display = 'none';
    } else {
        $.ajax({
            url: "./build/ajax/Signup_Users.php",
            type: "POST",
            data: {
                work: "markaztakhasosihozaviChange",
                markaztakhasosihozavi: markaztakhasosihozavi.value,
                reshtetakhasosihozavi: reshtetakhasosihozavi.value,
                nationalCode: national_code.value,
            }
        });
        reshtetakhasosihozavi.style.display = '';
    }
}

document.getElementById('reshtetakhasosihozavi').oninput = function () {
    $.ajax({
        url: "./build/ajax/Signup_Users.php",
        type: "POST",
        data: {
            work: "markaztakhasosihozaviChange",
            markaztakhasosihozavi: markaztakhasosihozavi.value,
            reshtetakhasosihozavi: reshtetakhasosihozavi.value,
            nationalCode: national_code.value,
        }
    });
}

if (document.getElementById('educationalSaveTo1')) {
    document.getElementById('educationalSaveTo1').onclick = function () {
        $.ajax({
            url: "./build/ajax/Signup_Users.php",
            type: "POST",
            data: {
                work: "educationalSaveTo1",
                value: 1,
                nationalCode: national_code.value,
            },
            success: function (response) {
                location.reload();
            }
        });
    }
}

if (document.getElementById('educationalSaveTo0')) {
    document.getElementById('educationalSaveTo0').onclick = function () {
        $.ajax({
            url: "./build/ajax/Signup_Users.php",
            type: "POST",
            data: {
                work: "educationalSaveTo0",
                value: 0,
                nationalCode: national_code.value,
            },
            success: function (response) {
                location.reload();
            }
        });
    }
}