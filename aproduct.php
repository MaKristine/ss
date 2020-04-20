<?php
	$err = isset($err)?$err:'';
	$id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
	if(isset($_SESSION['user_id']))
	{
		if($id != ''){
		$sql = "SELECT * FROM tbl_products WHERE id=".$id;
		$query = mysql_query($sql);
		$row = mysql_fetch_array($query);	
		
		if(mysql_num_rows($query)>0)
		{
			$title = $row['title'];
			$desc = $row['description'];
			$price = $row['price'];
			$sku = $row['sku_num'];
			$qty = $row['qty'];
			$edt = $row['EDT'];
			$stock = $row['in_stock'];
			$img = $row['image'];
		}
		else{
			$title = '';
			$desc = '';
			$price = '';
			$sku = '';
			$qty = '';
			$edt = '';
			$stock = '';
			$img = '';	
		}
		}else{
			$title = '';
			$desc = '';
			$price = '';
			$sku = '';
			$qty = '';
			$edt = '';
			$stock = '';
			$img = '';	
		}
	}
?>
<div class="contacts">
            <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
            	<legend>Add / Edit Product</legend>
                <span id="err"><?php echo $err;?></span><br />
                
            	Title : <input name="title" type="text" id="title" class="long" value="<?php echo $title;?>" />
                <br /><br />
                Description : <input name="desc" type="text" id="desc" value="<?php echo $desc;?>" class="long"/>
                <br /><br />
                Price : <input name="price" type="text" id="price" value="<?php echo $price;?>"/>
                <br /><br />
                SKU number : <input name="sku" type="text" id="sku" value="<?php echo $sku;?>"/>
                <br /><br />

                Quantity : <input name="qty" type="text" id="qty" value="<?php echo $qty;?>"/>
                <br /><br />

                Estimated Delivery Time : <input name="edt" type="text" id="edt" value="<?php echo $edt;?>"/>
                <br /><br />

                In Stock : <input name="stock" type="text" id="stock" value="<?php echo $stock;?>"/>
                <br /><br />
                
                <span id="img">Image : <input name="img" type="file" id="img" /></span>
                <br /><br />
                
                <input name="apro" id="apro" type="button" value="Save" />
                
                <input type="hidden" name="mode" id="mode" />
            	<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
         
            </fieldset>
            </form>
            
			</div>