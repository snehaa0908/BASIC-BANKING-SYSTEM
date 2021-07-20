
<!DOCTYPE html>
<html>
<head>
    <title>Customer</title>
    <link rel="stylesheet" href="customer.css">
    <script src="https://kit.fontawesome.com/abdab7f3b2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="navcus">
        
        <a href='about.php'><i class="fas fa-envelope"></i>
            Contact us</a>
            <a href='history.php'><i class="fas fa-money-bill-alt"></i>
                History</a>
        <a href='home2.php'><i class="fas fa-home"></i>
                    Home </a>
               
        <div class="concus"><a href='#'><i class="fas fa-university"></i> SPARKSBANK </a></div>

    <table >
        <tr>
            <th><a class="btn btn-secondary"style="width:100px; heigth:50px;">ID</th>
            <th><a class="btn btn-secondary"style="width:200px; heigth:50px;">NAME</th>
            <th><a class="btn btn-secondary"style="width:200px; heigth:50px;">EMAIL</th>
            <th><a class="btn btn-secondary"style="width:150px; heigth:50px;">ACCOUNT_NO</th>
            <th><a class="btn btn-secondary"style="width:150px; heigth:50px;">BALANCE</th>
            <th><a class="btn btn-secondary"style="width:150px; heigth:50px;">ACTION</th>
        </tr> 
        <?php 
$conn = mysqli_connect("localhost","root","","bank");
if ($conn-> connect_error){
    die("Connection Failed:". $conn-> connect_error);
}
$sql = "SELECT * from customer";
$result= $conn-> query($sql);
if ($result-> num_rows > 0)
{
    while($row =$result-> fetch_assoc()){
        ?>
        
        <tr>
        <td><a class="btn btn-info"style="width:100px; heigth:50px;"><?php echo $row['ID']; ?> </td>
            <td><a class="btn btn-info"style="width:200px; heigth:50px;"><?php echo $row['NAME']; ?> </td>
         
            <td><a class="btn btn-info"style="width:200px; heigth:50px;">
                <?php echo $row['EMAIL']; ?></td>
            
            <td><a class="btn btn-info"style="width:150px; heigth:50px;"><?php echo $row['ACCOUNT_NO']; ?> </td>
            <td><a class="btn btn-info"style="width:150px; heigth:50px;">
                <?php echo $row['BALANCE']; ?> </td>
            
            <td><a class="btn btn-success"style="width:150px; heigth:50px;" href="transaction.php?Id=<?php echo $row['ID'] ?>">Transfermoney</a></td>
        </tr>
    
    <?php
}
echo "</table>";
}
$conn-> close();
?>  

</table>

</body>
</html>