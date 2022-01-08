 <?php 
	include("includes/db.php");
	
	if(isset($_GET['edit_brand'])){
		
		
		$brand_id = $_GET['edit_brand'];
		
		$edit_brand = "select * from brands where brand_id='$brand_id'";
		
		$run_brand = mysqli_query($con, $edit_brand); 
		
		$row_brand=mysqli_fetch_array($run_brand);
		
		$brand_edit_id = $row_brand['brand_id'];
		$brand_title = $row_brand['brand_title'];
	}
	?> 
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Başlıksız Belge</title>
<style type="text/css">

form{margin:15%;}

</style>
</head>

<body>

	<form action="" method="post">
    
    	<b>Markayı Düzenle</b>
        <input type="text" name="brand_title1" value="<?php echo $brand_title; ?>"/>
        <input type="submit" name="update_brand" value="Güncelle" />
    
    
    </form>
    
  
</body>
</html>
<?php 
	if(isset($_POST['update_brand'])){
		
		
		$brand_title123 = $_POST['brand_title1'];
	
		$update_brand = "update brands set brand_title='$brand_title123' where brand_id='$brand_edit_id'";
		
		$run_update = mysqli_query($con, $update_brand);
		
		if($run_update){
			
			echo "<script>alert('Marka Silindi')</script>";
			echo "<script>window.open('index.php?view_brands','_self')</script>";
			
			}
		
		
		
		
		}


?>




