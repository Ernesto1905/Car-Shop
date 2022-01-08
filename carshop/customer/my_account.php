<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8_encode">
<title>Dükkanım</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
	
    
    <div class="main_wrapper">
    	
       
    	<div class="header_wrapper">
            
        </div>
        
        <div id="navbar">
        	
            <ul id="menu">
        		<li><a href="../index.php">Anasayfa</a></li>
                <li><a href="../all_products.php">Ürünler</a></li>
                <li><a href="my_account.php">Hesabım</a></li>
                <?php 
				if(isset($_SESSION['customer_email'])){
					
                echo "<span style='display:none;'><li><a href='../customer_register.php'>Kayıt Ol</a></li></span>";
				
				}
				
				else {
					
					echo "<li><a href='../customer_register.php'>Kayıt Ol</a></li>";
					
					}
          
				?>
                <li><a href="../cart.php">Alışveriş Sepeti</a></li>
        
        	</ul>
            
             <div id="form">
             	<form method="get" action="results.php" enctype="multipart/form-data">
                	
                    <input type="text" name="user_query" placeholder="Ürün Ara"/>
                    <input type="submit" name="search" value="Ara" />
                    
                </form>
            </div>
            
        </div>   
       
       
        <div class="content_wrapper">
        	
            <div id="left_sidebar">
            
            	<div id="sidebar_title">Hesabı Yönet:</div>
                
                <ul id="cats">
                	<?php 
						if(isset($_SESSION['customer_email'])){
						$customer_session = @$_SESSION['customer_email'];
						
						$get_customer_pic = "select * from customers where customer_email='$customer_session'";
						
						$run_customer = mysqli_query($con, $get_customer_pic); 
						
						$row_customer = mysqli_fetch_array($run_customer); 
						
						$customer_pic = $row_customer['customer_image'];
						
						echo "<img src='customer_photos/$customer_pic' width='150' height='150'>";
					}
					?>
					<li><a href="my_account.php?my_orders">Siparişlerim</a></li>
                    <li><a href="my_account.php?edit_account">Hesabı Güncelle</a></li>
                    <li><a href="my_account.php?change_pass">Şifre Değiştir</a></li>
                    <li><a href="my_account.php?delete_account">Hesabı Sil</a></li>
                    <li><a href="logout.php">Çıkış</a></li>
                    
                </ul>
            </div>
            
            
        	<div id="right_content">
           
            <?php cart(); ?> 
            
            	<div id="headline">
                	<div id="headline_content">
                    	<?php 
						if(isset($_SESSION['customer_email'])){
							
							echo "<b>Hoşgeldin:" . "</b> &nbsp;" . "<b style='color:yellow;'>" . $_SESSION['customer_email'] . "</b>";
							
							
							}
						
						
						?>
                        
                         <?php 
                       
					   if(!isset($_SESSION['customer_email'])){
					    
						echo "<a href='../checkout.php' style='color:#F93;'>Giriş</a>";
					   }
					   else {
						   echo "<a href='logout.php' style='color:#F93;'>Çıkış</a>";
						   }
						
						?>
                        </span>
                    </div>
                </div>
     
            <div>
           
        
           
           <?php getDefault(); ?>
           
           <?php
		   if(isset($_GET['my_orders']))
		   
		   {
			   include("my_orders.php");
			   
			   
			   }
			   
			   if(isset($_GET['edit_account']))
		   
		   {
			   include("edit_account.php");
			   
			   
			   }
			   
			    if(isset($_GET['change_pass']))
		   
		   {
			   include("change_pass.php");
			   
			   
			   }
			   
			    if(isset($_GET['delete_account']))
		   
		   {
			   include("delete_account.php");
			   
			   
			   }
		   
		   
		   
		   ?>
           
           
            </div>
            
            
            
            </div>
        
        
        </div>
        
        
        <div class="footer">
        
   
        
        </div>
    
    
    
    </div>

    
</body>
</html>