<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Dükkanım</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
 
    <div class="main_wrapper">
     
    	<div class="header_wrapper">
            <a href="index.php"><img src="images/logo.gif" style="float:left;"></a>
            <img src="images/ad_banner.gif" style="float:right;">
        </div>
        
        <div id="navbar">
        	
            <ul id="menu">
        		<li><a href="index.php">Anasayfa</a></li>
                <li><a href="all_products.php">Ürünler</a></li>
                <li><a href="customer/my_account.php">Hesabım</a></li>
                <li><a href="customer_register.php">Kayıt Ol</a></li>
                <li><a href="cart.php">Alışveriş Sepeti</a></li>
        
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
            
            	<div id="sidebar_title">Kategoriler</div>
                
                <ul id="cats">
                	<?php getCats(); ?>
                    
                </ul>
                
                <div id="sidebar_title">Markalar</div>
                 
                 <ul id="cats">
                 
                 <?php getBrands(); ?>
                
            
            	</ul>
            </div>
            
            
        	<div id="right_content">
           
            <?php cart(); ?> 
            
            	<div id="headline">
                	<div id="headline_content">
                    	<?php 
                        if(!isset($_SESSION['customer_email']))
						{
							echo "<b>Hoşgeldiniz!</b> <b style='color:yellow'>Alışveriş Sepeti</b>";
							
							}
							else {
								echo "<b>Hoşgeldin:" . "<span style='color:skyblue'>" . $_SESSION['customer_email'] . "</span>" . "</b>" . "<b style='color:yellow'>Alışveriş Sepetin </b>";
								}
						?> 
                    	<span> - Ürünler: <?php items(); ?> - Fiyat: <?php total_price(); ?> - <a href="cart.php" style="color:#FF0;">Sepete Git</a>
                        
                        &nbsp; <?php 
                       
					   if(!isset($_SESSION['customer_email'])){
					    
						echo "<a href='checkout.php' style='color:#F93;'>Giriş</a>";
					   }
					   else {
						   echo "<a href='logout.php' style='color:#F93;'>Çıkış</a>";
						   }
						
						?>
                        </span>
                    </div>
                </div>
     
            <div id="products_box">
           <?php 
		   
		   getPro(); 
		   getCatPro();
		   getBrandPro();
		   
		   ?>
            </div>
            
            
            
            </div>
        
        
        </div>
        
        
        <div class="footer">
        

        
        </div>
    
    
    
    </div>

    
</body>
</html>