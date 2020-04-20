<?php
	$err = isset($err)?$err:'';
	
	$sql = "SELECT * FROM tbl_products WHERE user_id=".$_SESSION['user_id'];
	$query = mysql_query($sql);
?>
<div class="contacts">
            <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
            	<legend>Product</legend>
                <span id="err"><?php echo $err;?></span><br />
            	<a href="?p=aproduct"><input name="apro" id="apro" type="button" value="Add" /></a>
                <br /><br />
               
               <table border="1">
                          <thead>
                            <tr>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Price</th>
                              <th>SKU number</th>
                              <th>Quantity</th>
                              <th>Estimated Delivery Time</th>
                              <th>In Stock</th>
                              <th>&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
						  
						  if(mysql_num_rows($query)<1){?>
                          
                           <tr>
                              <td colspan="9" class="text-center">No products available</td>
                            </tr>
							  
						  <?php }else{
									while($row = mysql_fetch_array($query)){
							  ?>
                          
                            <tr>
                              <td>
                              <a href="uploads/products/<?php echo $row['image']?>" target="_blank">
                              	<img src="uploads/products/<?php echo $row['image']?>" width="70" height="20">
                              </a>
                              </td>
                              <td><?php echo $row['title']?></td>
                              <td><?php echo $row['description']?></td>
                              <td><?php echo $row['price']?></td>
                              <td><?php echo $row['sku_num']?></td>
                              <td><?php echo $row['qty']?></td>
                              <td><?php echo $row['EDT']?></td>
                              <td><?php echo $row['in_stock']?></td>
                              <td style="white-space:nowrap;"> <a href="#" onclick="del(<?php echo $row['id']?>)" class="del" id="del">
                                          <span class="icon"></span> &nbsp;
                                        </a>
                                        
                                 <a href="#" onclick="window.location = '?p=aproduct&id=<?php echo $row['id']?>';" class="edt" id="edt">
                                     <i aria-hidden="true"></i> &nbsp;
                                   </a>       
                               </td>
                            </tr>
                            
                          <?php }}?>
                          </tbody>
                        </table>

                            
            </fieldset>
            </form>
            
			</div>
