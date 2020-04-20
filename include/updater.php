<?php
include("config.php");
@$mode = $_REQUEST['mode'];

if($mode == 'log'){
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password'].CODE);

		$sql = "SELECT * FROM tbl_user WHERE username='".$username."' AND password = '".$password."'";
		$query = mysql_query($sql);
		
		if(mysql_num_rows($query)>0)
		{
			$row = mysql_fetch_array($query);
			//echo "Successfully Logged In.";
			
			$sqlup = "UPDATE tbl_user SET
								last_log = '".time()."'
								WHERE 
								id=".$row['id'];
						mysql_query($sqlup);
			
			$_SESSION['logged'] = 1;
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['type'] = $row['type'];
			$_SESSION['email'] = $row['email'];
		}else{
			echo "Access Denied.";
		}
}else if($mode == 'for'){
	
$username = $_REQUEST['username'];

		$sql = "SELECT * FROM tbl_user WHERE username='".$username."'";
		$query = mysql_query($sql);
		
		if(mysql_num_rows($query)>0)
		{
			$pass = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5);
			$sqlup = "UPDATE tbl_user SET
								password = '".md5($pass.CODE)."'
								WHERE 
								username=".$username;
						mysql_query($sqlup);
			//mail($email,'Reset Password',$txt,$headers);
			echo "Successfully Reseted Password. Please check Email.";
		}else{

			echo "Username not found.";
		
}	

}else if($mode == 'reg'){
	$type = $_REQUEST['type'];
	$name = $_REQUEST['name'];
	$tel = $_REQUEST['tel'];
	$email = $_REQUEST['email'];
	$address = $_REQUEST['address'];
	$desc = $_REQUEST['desc'];
	if(isset($_FILES['logo']['name']))$logo = $_FILES['logo']['name'];else $logo='';
	$username = $_REQUEST['username'];
	$password = md5($_REQUEST['password'].CODE);
	
	//if($type=='S'){
	 $sqlin = "INSERT INTO tbl_user
					(
					username,
					password,
					type,
					name,
					telephone,
					email,
					address,
					description,
					date_created,
					date_updated
					)
					VALUES
					(
					'".$username."',
					'".$password."',
					'".$type."',
					'".$name."',
					'".$tel."',
					'".$email."',
					'".$address."',
					'".$desc."',
					'".time()."',
					'".time()."'
					)";
					
			if(mysql_query($sqlin)){
				$id = mysql_insert_id();	
				if($logo != "")
				{
					$success = 0;
					$uploadedFile = '';
					
					//File upload path
					$uploadPath = 'uploads/logo/';
					$targetPath = $uploadPath . basename( $_FILES['logo']['name']);
				
					if(@move_uploaded_file($_FILES['logo']['tmp_name'], $targetPath)){
						$success = 1;
						$uploadedFile = $targetPath;
						
						$sqlup = "UPDATE tbl_user SET
								logo = '".$_FILES['logo']['name']."'
								WHERE 
								id=".$id;
						mysql_query($sqlup);
							
						
						//echo "Successfully Uploaded.";
					}
				}
			 	$err ="Successfully Registered. You can now login.";
			}
	//}
	
}else if($mode == 'pro'){
	$name = $_REQUEST['name'];
	$tel = $_REQUEST['tel'];
	$email = $_REQUEST['email'];
	$address = $_REQUEST['address'];
	$desc = $_REQUEST['desc'];
	if(isset($_FILES['logo']['name']))$logo = $_FILES['logo']['name'];else $logo='';
	//$username = $_REQUEST['username'];
	//$password = md5($_REQUEST['password'].CODE);
	
	//if($type=='S'){
	if($logo != "")
				{
					$success = 0;
					$uploadedFile = '';
					
					//File upload path
					$uploadPath = 'uploads/logo/';
					$targetPath = $uploadPath . basename( $_FILES['logo']['name']);
				
					if(@move_uploaded_file($_FILES['logo']['tmp_name'], $targetPath)){
						$success = 1;
						$uploadedFile = $targetPath;
						
						$sqlup = "UPDATE tbl_user SET
								logo = '".$_FILES['logo']['name']."'
								WHERE 
								id=".$id;
						mysql_query($sqlup);
							
					}
				}
	 $sqlup = "UPDATE tbl_user SET
								name = '".$name."',
								telephone = '".$tel."',
								email = '".$email."',
								address = '".$address."',
								description = '".$desc."'
								WHERE 
								id=".$_SESSION['user_id'];
											
			if(mysql_query($sqlup)){
			 	$err ="Successfully Updated.";
			}
	//}
	
}else if($mode == 'apro'){
	$id = $_REQUEST['id'];
	$title = $_REQUEST['title'];
	$desc = $_REQUEST['desc'];
	$price = $_REQUEST['price'];
	$sku_num = $_REQUEST['sku'];
	$qty = $_REQUEST['qty'];
	$edt = $_REQUEST['edt'];
	$stock = $_REQUEST['stock'];
	if(isset($_FILES['img']['name']))$img = $_FILES['img']['name'];else $img='';
	
	if($id =="")
	{
	$sqlin = "INSERT INTO tbl_products
					(
					title,
					description,
					price,
					sku_num,
					qty,
					EDT,
					in_stock,
					user_id,
					date_created,
					date_updated
					)
					VALUES
					(
					'".$title."',
					'".$desc."',
					'".$price."',
					'".$sku_num."',
					'".$qty."',
					'".$edt."',
					'".$stock."',
					'".$_SESSION['user_id']."',
					'".time()."',
					'".time()."'
					)";
					
			if(mysql_query($sqlin)){
				$id = mysql_insert_id();	
				if($img != "")
				{
					$success = 0;
					$uploadedFile = '';
					
					//File upload path
					$uploadPath = 'uploads/products/';
					$targetPath = $uploadPath . basename( $_FILES['img']['name']);
				
					if(@move_uploaded_file($_FILES['img']['tmp_name'], $targetPath)){
						$success = 1;
						$uploadedFile = $targetPath;
						
						$sqlup = "UPDATE tbl_products SET
								image = '".$_FILES['img']['name']."'
								WHERE 
								id=".$id;
						mysql_query($sqlup);
							
						
						//echo "Successfully Uploaded.";
					}
				}
			 	$err ="Successfully Added.";
			}
	}else{
		$sqlup = "UPDATE tbl_products SET
					title = '".$title."',
					description = '".$desc."',
					price = '".$price."',
					sku_num = '".$sku_num."',
					qty = '".$qty."',
					EDT = '".$edt."',
					in_stock = '".$stock."'
					WHERE id =".$id;
			if(mysql_query($sqlup)){
				$err = 'Successfully Updated.';
			}
	}
	
}else if($mode == 'del'){
	
$id = $_REQUEST['id'];

		$sql = "DELETE FROM tbl_products WHERE id='".$id."'";
		$query = mysql_query($sql);
		
		if($query)
		{
			//echo "Successfully Deleted.";
		}
}else if($mode == 'vpro'){
	$id = $_REQUEST['id'];
	$qty = $_REQUEST['qty'];
	
	$sql = "SELECT * FROM tbl_products WHERE id = ".$id;
	$query = mysql_query($sql);
	if(mysql_num_rows($query)>0){
		$row = mysql_fetch_array($query);
		$pro = $row['in_stock'];
	}else{
		$pro = 0;
	}
	
	$sql2 = "SELECT SUM(qty) as TOTAL FROM tbl_orders WHERE completed = 'N' AND product_id = ".$id;
	$query2 = mysql_query($sql2);
	if(mysql_num_rows($query2)>0){
		$row2 = mysql_fetch_array($query2);
		$or = $row2['TOTAL'];
	}else{
		$or = 0;
	}
	
	if(($pro>$or)&&($pro>=$qty)){
	$total = $row['in_stock']-1;
	$sqlin = "INSERT INTO tbl_orders
					(
					user_id,
					product_id,
					qty,
					date_created
					)
					VALUES
					(
					'".$_SESSION['user_id']."',
					'".$id."',
					'".$qty."',
					'".time()."'
					)";
		if(mysql_query($sqlin)){
			$sqlup = "UPDATE tbl_products SET
								in_stock = '".$total."'
								WHERE 
								id=".$id;
						mysql_query($sqlup);
						
			//SENDING EMAILS
			$headers =  "From: Admin <admin@sample.com> \r\n" .					
					"Reply-To: admin@sample.com \r\n" .					
					"MIME-Version: 1.0 " . "\r\n" .					
					"Content-type: text/html; charset=iso-8859-1" . "\r\n" . 					
					"X-Mailer: PHP/" . phpversion();
					
			$sqlu = "SELECT * FROM tbl_user WHERE id=".$row['user_id'];
			$queryu = mysql_query($sqlu);
			$rowu = mysql_fetch_array($queryu);
			
			$msg = 'Dear '.$rowu['name'].',

Order Notice
-------------------------

To ensure you are kept up-to-date, the following order/s requires your attention. 


Title			     : '.$row['title'].'
Price		         : '.$row['price'].'
Qty				     : '.$row['qty'].'
Date Ordered	     : '.date('F d, Y',$row['date_created']).'

';
			
			mail($rowu['email'],'ORDERS',$msg,$headers);
	
		}
	}else{
		echo 'No stock available.';
	}
	
}else if($mode == 'can'){
	
	$id = $_REQUEST['id'];
	$pid = $_REQUEST['pid'];
	
		$sql = "SELECT * FROM tbl_orders WHERE id=".$id;
		$query = mysql_query($sql);
		$row = mysql_fetch_array($query);
		
		$sql2 = "SELECT * FROM tbl_products WHERE id=".$pid;
		$query2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($query2);
		
		$total = $row2['in_stock']+$row['qty'];
		
		$sqlup = "UPDATE tbl_products SET
								in_stock = ".$total."
								WHERE 
								id=".$pid;
		if(mysql_query($sqlup))
		{
			$sql = "DELETE FROM tbl_orders WHERE id='".$id."'";
			$query = mysql_query($sql);
		}
}
else if($mode == 'com'){
	
	$id = $_REQUEST['id'];

		$sqlup = "UPDATE tbl_orders SET
								completed = 'Y',
								date_completed = ".time()."
								WHERE 
								id=".$id;
						mysql_query($sqlup);
}


?>