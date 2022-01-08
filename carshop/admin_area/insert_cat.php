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
    
    	<b>Kategori Ekle</b>
        <input type="text" name="cat_title" />
        <input type="submit" name="insert_cat" value="Ekle" />
    
    
    </form>
    
    <?php 
	include("includes/db.php");
	
	if(isset($_POST['insert_cat'])){
		
		
		$cat_title = $_POST['cat_title'];
		
		$insert_cat = "insert into categories (cat_title) values ('$cat_title')";
		
		$run_cat = mysqli_query($con, $insert_cat); 
		
		if($run_cat){
			
			echo "<script>alert('Kategori Eklendi')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
			
			}
		
		
		}
	
	
	?> 
</body>
</html>