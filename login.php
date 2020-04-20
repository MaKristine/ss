<?php
	if(isset($_REQUEST['out']))
	{
		session_destroy();
	}
	
?>

<div class="contacts">
            <form action="" method="post" enctype="multipart/form-data">
            <fieldset class="log">
            	<legend>Log In</legend>
                <span id="err"></span><br />
            	Username : <input name="username" type="text" id="username" />
                <br /><br />
                Password : <input name="password" type="password" id="password" />
                <br />
                <input name="selCon" id="selCon" type="hidden" value="" />
                <input name="selId" id="selId" type="hidden" value="" />
            	<input name="login" id="login" type="button" value="Log In" />
                 <a href="?p=register">Register</a> | <a href="?p=reset">Forgot Password</a>
         
            </fieldset>
            </form>
            
			</div>
