
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
</head>

<body>
    <?php
    include 'admin_sidebar.php'
    ?>
    
    <div class="content">
        <h2> admin dashboard</h2>
    </div>
   
    
</body>
</html>