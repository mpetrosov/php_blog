var lll;

function loadCategoryContent(event) {
    event.preventDefault();
    lll = event;
    var url = event.srcElement.href;
    var request = new XMLHttpRequest();
    request.open('GET', url, false);  // `false` makes the request synchronous
    request.send(null);
    if (request.status === 200) {
        document.getElementById('right').innerHTML = request.responseText;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    

    var categoryLinks = document.getElementsByClassName('category-link');
    for (var i = 0; i < categoryLinks.length; i++) {
        categoryLinks[i].addEventListener('click', loadCategoryContent, false);
    }

}, false);