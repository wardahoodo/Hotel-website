
<?php
session_start();
    if(!isset($_SESSION['username']))
    {
        header("location: login.php");
    }
    elseif($_SESSION['usertype']=='customer')
    {
        header("location: login.php");
    }
    $host="localhost";
    $user="root";
    $password="";
    $db="hotelproject";

    $data = mysqli_connect($host, $user,$password,$db);
    
    $sql= "select * from bookings";
    $result= mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applied for bookings </title>
    <?php 
    include 'admin_css.php'


?>
</head>

<body>
    <?php 
    include 'admin_sidebar.php'
    ?>
    <div class="content">
        <center>
        <h2> Applied for bookings </h2>
        <br><br>
        <table border="1px">
            <tr>
                <th style="padding:20px; font-size:15px; color:red">Name</th>
                <th style="padding:20px; font-size:15px; color:red" >Email</th>
                <th style="padding:20px; font-size:15px; color:red">Phone</th>
                <th style="padding:20px; font-size:15px; color:red">Message</th>
                <th style="padding:20px; font-size:15px; color:red">Check_in</th>
                <th style="padding:20px; font-size:15px; color:red">Check_out</th>
            </tr>
            <?php
            while($info=$result->fetch_assoc())
            {
            ?>
            <tr>
                <td style="padding:20px">
                <?php echo "{$info['name']}"; ?>
            </td>
          
                <td style="padding:20px">
                <?php echo "{$info['email']}"; ?>
            </td>
                <td style="padding:20px">
                <?php echo "{$info['phone']}"; ?>
            </td>
            <td style="padding:20px">
                <?php echo "{$info['check_in']}"; ?>
            </td>
            <td style="padding:20px">
                <?php echo "{$info['check_out']}"; ?>
            </td>
                <td style="padding:20px">
            
                <?php echo "{$info['message']}"; ?>
            </td>
            </tr>
            
            <?php
            }
            ?>
        </table>
        </center>
    </div>
    
    
</body>
</html>