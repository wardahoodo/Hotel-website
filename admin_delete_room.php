

<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="hotelproject";


$data = mysqli_connect($host,$user,$password,$db);
if($_GET['room_id'])
{
    $user_id= $_GET['room_id'];
    $sql= "DELETE FROM room WHERE id= '$t_id' ";

    $result= mysqli_query($data, $sql);
    if($result)
    {
        $_SESSION['message']= " deleted room successfully";
        header("location: admin_view_room.php");
    }

    }
    

?>
