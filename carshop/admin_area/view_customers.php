<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Başlıksız Belge</title>
<style type="text/css">

th,tr{border:3px groove #333;}

</style>
</head>

<body>

	<table width="794" align="center" bgcolor="#FFCC99" border="2">
    
    	<tr align="center">
        	<td colspan="6"><h2>Müşterileri Gör</h2></td>
        </tr>
    	
        <tr align="center">
        	<th>S.N</th>
            <th>İsim</th>
            <th>Email</th>
            <th>Resim</th>
            <th>Ülke</th>
            <th>Sil</th>
        </tr>
    	<?php 
		include("includes/db.php");
		
		$get_c = "select * from customers";
		$run_c = mysqli_query($con, $get_c); 
		
		$i=0;
		
		while($row_c=mysqli_fetch_array($run_c)){
			
			
			$c_id = $row_c['customer_id'];
			$c_name = $row_c['customer_name'];
			$c_email = $row_c['customer_email'];
			$c_image = $row_c['customer_image'];
			$c_country = $row_c['customer_country'];
			
			$i++;
			
		
		
		?>
        <tr align="center">
        	<td><?php echo $i; ?></td>
            <td><?php echo $c_name; ?></td>
            <td><?php echo $c_email; ?></td>
            <td><img src="../customer/customer_photos/<?php echo $c_image; ?>" width="60" height="60"/></td>
            <td><?php echo $c_country; ?></td>
            <td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Sil</a></td>
        </tr>
        
        <?php } ?>
    
    
    
    </table>



</body>
</html>