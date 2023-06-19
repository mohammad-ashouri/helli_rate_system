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

function searchInspecializedCentersInfo() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInTable");
    filter = input.value.toUpperCase();
    table = document.getElementById("specializedCentersInfo");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
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

