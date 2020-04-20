<?php
	$err = isset($err)?$err:'';
	if(isset($_SESSION['user_id']))
	{
		$sql = "SELECT * FROM tbl_user WHERE id=".$_SESSION['user_id'];
		$query = mysql_query($sql);
		$row = mysql_fetch_array($query);	
?>
<div class="contacts">
            <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
            	<legend>Profile</legend>
                <span id="err"><?php echo $err;?></span><br />
                
            	Name : <input name="name" type="text" id="name" class="long" value="<?php echo $row['name'];?>" />
                <br /><br />
                Telephone : <input name="tel" type="text" id="tel" value="<?php echo $row['telephone'];?>"/>
                <br /><br />
                Email : <input name="email" type="text" id="email" class="long" value="<?php echo $row['email'];?>"/>
                <br /><br />
                Address : <input name="address" type="text" id="address" class="long" value="<?php echo $row['address'];?>"/>
                <br /><br />

                Description : <input name="desc" type="text" id="desc" class="long" value="<?php echo $row['description'];?>"/>
                <br /><br />
                <?php if($row['logo']!=""){?>
                <span id="logol">Logo : <input name="logo" type="file" id="logo" /></span>
                <br /><br /><?php }?>
                
                <!--Username : <input name="username" type="text" id="username" class="long" />
                <br /><br />
                Password : <input name="password" type="password" id="password" class="long" />
                <br /><br />!-->
                <input name="pro" id="pro" type="button" value="Save" />
                
                <input type="hidden" name="mode" id="mode" />
            
         
            </fieldset>
            </form>
            
			</div>
<?php }?>