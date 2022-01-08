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
        	<td colspan="6"><h2>Siparişleri Gör</h2></td>
        </tr>
    	
        <tr align="center">
        	<th>Sipariş No</th>
            <th>Müşteri</th>
            <th>FaturaNO</th>
            <th>Ürün ID</th>
            <th>Adet</th>
            <th>Durum</th>
            <th>Sil</th>
        </tr>
    	<?php 
		include("includes/db.php");
		
		$get_orders = "select * from pending_orders";
		
		$run_orders = mysqli_query($con, $get_orders); 
		
		$i=0;
		
		while($row_orders=mysqli_fetch_array($run_orders)){
			
			
			$order_id = $row_orders['order_id'];
			$c_id = $row_orders['customer_id'];
			$invoice = $row_orders['invoice_no'];
			$p_id = $row_orders['product_id'];
			$qty = $row_orders['qty'];
			$status = $row_orders['order_status'];
			
			$i++;
			
		
		
		?>
        <tr align="center">
        	<td><?php echo $i; ?></td>
            <td>
            <?php 
            
			$get_customer = "select * from customers where customer_id='$c_id'";
			
			$run_customer = mysqli_query($con, $get_customer);
			 
			$row_customer=mysqli_fetch_array($run_customer); 
			
			$customer_email = $row_customer['customer_email'];
			
			echo $customer_email;
			
            ?>
            </td>
            <td bgcolor="#FFCCCC"><?php echo $invoice; ?></td>
            <td><?php echo $p_id; ?></td>
            <td><?php echo $qty; ?></td>
            <td>
			<?php
			if($status=='Pending'){
				
				echo $status = 'Bekleniyor';
				}
					else {
						echo $status = 'Tamamlandı';
						}
			
			 ?>
             </td>
            <td><a href="delete_order.php?delete_order=<?php echo $order_id; ?>">Sil</a></td>
        </tr>
        
        <?php } ?>
    
    
    
    </table>



</body>
</html>