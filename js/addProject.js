//Set a limit to the starting and ending date depending on earlier choice
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

$(document).ready(function() {
    var msg="";
    var elements = document.getElementsByTagName("INPUT");
    
    for (var i = 0; i < elements.length; i++) {
       elements[i].oninvalid =function(e) {
            if (!e.target.validity.valid) {
            switch(e.target.id){
                case 'projectNameInput' : 
                e.target.setCustomValidity("Please insert the project name!");break;
                case 'startInput' : 
                e.target.setCustomValidity("Please specify the starting date!");break;
                case 'endInput' : 
                e.target.setCustomValidity("Please specify the ending date!");break;
                case 'summaryInput' : 
                e.target.setCustomValidity("Please insert the project summary!");break;
                case 'descriptionInput' : 
                e.target.setCustomValidity("Please insert the project description!");break;
                case 'projectImageForm' : 
                e.target.setCustomValidity("Please insert the project image!");break;
            default : e.target.setCustomValidity("");break;
    
            }
           }
        };
       elements[i].oninput = function(e) {
            e.target.setCustomValidity(msg);
        };
    } 
    })