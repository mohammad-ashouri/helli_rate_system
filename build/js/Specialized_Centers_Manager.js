function searchInc() {
    $.ajax({
        url: "./build/ajax/SpecializedCentersManager.php",
        type: "GET",
        data: {
            work: "gettingResult",
        },
        success: function (response) {
            result.innerHTML = response;
            var deactiveButtons = document.querySelectorAll('#deactive');
            deactiveButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    $.ajax({
                        url: "./build/ajax/SpecializedCentersManager.php",
                        type: "POST",
                        data: {
                            work: "deactiveCenter",
                            center: this.value,
                        },
                        success: function (response) {
                            if (response === 'Done') {
                                searchInc();
                                alert('عملیات با موفقیت انجام شد.');
                            }
                        }
                    });
                });
            });

            var activeButtons = document.querySelectorAll('#active');
            activeButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    $.ajax({
                        url: "./build/ajax/SpecializedCentersManager.php",
                        type: "POST",
                        data: {
                            work: "activeCenter",
                            center: this.value,
                        },
                        success: function (response) {
                            if (response === 'Done') {
                                searchInc();
                                alert('عملیات با موفقیت انجام شد.');
                            }
                        }
                    });
                });
            });
        }
    });
}

document.getElementById('states').onchange = function () {
    $.ajax({
        url: "./build/ajax/SpecializedCentersManager.php",
        type: "GET",
        data: {
            work: "getCities",
            state: this.value
        },
        success: function (response) {
            var citiesSelect = document.getElementById("cities");
            citiesSelect.innerHTML = "";
            var defaultOption = new Option("انتخاب کنید", "");
            defaultOption.disabled = true;
            defaultOption.selected = true;
            citiesSelect.add(defaultOption);

            var cities = JSON.parse(response);
            cities.forEach(function (cities) {
                citiesSelect.add(new Option(cities, cities));
            });
        }
    });
}

document.getElementById('addCenter').onclick = function () {
    if (!states.value) {
        alert('استان انتخاب نشده است');
        return false;
    } else if (!cities.value) {
        alert('شهرستان انتخاب نشده است');
        return false;
    } else if (!center.value) {
        alert('نام مرکز وارد نشده است');
        return false;
    }  else if (confirm('آیا مطمئن هستید؟')) {
        $.ajax({
            url: "./build/ajax/SpecializedCentersManager.php",
            type: "POST",
            data: {
                work: "addCenter",
                state: states.value,
                city: cities.value,
                center: center.value,
            },
            success: function (response) {
                alert('مرکز با موفقیت اضافه شد.');
                center.value="";
                searchInc();
            }
        });
    }
}




document.getElementById('search').onclick = function () {
       searchInc();
}
