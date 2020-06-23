
  //delete row
  
  $(document).ready(function () {
    $('.del.fa.fa-trash').on('click', function () {
        projek = $(this).data("project");
        volunteer = $(this).data("vol");
        
        

        $('#removeModal').modal();
        
        // message="Are you sure you want to remove <b>"+name+"</b>?";
        // document.getElementById('message').innerHTML=message;

        input="document.location='scripts/remove-volunteer.php?vol="+volunteer+"&project="+projek+"'";
        document.getElementById('inside').setAttribute("onClick",input);

      });

});