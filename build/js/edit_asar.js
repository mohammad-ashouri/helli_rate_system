function validatesearch() {
    let searchinput = document.getElementById("searchinput").value;
    if (searchinput == '' || searchinput == null) {
        alert("کد اثر را وارد کنید");
        return false;
    } else {
        return true;
    }
}

function validatepaziresh() {
    let nameasar = document.getElementById("nameasar").value;
    if (nameasar == '' || nameasar == null) {
        alert('نام اثر وارد نشده است');
        return false;
    } else {
        return true;
    }
}

$('#ostantahsili').change(function () {
    $.ajax({
        type: 'GET',
        url: 'build/ajax/Edit_Asar.php',
        data: {
            work: "getCities",
            province: $(this).val()
        },
        success: function (response) {
            var cities = JSON.parse(response);

            $("#shahrtahsili").html("");
            $("#madresetahsili").html("");
            for (var i = 0; i < cities.length; i++) {
                $("#shahrtahsili").append("<option value=\"" + cities[i] + "\">" + cities[i] + "</option>");
            }
        }, error: function () {
            alert('خطا در دریافت اطلاعات');
        }
    });
});

$('#shahrtahsili').change(function () {
    $.ajax({
        type: 'GET',
        url: 'build/ajax/Edit_Asar.php',
        data: {
            work: "getSchools",
            province: $('#ostantahsili').val(),
            city: $(this).val()
        },
        success: function (response) {
            var schools = JSON.parse(response);

            $("#madresetahsili").html("");
            for (var i = 0; i < schools.length; i++) {
                $("#madresetahsili").append("<option value=\"" + schools[i] + "\">" + schools[i] + "</option>");
            }
        }, error: function () {
            alert('خطا در دریافت اطلاعات');
        }
    });
});
$('#teaching_province').change(function () {
    $.ajax({
        type: 'GET',
        url: 'build/ajax/Edit_Asar.php',
        data: {
            work: "getCities",
            province: $(this).val()
        },
        success: function (response) {
            var cities = JSON.parse(response);

            $("#teaching_city").html("");
            $("#teaching_school").html("");
            for (var i = 0; i < cities.length; i++) {
                $("#teaching_city").append("<option value=\"" + cities[i] + "\">" + cities[i] + "</option>");
            }
        }, error: function () {
            alert('خطا در دریافت اطلاعات');
        }
    });
});

$('#teaching_city').change(function () {
    $.ajax({
        type: 'GET',
        url: 'build/ajax/Edit_Asar.php',
        data: {
            work: "getSchools",
            province: $('#teaching_province').val(),
            city: $(this).val()
        },
        success: function (response) {
            var schools = JSON.parse(response);

            $("#teaching_school").html("");
            for (var i = 0; i < schools.length; i++) {
                $("#teaching_school").append("<option value=\"" + schools[i] + "\">" + schools[i] + "</option>");
            }
        }, error: function () {
            alert('خطا در دریافت اطلاعات');
        }
    });
});