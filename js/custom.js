function showPage(pageNum){
    var page = [];
    for(i=0;i<2;i++){
        page.push(document.getElementById("page"+(i+1)))
    }
    for(i=0;i<2;i++){
        if (page[i].id == pageNum){
            page[i].classList.remove("d-none");
            page[i].classList.add("d-flex");
        } else {
            page[i].classList.remove("d-flex");
            page[i].classList.add("d-none");
        }
        console.log("Page "+(i+1)+" "+page[i].classList);
    }

  // var x = document.getElementById("myDIV");
  // if (x.style.display === "none") {
  //   x.style.display = "block";
  // } else {
  //   x.style.display = "none";
  // }
}