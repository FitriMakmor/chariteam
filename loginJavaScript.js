//this function is to show password
function myFunction(){
    var x = document.getElementById("password");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");

    if(x.type === "password"){
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
    }else{
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
    }
}

//intialise username and password
var objPeople = [
    {
        username: "syazwani" , password: "wani"
    },
    {
        username: "syahira" , password: "1234"
    },
    {
        username: "Anis" , password: "anis1999"
    }
]

//function to check whether username and password is correct or not
function getInfo(){
    var username = document.getElementById("name").value;
    var password = document.getElementById("password").value;

    for( i = 0 ; i < objPeople.length; i++){
        if(username == objPeople[i].username && password == objPeople[i].password){
            alert(username + " is logged in!!");
            return
        }
    }
    alert("incorrect username and password");
}
