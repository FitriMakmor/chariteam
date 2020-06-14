//Start projects.php
function showPage(pageNum, size) {
    var page = [];
    for (i = 0; i < size; i++) {
        page.push(document.getElementById("page" + (i + 1)))
    }
    for (i = 0; i < size; i++) {
        if (page[i].id == pageNum) {
            page[i].classList.remove("d-none");
            page[i].classList.add("d-flex");
        } else {
            page[i].classList.remove("d-flex");
            page[i].classList.add("d-none");
        }
    }
}
//end projects.php

//Start addProject.html
var start = document.getElementById('startInput');
var end = document.getElementById('endInput');

start.addEventListener('change', function () {
    if (start.value)
        end.min = start.value;
}, false);
end.addEventListener('change', function () {
    if (end.value)
        start.max = end.value;
}, false);
//End addProject.html