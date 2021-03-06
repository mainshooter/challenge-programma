
window.onload = function () {
    setSelectedIndex();
    element = document.getElementById('selectBox').addEventListener('change', (e) => {
        e.target.form.submit();
    });
};

function setSelectedIndex() {
    let selectLabel = document.getElementById('selectLabel');
    let selectBox = document.getElementById('selectBox');

    if (selectLabel.className == 'highlow') {
        selectBox.selectedIndex = 1;
    }
    else if (selectLabel.className == 'lowhigh') {
        selectBox.selectedIndex = 2;
    }
    else {
        selectBox.selectedIndex = 0;
    }
}

// char remaining code
function updateCountdown() {
    let remaining = 140 - jQuery('.message').text().length;
    jQuery('.countdown').text(remaining + ' resterende tekens.');
}

jQuery(document).ready(function ($) {
    updateCountdown();
    $('.message').change(updateCountdown);
    $('.message').keyup(updateCountdown);
});
// end char remainign code