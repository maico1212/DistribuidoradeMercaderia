$(document).ready(function(){
    $("#login-btn").click(function(event){
    event.preventDefault();
    var user=$("#login-user").val();
    var pass=$("#login-pass").val();
    $.ajax({
            url: 'verif.php',
            type: 'POST',
            data:{user,pass},
            success: function(data){       
                if((data != 1)&&(data != 2))
                { 
                    $("#login").append(data).fadeIn();
                }
                else
                {

                    if(data==1)
                    {
                        window.location.href="main.php";
                    }
                    else{
                        if(data=2)
                        {
                            window.location.href="admin.php";
                        }
                    }
                                       
                } 
            }
        });   
    });  



   
});