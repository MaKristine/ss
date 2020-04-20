<?php
if(isset($_SESSION['logged']))
{
	if(isset($s)){
		$arg = 'WHERE title LIKE "%'.$s.'%"';
		$s = $s;	
	}else{
		$arg = 'WHERE 1=1';	
		$s='';
	}
	$sql = "SELECT * FROM tbl_products ".$arg." ORDER BY title";
	$query = mysql_query($sql);
?>	
<div class="contacts">
Search : <input name="name" type="text" id="name" class="long" onkeyup="searchs();" /><br /><br />
<div id="divall">
<?php 
	if(mysql_num_rows($query)>0){
	while ($row = mysql_fetch_array($query)){
	?>
    
    <div id="prods">
                        <a href="?p=vproduct&id=<?php echo $row['id']?>"><img src="uploads/products/<?php echo $row['image'];?>" width="270px;" height="300px;"></a>
                        <p><strong><?php echo $row['title']!=''?$row['title']:'No Title'?></strong></p>
                        <p><strong>$ <?php echo $row['price']>0?$row['price']:'0.00'?></strong></p>
                        <p><span><a href="?p=vproduct&id=<?php echo $row['id']?>">Order Now</a></span></p>
															</div>
<?php	} echo '</div>';
	}else{
		echo '<div class="contacts">';
		echo 'No products Available.';
		echo '</div>';
	}
}
?>
</div>