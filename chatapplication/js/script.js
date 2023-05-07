(function($){
    jQuery(document).ready(function(){

        

        //sendmessage

        jQuery(".sendmessage").submit(function(){

            var message = jQuery("#textmessage").val();

            $.ajax({
                'url'           : 'chat.php',
                'type'          : 'POST',
                'data'          : {
                    'setmessage': '',
                    'message'   : message,
                },
                'success'       : function(){

                    jQuery("#textmessage").val('');
                }
                
            })
            return false;
        })



        //login form
        jQuery("#login").submit(function(){

            var email = jQuery("input[name='email']").val();
            var password = jQuery("input[name='password']").val();

            $.ajax({
                'url'       : 'login.php',
                'type'      : 'POST',
                'data'      : {
                    'login' : '',
                    'email' : email,
                    'password' : password,
                },
                'success'   : function(output){
                    jQuery(".form-control").val('');
                }
            })
        })


        //register from
        jQuery("#register").submit(function(){
            var firstname = jQuery("input[name='fname']").val();
            var lastname = jQuery("input[name='lname']").val();
            var email = jQuery("input[name='email']").val();
            var password = jQuery("input[name='password']").val();

            $.ajax({
                'url'       : 'register.php',
                'type'      : 'POST',
                'data'      : {
                    'register'  : 'set',
                    'firstname' : firstname,
                    'lastname'  : lastname,
                    'email'     : email,
                    'password'  : password,
                },
                'success'       : function(output){
                    jQuery(".text-success").html(output);
                    jQuery(".form-control").val('');
                }
            });
            return false;
        });


        //updatemessage
        setInterval(function () {
            
            $.ajax({
                'url'           : 'chat.php',
                'type'          : 'POST',
                'data'          :{
                    'updatemsg' : '',
                },
                'success'       : function(output){
                    jQuery(".chat-card").html(output);
                    jQuery('.text').last().addClass( "highlight" );
                }
            })

        }, 40);
        
    })
}(jQuery))