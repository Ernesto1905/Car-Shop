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
    
    	<b>Marka Ekle</b>
        <input type="text" name="brand_title" />
        <input type="submit" name="insert_brand" value="Ekle" />
    
    
    </form>
    
    <?php 
	include("includes/db.php");
	
	if(isset($_POST['insert_brand'])){
		
		
		$brand_title = $_POST['brand_title'];
		
		$insert_brand = "insert into brands (brand_title) values ('$brand_title')";
		
		$run_brand = mysqli_query($con, $insert_brand); 
		
		if($run_brand){
			
			echo "<script>alert('Marka eklendi')</script>";
			echo "<script>window.open('index.php?view_brands','_self')</script>";
			
			}
		
		
		}
	
	
	?> 
</body>
</html>