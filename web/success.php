<html>
	<tittle>sucess</tittle>
    <head>

<link rel="stylesheet" type="text/css" href="success.css">
</head>
    <body>
        <img src="loading.gif" style="margin-top: 60px; margin-right: auto; margin-left:auto; display:block; width=60%; background-color:rgba(83,83,225,255)
">
        
</body>
</html>
<?php 
session_start();
$dname=mysqli_connect("localhost:3306","root","","bank") or die("no connected");
mysqli_select_db($dname,"bank") or die("no database");
$ID=$_SESSION['from_accno'];
$cus=$_GET['name'];
$amount=$_GET['amount'];

	$cus=$_GET['name'];
	$amount=$_GET['amount'];
	$reciever="SELECT BALANCE FROM customer WHERE NAME='$cus'";
		$reciever=mysqli_query($dname,$reciever);
		$reciever=mysqli_fetch_assoc($reciever);
		$r=$reciever['BALANCE'];
		$reciever=$r+$amount;
		$sender= "SELECT NAME FROM customer WHERE ID=$ID";
		$sender1=mysqli_query($dname,$sender);
		$sender=mysqli_fetch_assoc($sender1);
		$sender_before_balance= "SELECT BALANCE FROM customer WHERE ID=$ID";
		$sender_before_balance=mysqli_query($dname,$sender_before_balance);
		$sender_before_balance=mysqli_fetch_assoc($sender_before_balance);
		$s=$sender_before_balance['BALANCE'];
		$sender_after_balance= $sender_before_balance['BALANCE']-$amount;
        date_default_timezone_set("Asia/kolkata");
		$date=date("Y/m/d");
		$time=date("h:i:s:a");
		$sen=$sender['NAME'];
			$history="INSERT INTO history (sender,receiver,amount,dte,tme) VALUES ('$sen','$cus','$amount','$date','$time')";
			$query=mysqli_query($dname,$history);
			$update_sender="UPDATE customer SET BALANCE=$sender_after_balance WHERE ID=$ID";
			$query=mysqli_query($dname,$update_sender);
			$update_reciever="UPDATE customer SET BALANCE=$reciever WHERE NAME='$cus'";
			$query=mysqli_query($dname,$update_reciever);
			header("Refresh:1;url=history.php?from=$ID&to=$cus&amount=$amount");
   

           
?>