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
function contactvlidation(val){
if (val.length!=10 && val!='') {
    alert("Mobile No. Should be 10 digit.");
    $('#contact_number').val('');
    setTimeout(function() {  $('#contact_number').focus();return false; }, 10);
    return false;
}
}
function ConfirmPassword(val){
if (val!=$('#password').val()) {
    alert('Password  and Confirm password Must Be Same.');
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
/
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
}*/

function contactfrom()
{
var contact_name=$('#contact_name').val();
var contact_number=$('#contact_number').val();
var contact_email=$('#contact_email').val();
var contact_from=$('.contact_from').val();
var contact_message=$('#contact_message').val();
var i=0;
if (contact_name=='' || contact_number=='' || contact_email=='' || contact_from=='' || contact_message=='') {
    var i=1;
}

if (i==1) {
    alert("Please fill all field");
    return false;
}

$.ajax({
dataType: "json",
type: 'GET',
url: "index.php?r=site/contact",
data: { contact_name: contact_name,contact_number:contact_number,contact_email:contact_email,contact_message:contact_message,contactfrom:contact_from, _crsf: "<?= $csrfToken?>"},
success:function(res) {
	alert(res);
    $('.closed a').click();
    window.location.href='javascript:void(0)';
}
});
}

function newsletter() {
    var news_email=$('#news_email').val();
    if (news_email=='') {
        alert("Please give your email id");
        return false;
    }
    else
    {
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(news_email)) {
        alert('Please provide a valid email address');
        setTimeout(function() {  $('#news_email').focus();return false; }, 10);
        return false;
     }
     else
     {
        $.ajax({
        dataType: "json",
        type: 'GET',
        url: "index.php?r=site/newsletter",
        data: { news_email: news_email,_crsf: "<?= $csrfToken?>"},
        success:function(res) {
            alert(res);
            $('#news_email').val('');
        }
        });
     }
     
    }
}

function checkemail(){
    var email = document.getElementById('contact_email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    setTimeout(function() {  $('#contact_email').focus();return false; }, 10);
    return false;
 }
}

function closestatus(jobid) {
    var r=confirm("Are you sure you want to close this Job?");
    if (r==true) {
        $.ajax({
dataType: "json",
type: 'GET',
url: "index.php?r=site/closestatus",
data: { jobid: jobid, _crsf: "<?= $csrfToken?>"},
success:function(res) {
	alert(res);
    location.reload();
}
});
    }
}

function removeskill(terms,termsid) {
    $('#loc'+termsid).remove();
    var skillid=$('#skillid').val();
    skillid=skillid.split(termsid+',').join('');
    $('#skillid').val(skillid);
    var skills=$('#skills').val();
    skills=skills.replace(terms+', ','');
    $('#skills').val(skills);
}


