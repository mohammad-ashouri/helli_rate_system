document.getElementById("filesianati").addEventListener("change", DisplayButton);
document.getElementById("fileshora").addEventListener("change", DisplayButton);

function DisplayButton() {
    var fileshora = document.getElementById('fileshora').value;
    var filesianati = document.getElementById('filesianati').value;
    var top_button_paragraph = document.getElementById('top_button_paragraph').value;
    var Send = document.getElementById('Send');
    if (fileshora != '' && filesianati != '') {
        document.getElementById('Send').disabled = false;
        document.getElementById('Send').title = '';
        document.getElementById('top_button_paragraph').style.display = 'none';
    }
}
