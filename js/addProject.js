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