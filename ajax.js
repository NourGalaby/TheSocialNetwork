$(document).ready(function(){

    $('#e_mail').change(check_username); //use keyup,blur, or change
});

function check_username(){
   alert('here');
    var Emailaddress= $('#e_mail').val();
    jQuery.ajax({
            type: 'POST',
            url: 'CheckEmail.php',
            data: 'Email='+ Emailaddress,
            cache: false,
            success: function(response){
                if(response == 0){
                   alert('available')
                }
                else {
                     alert('not available')
                     //do perform other actions like displaying error messages etc.,
                }
            }
        });
}