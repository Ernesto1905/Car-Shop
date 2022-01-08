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
        <!--Navagation Bar Ends-->
       
       
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
                    	<b>Hoşgeldiniz</b>
                    	<b style="color:yellow;">Alışveriş Sepeti</b>
                    	<span> - Ürünler: <?php items(); ?> - Fiyat: <?php total_price(); ?> - <a href="cart.php" style="color:#FF0;">Sepete Git</a>
                        <?php 
                       
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
     
            <div>
           
		   <form action="customer_register.php" method="post" enctype="multipart/form-data" /> 
           
           	<table width="750" align="center">
            	<tr align="center">
                	<td colspan="5"><h2>Hesap Oluştur</h2></td>
                </tr>
                
                <tr>
                	<td align="right"><b>Müşteri Ad:</b></td>
                    <td><input type="text" name="c_name" required /></td>
                </tr>
                
                <tr>
                	<td align="right"><b>Müşteri Email:</b></td>
                    <td><input type="text" name="c_email" required /></td>
                </tr>
                
                <tr>
                	<td align="right"><b>Müşteri Şifre:</b></td>
                    <td><input type="password" name="c_pass" required /></td>
                </tr>
                
                <tr>
                	<td align="right"><b>Müşteri Ülke:</b></td>
                    <td>
                    <select name="c_country">
                    	<option>Ülke Seç</option>
                       <option>Türkiye</option>
                            <option>Pakistan</option>
                            <option>Hindistan</option>
                            <option>İran</option>
                            <option>Birleşik Milletler</option>
                            <option>Arabistan</option>
                            <option>Birleşik Arap Emirlikleri</option>
                            <option>Japonya</option>
                            <option>Azerbaycan</option>
                    
                    </select>
                    </td>
                </tr>
                
                <tr>
                	<td align="right"><b>Müşteri Şehir:</b></td>
                    <td><input type="text" name="c_city" required /></td>
                </tr>
                
                <tr>
                	<td align="right"><b>Müşteri Telefon no:</b></td>
                    <td><input type="text" name="c_contact" required /></td>
                </tr>
                
                <tr>
                	<td align="right"><b>Müşteri Adres:</b></td>
                    <td><input type="text" name="c_address" required /></td>
                </tr>
                
                <tr>
                	<td align="right"><b>Müşteri Resim:</b></td>
                    <td><input type="file" name="c_image" required /></td>
                </tr>
            
            <tr align="center">
            	<td colspan="5"><input type="submit" name="register" value="Gönder" /></td>
            </tr>
            
            
            
            </table>
           
           
           </form>
		   
            </div>
            
            
            
            </div>
        
        
        </div>
        
        
        <div class="footer">        
         
        </div>
    
    
    
    </div>
    
</body>
</html>
<?php 
	if(isset($_POST['register'])){
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		
		$c_ip = getRealIpAddr();
		
		$insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
		
		$run_customer = mysqli_query($con,$insert_customer); 
		
		move_uploaded_file($c_image_tmp,"customer/customer_photos/$c_image");
		
	$sel_cart = "select * from cart where ip_add='$c_ip'";
	
	$run_cart = mysqli_query($con, $sel_cart); 
	
	$check_cart = mysqli_num_rows($run_cart); 
	
	if($check_cart>0){
		
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('Hesabınız oluşturuldu!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
		else {
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('Hesabınız oluşturuldu!')</script>";
			echo "<script>window.open('index.php','_self')</script>";
			
			}
		
		
		}



?>	






