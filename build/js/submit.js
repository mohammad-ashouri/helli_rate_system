function SubmitFormData() {
    var codeasar = $("#ratercode").val();
    var coderater = $("#a_code").val();
    var a_name = $("#a_name").val();
    var a_file = $("#a_file").val();
    var registrar = $("#registrar").val();

    $.post("build/php/asar-for-rater-inc.php", { ratercode: ratercode, a_code: a_code, a_name: a_name, a_file: a_file, registrar: registrar,},
        function(data) {
            $('#results').html(data);
            $('#myForm')[0].reset();
        });
}