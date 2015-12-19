function validate()
  {
 
    var em=e_mail.value;
    var passw=psw.value;
    var cpw=c_psw.value;
    
     
       alert(em);

       if(empty_check(em)==false )
      {
         window.alert('Error: Empty Email');
         return false;
      }


      if(passw.length==0)
      {
        window.alert('Error: Empty Password');
         return false;
      }

      else if(passw.length<1 || psw.length>14)
      {
        window.alert('Error: Check password length \nIt must be between 6 to 14 characters');
         return false;
      }

      if(passw.localeCompare(cpw)!=0)
      {
        window.alert('Error: Password does not match');
         return false;
      }
      
      
      else if(validate_email(em)==false)
        return false;
      

  }


  function empty_check(obj) 
 { 
    var flag=0;
    var i;
    if(obj.length==0)
    {
    	return false;
    }
 
    for( i=0; i<obj.length ; i++)
    {
    	  if(obj.charAt(i)!=' ')
    	  {
          flag=1;
          i=obj.length;
          }
    }
        
         if(flag==0)
         {
         return  false;
         }
 }
   
  
  function validate_email(email)
  {
    var filter = /^([a-zA-Z0-9]{1})+([a-zA-Z0-9_\.\-])+\@(([a-zA-Z\-])+\.)+([a-zA-Z]{2,4})+$/;

    if (!filter.test(email)) {
    alert('Error: Invalid email address');
    return false;}
  } 