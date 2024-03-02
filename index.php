

<?php
error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
    {
    $message=$_SESSION['message'];
    echo "<script type='text/javascript'>
    alert('$message')
    </script>";
    }
    $host="localhost";
    $user="root";
    $password="";
    $db="hotelproject";


    $data = mysqli_connect($host,$user,$password,$db);
    if ($data === false) {
        die("Connection error: " . mysqli_connect_error());
    } 

   
    $sql="SELECT * FROM `room` ";

    $result= mysqli_query($data, $sql);

    $sql2="SELECT * FROM `restaurant` ";

    $result2= mysqli_query($data, $sql2);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoodaale Hotel</title>
    <link rel="stylesheet" href="index.css"/>


<!-------icons ------>
<script src="https://kit.fontawesome.com/cb17bf5511.js" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
 integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
  crossorigin="anonymous"></script>
  
  <!---- sahal
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->



   

</head>
<body >
    <nav>
        <label class="logo"> Hoodaale Hotel</label>
        <ul>
            <li><a href="#header">Home</a></li>
            <li><a href="#room">Rooms</a></li>
            <li><a href="#restaurant">Restuarant</a></li>
            <li><a href="#booking">Booking</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>

        </ul>
    </nav>
    <div id="header"  >
   <dv class="section"> 
    
     <img class="main_img" src="./images/waw.jpg"/>
    </dv>
    <!----<di class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img"  src="./images/waw.jpg"/>/>
            </div>
            <div class="col-md-8">
                <h1> Welcome to Hoodole Hotel</h1>
                <p>Hoodaale Hotel is a progressive, full-service IT organization committed to
                     providing effective, accurate, and quality computer training, IT consultancy, and IT services.
                    Our true differentiation is our quality of service and the value that we provide to our clients.
 We will support your end-to-end IT needs and will make sure you are successful in training, staffing, and service needs.<br> 
 Whether you're looking for proof of concepts with new technology, or trying to validate your business case, we will do our best 
 so that you get positive outcomes. Looking for IT operation optimization or new IT capabilities? Our technology and management 
 experts will partner with you to implement the desired solution.We pride ourselves on identifying your challenges quickly and designing strategies to address them,
 always keeping top of mind your business's need for minimal disruption</p>
            </div>

        </div>
    </div>---->
</div>
   
<div id="room">
    <center>
        <h2> Our Rooms</h2>
    </center>
    <div class="container">
        <div class="row">
        <?php
              while($info=$result->fetch_assoc())
                {
        ?>
            <div class="col-md-4"> 
            <img class="room" src="image/<?php echo "{$info['image']}"?>" />
                <h3><?php echo "{$info['name']}" ?></h3>
                <h5><?php echo "{$info['description']}" ?></h5>
            </div>
        <?php 
                }
        ?>
          


        </div>
    </div>
     </div>
     <div id="restaurant">
    <center>
        <h2> Our Restuarant</h2>
    </center>
    <div class="container">
        <div class="row">
       

        <?php
              while($info=$result2->fetch_assoc())
                {
        ?>
            <div class="col-md-4"> 
            <img class="restaurant" src="image/<?php echo "{$info['image']}"?>" />
                <h3><?php echo "{$info['name']}" ?></h3>
                <h5><?php echo "{$info['description']}" ?></h5>
            </div>
        <?php 
                }
        ?>

        </div>
    </div>
    </div>
    <div id="booking">
    <center>
        <h1 class="adm"> Book now</h1>
    </center>
    <div align="center" class="admission_form">
        <form action="data_check.php" method="POST" >
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg"  type="text" name="email">
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg"  type="text" name="phone">
            </div>
            <div class="adm_int">
                <label class="label_text">Check_in</label>
                <input class="input_date"  type="date" name="check_in">
            </div>
            <div class="adm_int">
                <label class="label_text">Check_out</label>
                <input class="input_date"  type="date" name="check_out">
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
             <textarea  class="input_txt" name="message"></textarea>
            </div>
            <div class="adm_int">
                <input  class="btn btn-primary "  type="submit" id="submit" value="apply" name="apply" >
            </div>
        </form>
    </div>
    </div>
    <div id="contact">
                <h1 class="sub-title"> Contact</h1>
                <p> Email: <i class="fa-solid fa-envelope"></i><a href=" hoodaalhotel03@gmail.com"> hoodaalhotel03@gmail.com</a></p>
                
                                <p>WhatsApp: <i class="fa-solid fa-square-phone"></i> <a href="+2520000000">+2520000000</a></p>
                                <p>Call Center: <i class="fa-solid fa-headset"></i> <a href=" 3009"> 3009</a></p>
                <div class="social-icons">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://twitter.com/WardaHoodo" target="_blank"><i class="fa-brands fa-x-twitter" ></i></i></a>
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-instagram"></i></i></a>
                    <a href="https://www.linkedin.com/in/warda-haibe-361771181/" target="_blank"><i class="fa-brands fa-linkedin"></i></i></a>
                 
                </div>
    </div>
    <footer> 
        <h3 class="footer_text">All @copyright reserved Hoodaale Hotel </h3>

        </footer>
    
</body>
</html>