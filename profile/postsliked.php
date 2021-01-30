<?php
session_start();
if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
    header("Location: /project/login&register/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="style.php" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $dbhost = 'bleowlp0nvlhx4ipkujn-mysql.services.clever-cloud.com';

    $dbuser = 'ug0qvs5nb2xs6msh';

    $dbpass = 'kcTyXpYKZVE6leVGpJnG';

    $dbname = 'bleowlp0nvlhx4ipkujn';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    $userId = $_SESSION['id'];

    ?>
    <header class="main-head">
        <nav class="nav-header">
            <h1 id="logo">LinkedOut</h1>
            <ul>
                <form method="POST" action="/project/profile/userprofile.php">
                <li><button><i class="fas fa-user-circle"></i></button></li>
                </form>
                <form method="POST" action="/project/profile/home.php">
                    <li><button><i class="fas fa-home"></i></button></li>
                </form>
                <form method="POST" action="/project/profile/logout.php">
                    <li><button><i class="fas fa-sign-out-alt"></i></button></li>
                </form>
            </ul>
        </nav>
    </header>
    <div class="Container">
        <div class="rightInfo" style="margin-left: 200px">
            <div class="Posts">
                <?php
                //get postsids 
                $sql = "SELECT postid FROM liked WHERE userid='$userId'";
                $result = mysqli_query($conn, $sql);
                //loop for every post
                while ($row = $result->fetch_assoc()) {
                    //get post
                    $postid = $row['postid'];
                    $sql = "SELECT content,postdate,userid,imagelink FROM post WHERE postid='$postid' ";
                    $result1 = mysqli_query($conn, $sql);
                    $row1 = $result1->fetch_assoc();
                    $userid = $row1['userid'];
                    //get user name for post
                    $sql = "SELECT name,photolink FROM user WHERE userid='$userid' ";
                    $result2 = mysqli_query($conn, $sql);
                    $row2 = $result2->fetch_assoc();

                    ////////////////////////////////
                    $sql = "SELECT content FROM comment WHERE postid='$postid'";
                    $result3 = mysqli_query($conn, $sql);
                    $comments='';
                    while ($row3 = $result3->fetch_assoc()) {
                        $comments .= $row3['content'] . "\n";
                    }
                    echo
                    '<div class="fullpost">
                        <div class="Post">
                            <div class="profile">
                                <img class="me" src=' . $row2['photolink'] . ' alt="Avatar">
                                <div class="info">
                                    <div class="head">
                                        <h1 class="Name">' . $row2['name'] . '</h1>
                                    </div>
                                    <div class="chat">
                                        <h2 class="Date">' . $row1['postdate'] . '</h2>
                                    </div>

                                </div>

                            </div>
                            <div class="caption">
                                <p>' . $row1['content'] . '</p>';
                                if($row1['imagelink']=="none"){
                                }else{
                                    echo '<img class="sea" src=' .$row1['imagelink']. ' />';
                                }
                            echo'<div class="comment">
                                    
                                    <input class="typecomment" type="text" placeholder="Comment Here ..." name="comment">
                                    
                                    <textarea name="comments" disabled id="comments" cols="30" rows="5">' . $comments . '</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="icons">
                        <i style="background:rgb(245, 71, 108);" class="far fa-heart ' . $postid . '"></i>
                        <i class="far fa-comment"></i>
                        <i class="far fa-paper-plane ' . $postid . '"></i> 
                        </div>
                    </div>';
                }
                ?>

            </div>

        </div>

    </div>
    </div>

</body>
<script src="Po.js"></script>

</html>