window.onload = function(){
    setSelectedIndex();
};

function setSelectedIndex(){
    let selectedBox = document.getElementById('selectedBox');

    let url = window.location.href;
    url = url.split("/").pop();
    console.log(url);
    if(url == 'hoog'){
        selectedBox.selectedIndex = 1;
    }
    else if(url == 'laag'){
        selectedBox.selectedIndex = 2;
    }
    else if(url == 'review'){
        selectedBox.selectedIndex = 0;
    }
}