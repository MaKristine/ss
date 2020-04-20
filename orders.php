<?php
if(isset($_SESSION['logged']))
{
	$sql = "SELECT * FROM tbl_orders WHERE user_id = ".$_SESSION['user_id'];
	$query = mysql_query($sql);
?>	
<div class="contacts">
<?php 
	if(mysql_num_rows($query)>0){
		?>
        <table border="1">
                          <thead>
                            <tr>
                              <th>Title</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Status</th>
                              <th>&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
        <?php
	while ($row = mysql_fetch_array($query)){
		$sql2 = "SELECT * FROM tbl_products WHERE id=".$row['product_id'];
		$query2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($query2);
	?>
    <tr>
          <td><?php echo $row2['title']!=''?$row2['title']:'No Title'?></td>
          <td><?php echo $row2['price']!=''?$row2['price'].'.00':'0.00'?></td>
          <td><?php echo $row['qty']!=''?$row['qty']:'0'?></td>
          <td><?php echo $row['completed']!='N'?'Completed':'Not Completed'?></td>
          <td style="white-space:nowrap;">
                                 <a href="?p=vproduct&id=<?php echo $row['product_id']?>&o=<?php echo $row['id']?>" class="edt" id="edt">
                                     <i aria-hidden="true"></i> &nbsp;
                                   </a>       
                               </td>
    </tr>
    

<?php	}
?>
</tbody></table></div>
<?php
	}else{
		echo '<div class="contacts">';
		echo 'No orders Available.';
		echo '</div>';
	}
}
?>