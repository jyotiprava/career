jQuery(function($) {
var date = new Date();
date.setDate(date.getDate()-1);
$('.date-picker').datepicker({
                                        startDate: date,
					autoclose: true,
					todayHighlight: true
				});
$('.date-picker1').datepicker({
					autoclose: true,
					todayHighlight: true
				})
});	


function getallprice(vendorid) {
      window.location.href='?r=site/pricing&vendorid='+vendorid;
}

function same() {
           if($('#vendordetailform-same').prop("checked") == true){
                $('#vendordetails-permanentat').val($('#vendordetails-presentat').val());
                $('#vendordetails-permanentpo').val($('#vendordetails-presentpo').val());
                $('#vendordetails-permanentdist').val($('#vendordetails-presentdist').val());
                $('#vendordetails-permanentpinno').val($('#vendordetails-presentpinno').val());
            }
            else if($('#vendordetailform-same').prop("checked") == false){
                
            }
}

$(function(){
$('.NoVoucherdiv').hide();
$('.chk').click( function (){
    var $this = $(this);
    var val = $(this).val();
    //alert(val);
    if( $this.is(':checked') == true ) {
        if (val=='Cash') {
             $('.NoVoucherdiv').hide();
             $('#Voucherdiv').show(); 
        }else{
            $('.NoVoucherdiv').show();
            $('#Voucherdiv').hide(); 
        }
    }   
    });
 });

function vadidate() {

}

