
window.onload = function () {
    setSelectedIndex();
};

function setSelectedIndex() {
    let selectedBox = document.getElementById('selectedBox');

    let url = window.location.href;
    url = url.split("/").pop();
    if (url == 'ratingsHighLow') {
        selectedBox.selectedIndex = 1;
    }
    else if (url == 'ratingsLowHigh') {
        selectedBox.selectedIndex = 2;
    }
    else if (url == 'reviews') {
        selectedBox.selectedIndex = 0;
    }
}

function setPageURL(selectedObj) {
    window.location = selectedObj.value;
}
