function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57) //if not a number
return false //disable key press
}
}

function IsMobileno(val){
if (val.length!=10) {
    alert("Mobile No. Should be 10 digit.");
    alert = function() {};
   alert("Mobile No. Should be 10 digit.");
    $('#MobileNo').val('');
    return false;
}
}

function ConfirmPassword(val){
if (val!=$('#password').val()) {
    alert('Password do not Match.');
    alert = function() {};
    alert('Password do not Match.');
    $('#confirmpassword').val('');
    return false
}
}