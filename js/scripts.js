/**
 * проверка заполнения формы 
 */
function overify_message(f)
{
	if (f.username.value  =='')
	{
		alert ("Заполните имя пользователя!");
		return false;	
	}
				
if (f.message.value  =='')
	{
		alert ("Заполните текст сообщения!");
		return false;	
	}
			
	return true;   
}

function overify_login(f)
{
	if (f.login.value  =='')
	{
		alert ("Заполните логин!");
		return false;	
	}
				
if (f.pas.value  =='')
	{
		alert ("Заполните пароль!");
		return false;	
	}
			
	return true;   
}


            $.getScript('http://mindmup.github.io/bootstrap-wysiwyg/external/jquery.hotkeys.js',function(){
            $.getScript('http://mindmup.github.io/bootstrap-wysiwyg/bootstrap-wysiwyg.js',function(){

              $('#editor').wysiwyg();
              /*$('textarea').wysihtml5();*/
              $('#editor').cleanHtml();
       $('#submit-btn').click(function(){
            $('#hidden-editor').html(
                $("#editor").html()
            );
        });
//$('#editor').bind("DOMSubtreeModified",function(){
//                $('#hidden-editor').html(
//                        $("#editor").html()
//                );
//            });

            });
            });
/*$(document).ready(function(){ 
	$("#myForm").submit(function(){

				
		var str = $(this).serialize();
		
		$.ajax({
			   type: "POST",
			   url: "./send.php",
			   data: str,
			   success: function(msg){			   
					
			   }		
		 });
		return false;
	});

});*/