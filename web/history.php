<!DOCTYPE html>
<html>
<head>
    <title>History</title>
    <link rel="stylesheet" href="history.css">
    <script src="https://kit.fontawesome.com/abdab7f3b2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="navhis">
        <a href='home2.php'><i class="fas fa-home"></i>
                    Home </a>
                
        <div class="conhis"><a href='#'><i class="fas fa-university"></i> SPARKS BANK </a></div>

    </div>
    
    <table>
        <tr>

            <th><a class="btn btn-dark"style="width:100px; heigth:80px;">SNO</th>
            <th><a class="btn btn-dark"style="width:200px; heigth:80px;">SENDER</th>
            <th><a class="btn btn-dark"style="width:200px; heigth:80px;">RECEIVER</th>
            <th><a class="btn btn-dark"style="width:150px; heigth:80px;">AMOUNT</th>
            <th><a class="btn btn-dark"style="width:150px; heigth:80px;">DATE</th>
            <th><a class="btn btn-dark"style="width:150px; heigth:80px;">TIME</th>

        </tr> 
 <?php
$conn = mysqli_connect("localhost","root","","bank");
if ($conn-> connect_error){
    die("Connection Failed:". $conn-> connect_error);
}
$sql = "SELECT * from history";
$result= $conn-> query($sql);
if ($result-> num_rows > 0)
{
    $i=1;
    while($row =$result-> fetch_assoc()){
        ?>
        <tr>
        <td><a class="btn btn-info"style="width:100px; heigth:50px;"><?php echo $i; ?> </td>   
        <td><a class="btn btn-info"style="width:200px; heigth:50px;"><?php echo $row['sender']; ?> </td>
            <td><a class="btn btn-info"style="width:200px; heigth:50px;"><?php echo $row['receiver']; ?> </td>
         
            <td><a class="btn btn-info"style="width:150px; heigth:50px;">
                <?php echo $row['amount']; ?></td>
            
            <td><a class="btn btn-info"style="width:150px; heigth:50px;"><?php echo $row['dte']; ?> </td>
            <td><a class="btn btn-info"style="width:150px; heigth:50px;">
                <?php echo $row['tme']; ?> </td>
            
            
        </tr>
    
        <?php
    $i++;
}

echo "</table>";
}
$conn-> close();
?>  

</table>

</body>
</html>