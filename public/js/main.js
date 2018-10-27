$(document).ready(function() {

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });






});

function goBack() {
    window.history.back();
}