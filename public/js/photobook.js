
window.onload = function () {
    setSelectedIndex();
    $('#selectBox').on('select2:select', function (e) {
    e.target.form.submit();
    });
};

function setSelectedIndex() {
    let selectLabel = document.getElementById('selectLabel');
    let selectBox = document.getElementById('selectBox');

    if (selectLabel.className == 'dateNew') {
        $('selectBox').val(1);
    }
    else if (selectLabel.className == 'dateOld') {
        $('selectBox').val(2);
    }
    else {
        $('selectBox').val(0);
    }
}
