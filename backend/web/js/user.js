function Shortname()
{
        var StatAdd = document.getElementById('weighbridge-startingaddress').value.substring(0, 3);
        var EndAdd = document.getElementById('weighbridge-endingaddress').value.substring(0, 3);
        document.getElementById('weighbridge-shortcode').value = StatAdd+'-'+EndAdd;
}