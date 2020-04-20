<?php
	$err = isset($err)?$err:'';
?>
<div class="contacts">
            <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
            	<legend>Register</legend>
                <span id="err"><?php echo $err;?></span><br />
                Register As : <select name="type" id="type" onChange="selLogo(this.value);">
                <option value="S">Supplier</option>
                <option value="R">Retailer</option>
                </select>
                <br /><br />
            	Name : <input name="name" type="text" id="name" class="long" />
                <br /><br />
                Telephone : <input name="tel" type="text" id="tel" />
                <br /><br />
                Email : <input name="email" type="text" id="email" class="long" />
                <br /><br />
                Address : <input name="address" type="text" id="address" class="long" />
                <br /><br />

                Description : <input name="desc" type="text" id="desc" class="long" />
                <br /><br />
                
                <span id="logol" style="visibility:visible;">Logo : <input name="logo" type="file" id="logo" /></span>
                <br /><br />
                
                Username : <input name="username" type="text" id="username" class="long" />
                <br /><br />
                Password : <input name="password" type="password" id="password" class="long" />
                <br /><br />
                <input name="reg" id="reg" type="button" value="Register" />
                <a href="index.php"><input name="back" id="back" type="button" value="Back" /></a>
                <input type="hidden" name="mode" id="mode" />
            
         
            </fieldset>
            </form>
            
			</div>
