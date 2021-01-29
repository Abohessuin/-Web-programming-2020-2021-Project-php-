<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" type="text/css" href="Messagesstye.php" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
</head>
<body>
    <header class="main-head">
        <nav class="nav-header">
            <h1 id="logo">LinkedOut</h1>
            <ul>
                <li><button><i class="fas fa-user-circle"></i></button></li>
                <li><button><i class="fas fa-home"></i></button></li>
            </ul>
        </nav>
    </header>
    <?php 
  
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $dbhost = 'bleowlp0nvlhx4ipkujn-mysql.services.clever-cloud.com';

        $dbuser = 'ug0qvs5nb2xs6msh';

        $dbpass = 'kcTyXpYKZVE6leVGpJnG';

        $dbname = 'bleowlp0nvlhx4ipkujn'; 

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        $userId=1;
        echo $userId ;
        $sql = "SELECT userid FROM chat WHERE curruser='$userId'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo $row['userid'];
        $id=$row['userid'];

        echo "efta7ha";
        echo "1";
        echo '<script>  console.log('.$id.'); </script>';
?>
    <div class="all">
        <div class="Messages">
            <div class="MessageBox">
                <div class="message">
                    <img src="imges/img2.jpeg" alt="">
                    <h1>Mohamed Hussien</h1>
                </div> 
            </div>
        </div>
        <div class="Conversation">
            <div class="chats">
                <div class="userchat">
                    <img src="/pexels-photo-220453.jpeg" alt="">
                    <h1></h1>
                </div>
                <div class="texts"></div>
            </div>
            <?php

         echo   '
            <div class="Sending">

                <input class="messagebox" type="text" name="msg"></input>
               <i class="fas fa-envelope-square ' . $id . '"></i> 
            </div>';
            ?>
        </div>
    </div>
    <script src="Messages.js"></script>
</body>
</html>
