
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
        if($_GET['room_id'])
        {
        $t_id=$_GET['room_id'];
        $sql= "SELECT * FROM room WHERE  id='$t_id' ";
        $result=mysqli_query($data,$sql);
        $info=$result->fetch_assoc();

    }
    if(isset($_POST['update_room']))
    {
    $id=$_POST['id'];
    $t_name=$_POST['name'];
    $t_description=$_POST['description'];
    $file=$_FILES['image']['name'];

    $dst= "./image/".$file;
    $dst_db= "image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        if($file){
            $sql2= "UPDATE room SET  name='$t_name', description='$t_description',
            image='$dst_db'  where id='$id' ";
        }
        else{
            $sql2= "UPDATE room SET  name='$t_name', description='$t_description',
           where id='$id' ";
        }
    $sql2= "UPDATE room SET  name='$t_name', description='$t_description',
     image='$dst_db'  where id='$id' ";

    $result2 = mysqli_query($data,$sql2);

    if($result2)
    {
     header('location: admin_view_room.php');
    }
}

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Room Data</title>
    <?php
    include 'admin_css.php'

    ?>
    <style type="text/css">
        label{
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color:  rgb(241, 218, 188);
            width: 500px;
            padding-bottom: 70px;
            padding-top: 70px;
        }
    </style>
</head>

<body>
    <?php
    include 'admin_sidebar.php'
    ?>
    
    <div class="content">
        <center>
        <h2> Update Room Data</h2>
      
        <div class="div_deg">
            <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="id" value="<?php echo "{$info['id']}"; ?>" hidden>
                <div>
                    <label>Room Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
                </div>
                <div>
                    <label>About Room</label>
                    <textarea name="description"><?php echo "{$info['description']}"; ?></textarea>
                    
                </div>
             <div>
                    <label>Room Old  Image</label>

                    <img  height="100px" width="100px" src="image/<?php echo "{$info['image']}"; ?>"alt="room image"   /> 
                </div>
                <div>
                    <label>Choose new image for room </label>
                    <input type="file" name="image" value="<?php echo "{$info['image']}"; ?>">
                </div>
                
                <div>
                    
                    <input  class="btn btn-success" type="submit" name="update_room" value="update">
                </div>
            </form>
        </div>
        </center>
    </div>
   
    
</body>
</html>