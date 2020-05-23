window.onload = function () {
    setSelectedIndex();
    element = document.getElementById('selectBox').addEventListener('change', (e) => {
        e.target.form.submit();
    });
};

function setSelectedIndex() {
    let selectLabel = document.getElementById('selectLabel');
    let selectBox = document.getElementById('selectBox');

    if (selectLabel.className == 'dateNew') {
        selectBox.selectedIndex = 1;
    }
    else if (selectLabel.className == 'dateOld') {
        selectBox.selectedIndex = 2;
    }
    else {
        selectBox.selectedIndex = 0;
    }
}
