$(document)
    .ajaxStart(function () {
        document.getElementById('ajax_overlay').style.display = 'block';
    })
    .ajaxStop(function () {
        document.getElementById('ajax_overlay').style.display = 'none';
    });
