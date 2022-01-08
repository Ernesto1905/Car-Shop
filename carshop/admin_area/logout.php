<?php 
session_start(); 

session_destroy();



echo "<script>window.open('login.php?logout=Başarıyla çıkış yaptınız!','_self')</script>";



?>