<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Stylesheets
============================================= -->
<link rel="stylesheet" href="include/css.css" type="text/css" />
<!-- #stylesheets end -->
<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>    
    <!-- Document Title
	============================================= -->
	<title>Supplier System</title>
    <!-- document title end -->
<!-- SCRIPTS ============================================ -->
<?php include 'js/scripts.php';
include('include/updater.php');?>
<!-- scripts end -->
</head>

<body>
		<!-- Page Title
		============================================= -->
<div class="container">
<br />
				<span>Supplier System</span>
                
				<?php if(isset($_SESSION['logged']))
				{
					?>
                    <span id="menu">
                <a href="?p=login&out">Log Out</a>
                    <?php
					$sql = "SELECT * FROM tbl_menus WHERE type = '".$_SESSION['type']."' ORDER BY num DESC";
					$query = mysql_query($sql);
					if(mysql_num_rows($query)>0){
						while($row = mysql_fetch_array($query)){
							?>
                            <a href="?p=<?php echo $row['menu']?>"><?php echo ucfirst($row['menu'])?></a>
                            <?php
						}
					}
					?>
                
                
                <!--<?php if(isset($_SESSION['type'])&&$_SESSION['type']=='S'){?><a href="?p=product">Products</a><?php }?>
                <a href="?p=home">Home</a>!-->
                </span>
                <?php }?>
			</div>

		<!-- page-title end -->
        
        <!-- Content
		============================================= -->
<?php
	if(isset($_REQUEST['p'])&&$_REQUEST['p']!='')
	{
		include($_REQUEST['p'].'.php');
			
	}else{
	
		include('login.php');
		
	}
	?>		
			
		<!-- content end -->		

		<!-- Footer
		============================================= -->
		
<div class="footer">
				
			</div>

		<!-- footer end -->

</body>
</html>
