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

document.getElementById("namemarkaztahsili").onchange = function () {
    if (confirm('توجه داشته باشید که در صورت تغییر این مورد، باید تا فیلد مدرسه را انتخاب نمایید، سپس اطلاعات انتخاب شده پس از انتخاب مدرسه به صورت خودکار در سامانه ثبت خواهند شد.')) {
        getStates(this.value);
    }
};

document.getElementById("ostantahsili").onchange = function () {
    getCities(namemarkaztahsili.value, this.value);
};

document.getElementById("shahrtahsili").onchange = function () {
    getSchools(namemarkaztahsili.value,ostantahsili.value, this.value);
};

document.getElementById("madresetahsili").onchange = function () {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert('اطلاعات مدرسه با موفقیت تغییر یافت.');
        }
    };
    xhr.open("POST", "./build/ajax/GettingProvincesInfo.php?work=changeSchool&center=" + namemarkaztahsili.value + "&state=" + ostantahsili.value + "&city=" + shahrtahsili.value + "&school=" + this.value+ "&userNationalCode=" + nationalcodeForInc.value, true);
    xhr.send();
};

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




