// Change pages depending on page number
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
