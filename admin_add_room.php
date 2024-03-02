
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

    if(isset($_POST['add_room']))
    {
        $t_name=$_POST['name'];
        $t_description=$_POST['description'];
        $file=$_FILES['image']['name'];

        $dst="./image/".$file;

        $dst_db="image/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'],$dst);
        $sql= "INSERT INTO room (`name`,`description`,`image`)
        VALUES ('$t_name','$t_description','$file') ";

        $result=mysqli_query($data,$sql);
        if($result){
            echo "<script type='text/javascript'>
            alert('Room added successfully');
            </script>";
          
        }
        else {
            echo "Failed to add room: " . mysqli_error($data); // Display the specific error
            }
       
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin add Room</title>
    <style type="text/css">
        .div_deg{
            background-color:  rgb(241, 218, 188);
            padding-top: 70px;
            padding-bottom: 70px;
            width: 500px;
        }

    </style>
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
        <h2>Add Rooms</h2>
        <br><br>
        <div class="div_deg">
        <form method="post" action="#" enctype="multipart/form-data">
                <div>
                    <label>Room  Name </label>
                    <input type="text" name="name">
                </div>
                <br>
                <div>
                    <label>Description</label>
            <textarea name="description" ></textarea>
                </div>
                <br>
                <div>
                    <label>Image</label>
                    <input type="file" name="image">
                </div>
                <br>
                <div>
                 
                    <input type="submit" name="add_room" value="Add room" class="btn btn-primary">
                </div>

            </form>
        </div>




        </center>
    </div>
   
    
</body>
</html>