<?php 
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
            
            	<div id="headline">
                	<div id="headline_content">
                    	<b>Hoşgeldiniz</b>
                    	<b style="color:yellow;">Alışveriş Sepeti</b>
                    	<span> - Ürünler: - Fiyat:</span>
                    </div>
                </div>
            
            <div id="products_box">
           <?php 
		   
		  $get_products = "select * from products";
				
				$run_products = mysqli_query($con, $get_products); 
				
				while ($row_products=mysqli_fetch_array($run_products)){
					
					$pro_id = $row_products['product_id'];
					$pro_title= $row_products['product_title'];
					$pro_desc = $row_products['product_desc'];
					$pro_price = $row_products['product_price'];
					$pro_image = $row_products['product_img1'];
					
					echo "
					<div id='single_product'>
					
					<h3>$pro_title</h3>
					
					<img src='admin_area/product_images/$pro_image' width='180' height='180' /><br>
					
					<p><b>Price:  ₺ $pro_price </b></p>
					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Detaylar</a>
					
					<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Sepete Ekle</button></a>
					
					</div>
					";
					
 
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