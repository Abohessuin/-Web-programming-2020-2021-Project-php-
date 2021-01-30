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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="homeStyle.php" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        function Function1() {
            var fullPath = document.getElementById("imgPath").value;
            if (fullPath) {
                var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                var filename = fullPath.substring(startIndex);
                if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                    filename = filename.substring(1);
                }
                if(filename.length>0){
                    document.getElementById("custId").value = "/project/img/"+filename;
                }
            }
        }
    </script>
</head>

<body>
    <header class="main-head">
        <nav class="nav-header">
            <h1 id="logo">LinkedOut</h1>
            <ul>
                <?php
                if ($_SESSION['type'] == 'n') {
                    echo '
                <form method="POST" action="/project/profile/userprofile.php">
                <li><button><i class="fas fa-user-circle"></i></button></li>
                </form>';
                } else {
                    echo '
                <form method="POST" action="/project/profile/companyprofile.php">
                <li><button><i class="fas fa-user-circle"></i></button></li>
                </form>';
                }
                ?>
                <form method="POST" action="/project/chat/Messages.php">
                    <li><button><i class="fab fa-facebook-messenger"></i><button></li>
                </form>
                <form method="POST" action="/project/profile/logout.php">
                    <li><button><i class="fas fa-sign-out-alt"></i></button></li>
                </form>
            </ul>
        </nav>

    </header>        
    <form method="post" action="post.php">
    <div class="createpost">
        <input type="text" class="Text" placeholder="What's on your mind ?" name="content"> </input>
        <input type="file" class="file" aria-label="File browser example" id="imgPath" accept=".jpg,.jpeg,.png" onchange="Function1()"></input>
        <input type="hidden" id="custId" name="custId" value="none">
        <button type="submit" name="btnpost">Post</button>
    </div>
    </form>
    <div class="Posts">
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $dbhost = 'bleowlp0nvlhx4ipkujn-mysql.services.clever-cloud.com';

        $dbuser = 'ug0qvs5nb2xs6msh';

        $dbpass = 'kcTyXpYKZVE6leVGpJnG';

        $dbname = 'bleowlp0nvlhx4ipkujn';

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        //get postsids 
        $sql = "SELECT content,postid,userid,postdate,imagelink FROM post ORDER BY postdate DESC ";
        $result = mysqli_query($conn, $sql);
        //loop for every post
        while ($row = $result->fetch_assoc()) {
            //get post
            $postid = $row['postid'];
            $userid = $row['userid'];
            //get user name for post
            $sql = "SELECT name,photolink FROM user Where userid='$userid'";
            $result1 = mysqli_query($conn, $sql);
            $row1 = $result1->fetch_assoc();
            $sql = "SELECT content FROM comment WHERE postid='$postid'";
            $result2 = mysqli_query($conn, $sql);
            $comments = '';
            while ($row3 = $result2->fetch_assoc()) {
                $comments .= $row3['content'] . "\n";
            }
            echo '<div class="fullpost">';
            echo '<div class="Post">
                            <div class="profile">
                                <img class="me" src=' . $row1['photolink'] . ' alt="Avatar">
                                <div class="info">
                                    <div class="head">
                                        <h1 class="Name">' . $row1['name'] . '</h1>
                                    </div>
                                    <div class="chat">
                                        <button class="bt ' . $postid . '">Message Me</button> 
                                        <h2 class="Date">' . $row['postdate'] . '</h2>
                                    </div>

                                </div>

                            </div>';
                        echo '<div class="caption">
                                <p>' . $row['content'] . '</p>';
                                if($row['imagelink']=="none"){
                                }else{
                                    echo '<img class="sea" src=' .$row['imagelink']. ' />';
                                }
                                $sql = "SELECT userid FROM liked WHERE postid='$postid'";
                                $result4 = $conn->query($sql);
                                $i = 0;
                                while($result4->fetch_assoc()){
                                    $i++;
                                }
                                echo  '<h1> ' .$i. ' Likes </h1>';
                            echo'<div class="comment">
                                    <input class="typecomment" type="text" placeholder="Comment Here ..." name="comment">
                                    <textarea name="comments" disabled id="comments" cols="30" rows="5">' . $comments . '</textarea>
                                </div>
                            </div>
                        </div>';
            $userId = $_SESSION['id'];
            $sql = "SELECT * FROM liked WHERE postid='$postid' AND userid='$userId'";
            $result3 = $conn->query($sql);
            if ($result3->num_rows > 0) {
                echo '<div class="icons">
                        <i style="background:rgb(245, 71, 108);" class="far fa-heart ' . $postid . '"></i>
                        <i class="far fa-comment"></i>
                        <i class="far fa-paper-plane ' . $postid . '"></i> 
                        </div>';
            } else {
                echo '<div class="icons">
                        <i class="far fa-heart ' . $postid . '"></i>
                        <i class="far fa-comment"></i>
                        <i class="far fa-paper-plane ' . $postid . '"></i> 
                        </div>';
            }
            echo '<div class="chatbox">
                    <div class="chats"></div>
                    <input class="messagebox" type="text"></input>
                    <i class="fas fa-envelope-square ' . $postid . '"></i>
                    </div>';
            echo '</div>';
        }
        ?>

    </div>
</body>

<script src="Po.js"></script>

</html>