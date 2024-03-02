

<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="hotelproject";


$data = mysqli_connect($host,$user,$password,$db);
if($_GET['restaurant_id'])
{
    $user_id= $_GET['restaurant_id'];
    $sql= "DELETE FROM restaurant WHERE id= '$t_id' ";

    $result= mysqli_query($data, $sql);
    if($result)
    {
        $_SESSION['message']= " deleted restaurant successfully";
        header("location: admin_view_restaurant.php");
    }

    }
    

?>
