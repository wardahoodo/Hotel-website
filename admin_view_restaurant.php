
<?php
session_start();
error_reporting(0);
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


$data = mysqli_connect($host,$user,$password,$db);
if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
} 

$sql = "SELECT * FROM restaurant ";
$result=mysqli_query($data,$sql);

if($_GET['restaurant_id'])
{


$t_id= $_GET['restaurant_id'];
$sql2= "DELETE FROM restaurant WHERE id='$t_id' ";
$result2= mysqli_query($data,$sql2);
    if($result2)
    {
    header('location: admin_view_restaurant.php');
    }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <?php
    include 'admin_css.php'

    ?>
    <style type="text/css">
        .table_th{
            padding: 17px;
            font-size: 15px;
        }
        .table_td{
            padding: 20px;
            background-color:  rgb(241, 218, 188);
        }

    </style>
</head>

<body>
    <?php
    include 'admin_sidebar.php'
    ?>
    
    <div class="content">
        <center>
        <h2> Display Rooms</h2>
        <br><br>
        <table border="1px">
            <tr>
                <th class="table_th">Room Name</th>
                <th class="table_th">About Room </th>
                <th class="table_th">Room image</th>
                 <th class="table_th">Deleted</th>
                  <th class="table_th">Update</th>
            </tr>
            <?php
            while($info=$result->fetch_assoc())
            {
                ?>
            <tr>
                <td class="table_td"><?php echo "{$info['name']}"; ?></td>
                <td class="table_td"><?php echo "{$info['description']}"; ?></td>
                <td class="table_td">
                    
                 <img  height="100px" width="100px" src="image/<?php echo "{$info['image']}"; ?>"alt=" restaurant image"/> </td>
              
                <td class="table_td">
                    <?php echo "<a  onClick=\"javascript:return confirm('are you sure to delete'); \"
                    href='admin_view_restaurant.php?restaurant_id={$info['id']}' class='btn btn-danger'>Delete</a>"; ?></td>

              <td class="table_td">
                <?php echo "
                <a href='admin_update_restaurant.php.php?restaurant_id= {$info['id']}' class='btn btn-primary'>Update</a> "; ?>
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