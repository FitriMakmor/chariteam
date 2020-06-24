//delete row
  
  $(document).ready(function () {
    $('.del.fa.fa-trash').on('click', function () {
        project = $(this).data("pro");
        volunteer = $(this).data("vol");
        
        $('#removeModal').modal();

        input="document.location='scripts/remove-volunteer.php?vol="+volunteer+"&pro="+project+"'";
        document.getElementById('confirmRemove').setAttribute("onClick",input);

      });

});