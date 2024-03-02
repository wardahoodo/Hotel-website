<?php 
    $host="localhost";
    $user="root";
    $password="";
    $db="hotelproject";

    $data = mysqli_connect($host, $user,$password,$db);
    if ($data===false)
    {
        die("connection error");
    }
      if(isset($_POST['apply']))
        {
        $data_name = $_POST['name'];
        $data_email = $_POST['email'];
        $data_phone = $_POST['phone'];
        $data_checkin = $_POST['check_in'];
        $data_checkout = $_POST['check_out'];
        $data_message = $_POST['message'];

        $sql = "INSERT INTO bookings(`name`,`email`,`phone`,`check_in`,`check_out`,`message`)
        VALUES('$data_name','$data_email','$data_phone', '$data_checkin', '$data_checkout','$data_message')";

        $result = mysqli_query($data,$sql);
            if($result)
            {
                $_SESSION['message']= "your booking sent successfully";
                header("location: index.php");
             


            }else
            {
             echo "failed your booking";
            }

        }

    ?>