<?php 
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

<style type="text/css">
th,tr{border:3px groove #000;}
table {border:2px solid #000;}


</style>
</head>

<body>
<?php 
if(isset($_GET['view_products'])){ ?>
	<table align="center" width="794" bgcolor="#FFCC99" border="2">
    	
        <tr align="center">
        	<td colspan="8"><h2>Ürünleri Gör</h2></td>
        </tr>
        
        <tr>
        	<th>Ürün No</th>
            <th>Adı</th>
            <th>Resim</th>
            <th>Fiyat</th>
            <th>Toplam Satılma</th>
            <th>Durum</th>
            <th>Düzenle</th>
            <th>Sil</th>
        </tr>
      <?php 
	  include("includes/db.php"); 
	  
	  $i=0;
	  
	  $get_pro = "select * from products";
	  
	  $run_pro = mysqli_query($con, $get_pro); 
	  
	  while($row_pro=mysqli_fetch_array($run_pro)){
		  
		  $p_id = $row_pro['product_id'];
		  $p_title = $row_pro['product_title'];
		  $p_img = $row_pro['product_img1'];
		  $p_price = $row_pro['product_price'];
		  $status = $row_pro['status'];
		  
		  $i++;
		  
		  
		  
	
	  ?>
      <tr align="center">
      		<td><?php echo $i; ?></td>
            <td><?php echo $p_title; ?></td>
            <td><img src="product_images/<?php echo $p_img; ?>" width="60" height="60"></td>
            <td><?php echo $p_price; ?></td>
            <td>
            <?php 
			$get_sold = "select * from pending_orders where product_id='$p_id'";
			
			$run_sold = mysqli_query($con,$get_sold);
			
			$count = mysqli_num_rows($run_sold);
			
			echo $count;
			
			?>
            </td>
            <td><?php echo $status; ?></td>
            <td><a href="index.php?edit_pro=<?php echo $p_id; ?>">Düzenle</a></td>
            <td><a href="delete_pro.php?delete_pro=<?php echo $p_id; ?>">Sil</a></td>
      </tr>
      <?php } ?>
        
        
        
     </table>
     <?php } ?>

</body>
</html>
<?php } ?>