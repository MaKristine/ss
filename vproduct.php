<?php
if(isset($_SESSION['logged']))
{
	$sql = "SELECT * FROM tbl_products WHERE id = ".$_REQUEST['id'];
	$query = mysql_query($sql);
?>	
<?php
	$err = isset($err)?$err:'';
	$id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
	$order_id = isset($_REQUEST['o'])?$_REQUEST['o']:'';	
?>
<div class="contacts">
                <span id="err"><?php echo $err;?></span><br />
<?php 
	if(mysql_num_rows($query)>0){
	$row = mysql_fetch_array($query);
	?>
    <form action="" method="post" enctype="multipart/form-data">
    <div>
                        <img src="uploads/products/<?php echo $row['image'];?>" width="270px;" height="300px;">
                        <p><strong><?php echo $row['title']!=''?$row['title']:'No Title'?></strong></p>
                        <p><strong>$ <?php echo $row['price']>0?$row['price']:'0.00'?></strong></p>
                        <p><span>Details : <?php echo $row['description'];?></span></p>
                        <p><span>Estimated Delivery Time : <?php echo $row['EDT'];?></span></p>
                        
                        <?php 
					   if($order_id!=''){
						   $sqlo = "SELECT * FROM tbl_orders WHERE id=".$order_id;
						   $queryo = mysql_query($sqlo);
						   $rowo = mysql_fetch_array($queryo);
						   
						   ?>
                        <p><span>Quantity : <?php echo $rowo['qty']?></span></p>
                        <p><span>Date Ordered : <?php echo date('F d, Y',$rowo['date_created']);?></span></p>
                        <?php 
						if($rowo['completed']!='Y'){
							?>
                        <a href="#" onclick="com(<?php echo $order_id;?>);"><input name="com" id="com" type="button" value="Mark as Complete" /></a>
                        <a href="#" onclick="can(<?php echo $order_id;?>,<?php echo $id;?>);"><input name="can" id="can" type="button" value="Cancel Order"  /></a>   
                           <?php }else{
							   echo 'Orders Completed : '.date('F d, Y',$rowo['date_completed']);}
						   
						    }else{?>
                        <p><span>In Stock : <?php echo $row['in_stock'];?></span></p>
                        <p><span>Quantity : <input type="text" name="qty" id="qty" /></span></p>
                        
                        <input name="vpro" id="vpro" type="button" value="Order Now" />
                        <?php }?>
                
                <input type="hidden" name="mode" id="mode" />
            	<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id;?>" />
															</div></form>
<?php
	}else{
		echo '<div class="contacts">';
		echo 'No preview Available.';
		echo '</div>';
	}
}
?>
</div>