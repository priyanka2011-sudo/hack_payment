
function emailvalidation()
{
    var input = document.form.email.value;
    var atsign = input.indexOf("@");
    var dotsign = input.lastIndexOf(".");

    while (input != null || input.length > 5)
    {
    if(atsign < 1 || dotsign < atsign + 2 || dotsign + 2 >= input.length)
    {
        alert("Email not valid");
        return false;
    }          
    else
        return true;
    }        

}

 
function isValid()
{
    var flag = true;
    flag &= emailvalidation();
    if (flag)   
        return true;    
    else   
        return false;
   

} 