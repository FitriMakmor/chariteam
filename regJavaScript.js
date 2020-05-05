//this fuction is to show password for Password
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

//this fuction is to show password for Repeat Password
function secFunction(){
    var a = document.getElementById("password2");
    var b = document.getElementById("hide3");
    var c = document.getElementById("hide4");

    if(a.type === "password"){
        a.type = "text";
        b.style.display = "block";
        c.style.display = "none";
    }else{
        a.type = "password";
        b.style.display = "none";
        c.style.display = "block";
    }
}


// this function is to validate the input 
function Validate() {

    if(document.getElementById("username").value == ""){
        alert("Username is required")
        return false;
     }

    if(document.getElementById("fullname").value == ""){
        alert("Full Name is required")
        return false;
    }

    if(document.getElementById("email").value == ""){
        alert("Email is required")
        return false;
    }

    if(document.getElementById("password").value == ""){
        alert("Password is required")
        return false;
    }

      // check if the two passwords match
    if (document.getElementById("password").value  != document.getElementById("password2").value ) {
        alert("The two passwords do not match")
        return false;
    }else{
        alert("Successfully register !!")
        return true;
    }

}