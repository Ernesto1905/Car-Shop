<!DOCTYPE html>
<html>
	<head>
    	<title>Ödeme Seçenekleri</title>
     </head>
 
 <body>
 <?php 
 include("includes/db.php");
 
 ?>

<div align="center" style="padding:20px;">

<h2>Sizin İçin Ödeme Seçenekleri</h2>

<?php 
$ip = getRealIpAddr();

$get_customer = "select * from customers where customer_ip='$ip'";

$run_customer = mysqli_query($con, $get_customer); 

$customer = mysqli_fetch_array($run_customer);

$customer_id = $customer['customer_id'];


?>

<b>Bununla öde</b>&nbsp; <a href="http://www.paypal.com"><img src="images/paypal.png" width="200" height="80"></a> <b>Veya <a href="order.php?c_id=<?php echo $customer_id; ?>">Çevrimdışı Öde</a></b><br><br><br>

<b>Çevrimdışı Öde'yi seçtiyseniz, siparişinize ilişkin Fatura No'yu bulmak için lütfen e-postanızı veya hesabınızı kontrol edin.</b>




</div>
</body>
</html>