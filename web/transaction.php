<?php
$dname=mysqli_connect("localhost:3306","root", "","bank") or die("No Connection");
mysqli_select_db($dname,"bank") or die("No Database connected!");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transaction</title>
    <link rel="stylesheet" href="transaction.css">
    <script src="https://kit.fontawesome.com/abdab7f3b2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="navtran">
        
        <a href='about.php'><i class="fas fa-envelope"></i>
            Contact us</a>
            <a href='history.php'><i class="fas fa-money-bill-alt"></i>
                History</a>
        <a href='home2.php'><i class="fas fa-home"></i>
                    Home </a>
                
        <div class="contran"><a href='#'><i class="fas fa-university"></i> SPARKS BANK </a></div>

    </div>
    <div>
    <table>
        <tr>

            <th><a class="btn btn-secondary"style="width:100px; heigth:80px;">NAME</th>
            <th><a class="btn btn-secondary"style="width:200px; heigth:80px;">EMAIL</th>
            <th><a class="btn btn-secondary"style="width:150px; heigth:80px;">ACCOUNT_NO</th>
            <th><a class="btn btn-secondary"style="width:100px; heigth:80px;">BALANCE</th>
        </tr> 
    <?php
    if (isset($_GET['Id'])) {
        $ID =  mysqli_real_escape_string($dname, $_GET['Id']);
        $sql = "SELECT * FROM customer WHERE Id=$ID";
        $result = mysqli_query($dname, $sql);
        $row1 = mysqli_fetch_assoc($result);
        $sql_for_other_users = "SELECT * FROM customer WHERE NOT Id=$ID";
        $result1 = mysqli_query($dname, $sql_for_other_users);
        $users = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    }
    ?>
    <tr>
  <td><a class="btn btn-info"style="width:100px; heigth:100px;"><?php echo htmlspecialchars($row1['NAME']); ?></td>
  <td><a class="btn btn-info" style="width:200px; heigth:100px;"><?php echo htmlspecialchars($row1['EMAIL']); ?></td>
  <td><a class="btn btn-info"style="width:150px; heigth:100px;"><?php echo htmlspecialchars($row1['ACCOUNT_NO']); ?></td>
  <td><a class="btn btn-info"style="width:100px; heigth:100px;"><?php echo htmlspecialchars($row1['BALANCE']); ?></td></tr>
</table>
</div>
<br><br><br><br><br><br><br><br>
<div class="form">
<form method="" action="success.php">
	<br><br>
    <div class="sreya">
<b>Transfer To</b>: <select class="dropdown" name="name" value="customer" id="customers">
</div>
	<?php 
	$sql = "SELECT ID,NAME,EMAIL,ACCOUNT_NO,BALANCE from customer";
		$result= $dname-> query($sql);
		if($result-> num_rows > 0){
			while($row = $result-> fetch_assoc()){
				if($row['ID']!=$ID){
				?>
					<option name="<?php echo $row['NAME']; ?>"><?php echo $row['NAME']; }?></option>
				<?php
			}
			echo "</table>";
		}
		else{
			echo "0 result";
		}
		?>
</select>
<br><br>
<div class=snehaa>
	<b>Enter amount</b>:<input class="rs" type="number" name="amount" min=1 max=<?php echo $row1['BALANCE'] ?> required></h2>
<br></div>
	<strong><b>
        <br></br>
		<input class="btn btn-success" type="submit"  value="TRANSFER">
	</b></strong>
</form>
</div>
</body>
</html>

<?php 
session_start();
$_SESSION['from_accno']=$ID;
?>
