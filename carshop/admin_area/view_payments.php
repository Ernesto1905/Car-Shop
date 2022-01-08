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

th,tr{border:3px groove #333;}

</style>
</head>

<body>

	<table width="794" align="center" bgcolor="#FFCC99" border="2">
    
    	<tr align="center">
        	<td colspan="6"><h2>Ödemeleri Gör</h2></td>
        </tr>
    	
        <tr align="center">
        	<th>Ödeme No</th>
            <th>FaturaNO</th>
            <th>Ödenen Miktar</th>
            <th>Ödeme Yöntemi</th>
            <th>Ref NO</th>
            <th>Kod</th>
            <th>Ödeme Tarihi</th>
        </tr>
    	<?php 
		include("includes/db.php");
		
		$get_payments = "select * from payments";
		
		$run_payments = mysqli_query($con, $get_payments); 
		
		$i=0;
		
		while($row_payments=mysqli_fetch_array($run_payments)){
			
			
			$payment_id = $row_payments['payment_id'];
			$invoice = $row_payments['invoice_no'];
			$amount = $row_payments['amount'];
			$payment_m = $row_payments['payment_mode'];
			$ref_no = $row_payments['ref_no'];
			$code = $row_payments['code'];
			$date = $row_payments['payment_date'];
			
			$i++;
			
		
		
		?>
        <tr align="center">
        	<td><?php echo $i; ?></td>
            
            <td bgcolor="#FFCCCC"><?php echo $invoice; ?></td>
            
            <td><?php echo $amount; ?></td>
            <td><?php echo $payment_m; ?></td>
            <td><?php echo $ref_no; ?></td>
            <td><?php echo $code; ?></td>
            <td><?php echo $date; ?></td>
        </tr>
        
        <?php } ?>
    
    
    
    </table>



</body>
</html>

<?php } ?>