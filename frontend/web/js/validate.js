function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode<48||unicode>57) //if not a number
{
if (unicode==8 || unicode==9){ //if the key isn't the backspace key (which we should allow)
}
else
{
return false //disable key press
}
}
}

function IsMobileno(val){
if (val.length!=10 && val!='') {
    alert("Mobile No. Should be 10 digit.");
    $('#MobileNo').val('');
    setTimeout(function() {  $('#MobileNo').focus();return false; }, 10);
    return false;
}
}

function yearvalidate(year,id) {
    if (year >= 1900 && year <= 2016) {
} else {
  alert(year + ' is an invalid year !');
  $('#'+id).val('');
}
}

function ConfirmPassword(val){
if (val!=$('#password').val()) {
    alert('Password Must Be Same.');
    $('#confirmpassword').val('');
    setTimeout(function() {  $('#confirmpassword').focus();return false; }, 10);
    return false
}
}
/*jQuery.noConflict();
jQuery(function(){
    jQuery('#uploadBtn').onchange(function(){
        if (jQuery(this).val()!='') {
        jQuery('#uploadFile').text(jQuery(this).val());
        }
        });
    });

document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").html = this.value;
};
*/
function CheckEmail(email) {
if (email!='') {
$.ajax({
dataType: "json",
type: 'GET',
url: "index.php?r=site/checkemail",
data: { email: email, _crsf: "<?= $csrfToken?>"},
success:function(res) {
    console.log(res);
	if(res=="NOTOK")
	{
        alert('EmailId Alredy exist.');
        $('#Email').val('');
        return false
	}
}
});
}
}