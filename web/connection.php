<?php
$dname=mysqli_connect("localhost:3306","root", "","bank") or die("No Connection");
mysqli_select_db($dname,"bank") or die("No Database connected!");
?>