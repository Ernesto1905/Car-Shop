<?php 
session_start();

if(!isset($_SESSION['admin_email']))
{
	
	echo "<script>window.open('login.php','_self')</script>";
	
	}
	
	else {


?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Başlıksız Belge</title>

<link rel="stylesheet" href="styles/style.css" media="all" />

</head>

<body>

<div class="wrapper">
	
    <a href="index.php"><div class="header"></div></a>
    
    <div class="right">
    	<h2>Yönet</h2>
    	<a href="index.php?insert_product">Ürün Ekle</a>
        <a href="index.php?view_products">Ürünleri Gör</a>
        <a href="index.php?insert_cat">Kategori Ekle</a>
        <a href="index.php?view_cats">Kategorileri Gör</a>
        <a href="index.php?insert_brand">Marka Ekle</a>
        <a href="index.php?view_brands">Markaları Gör</a>
        <a href="index.php?view_customers">Müşterileri Gör</a>
        <a href="index.php?view_orders">Siparişleri Gör</a>
        <a href="index.php?view_payments">Ödemeleri Gör</a>
        <a href="logout.php">Admin Çıkış</a>
    </div>
    
    <div class="left">
    
    <h2 style="color:red; text-align:center; padding:20px;"><?php echo @$_GET['logged_in']; ?></h2>
    <?php 
    include("includes/db.php"); 
	
	if(isset($_GET['insert_product'])){
		
		include("insert_product.php");
		
		}
		
		if(isset($_GET['view_products'])){
		
		include("view_products.php");
		
		}
		if(isset($_GET['edit_pro'])){
		
		include("edit_pro.php");
		
		}
		
		if(isset($_GET['insert_cat'])){
		
		include("insert_cat.php");
		
		}
    if(isset($_GET['view_cats'])){
		
		include("view_cats.php");
		
		}
		 if(isset($_GET['edit_cat'])){
		
		include("edit_cat.php");
		
		}
		if(isset($_GET['insert_brand'])){
		
		include("insert_brand.php");
		
		}
		
		if(isset($_GET['view_brands'])){
		
		include("view_brands.php");
		
		}    
		
		if(isset($_GET['edit_brand'])){
		
		include("edit_brand.php");
		
		}    
		if(isset($_GET['view_customers'])){
		
		include("view_customers.php");
		
		}    
		if(isset($_GET['view_orders'])){
		
		include("view_orders.php");
		
		}    
		if(isset($_GET['view_payments'])){
		
		include("view_payments.php");
		
		}    
	
	?>
    </div>


</div>

</body>
</html>

<?php } ?>