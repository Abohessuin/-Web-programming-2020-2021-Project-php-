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
    <title>Company Profile</title>
    <link rel="stylesheet" type="text/css" href="style.php" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $dbhost = 'bleowlp0nvlhx4ipkujn-mysql.services.clever-cloud.com';

    $dbuser = 'ug0qvs5nb2xs6msh';

    $dbpass = 'kcTyXpYKZVE6leVGpJnG';

    $dbname = 'bleowlp0nvlhx4ipkujn';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    $userId = $_SESSION['id'];

    $sql = "SELECT name,bio,about,photolink FROM user WHERE userid='$userId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    ?>
    <header class="main-head">
        <nav class="nav-header">
            <h1 id="logo">LinkedOut</h1>
            <ul>
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
        <div class="introduction">
            <div class="upperBackground">
                <img class="img1" src="/project/img/img1.jpg" />
            </div>
            <div class="whiteSpace">
                <div class="content">
                    <div class="profileImg">
                        <img class="img2" src=<?php echo $row['photolink'] ?> />
                    </div>
                    <div class="inffo">
                        <div class="edit">
                            <div class="name"><?php echo $row['name'] ?></div>
                            <form method="POST" action="/project/editAccount/EditInfo.php">
                            <a href="##"><button>Edit profile</button></a>
                            </form>
                        </div>
                        <div class="workInfo"><?php echo $row['bio'] ?></div>

                    </div>
                </div>
            </div>
        </div>

        <div class="About">
            <div class="about">About</div>
            <div class="aboutInfo">
                <?php echo $row['about'] ?>

            </div>
        </div>

        <div class="moreInfo">
            <div class="leftInfo">
                <div class="skills">
                    <div class="links">
                    <div class="MyInfo">
                        <div class="stuffcontent">
                            <a href="##"><button class="stuff">Stuff</button></a>
                            <textarea disabled class="content">
                            <?php
                            $sql = "SELECT userid FROM member WHERE companyid='$userId'";
                            $result = mysqli_query($conn, $sql);
                            while ($row1 = $result->fetch_assoc()) {
                            $currid = $row1['userid'];
                            $sql = "SELECT name FROM user WHERE userid='$currid' ";
                            $result1 = mysqli_query($conn, $sql);
                            $row2 = mysqli_fetch_assoc($result1);
                            echo  $row2['name']."\n" ;
                            }
                            ?>
                            </textarea>
                        </div>
                        <div class="followercontent">
                            <a href="##"><button class="follower">followers</button></a>
                            <textarea disabled class="content">
                            <?php
                            $sql4 = "SELECT userid FROM companyfollowers WHERE companyid='$userId'";
                            $result = mysqli_query($conn, $sql4);
                            while ($row4 = $result->fetch_assoc()) {
                            $currid = $row4['userid'];
                            $sql5 = "SELECT name FROM user WHERE userid='$currid' ";
                            $result3 = mysqli_query($conn, $sql5);
                            $row5 = mysqli_fetch_assoc($result3);
                            echo  $row5['name']."\n";
                            }
                            ?>
                            </textarea>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="rightInfo">
                <div class="Posts">
                    <?php
                    //get posts
                    $sql = "SELECT content,postdate,postid,imagelink FROM post WHERE userid='$userId'";
                    $result = mysqli_query($conn, $sql);
                    while ($row1 = $result->fetch_assoc()) {
                        ////////////////////////////////
                        $postid = $row1['postid'];
                        $sql = "SELECT content FROM comment WHERE postid='$postid'";
                        $result1 = mysqli_query($conn, $sql);
                        $comments = '';
                        while ($row3 = $result1->fetch_assoc()) {
                            $comments .= $row3['content'] . "\n";
                        }

                        echo '<div class="fullpost">';
                        echo '<div class="Post">
                            <div class="profile">
                                <img class="me" src=' . $row['photolink'] . ' alt="Avatar">
                                <div class="info">
                                    <div class="head">
                                        <h1 class="Name">' . $row['name'] . '</h1>
                                    </div>
                                    <div class="chat">
                                        <h2 class="Date">' . $row1['postdate'] . '</h2>
                                    </div>

                                </div>

                            </div>';
                        echo '<div class="caption">
                                <p>' . $row1['content'] . '</p>';
                                if($row1['imagelink']=="none"){
                                }else{
                                    echo '<img class="sea" src=' .$row1['imagelink']. ' />';
                                }
                        $sql = "SELECT * FROM liked WHERE postid='$postid'";
                        $result4 = $conn->query($sql);
                        $i = 0;
                        while ($result4->fetch_assoc()) {
                            $i++;
                        }
                        echo  '<h1> ' . $i . ' Likes </h1>';
                        echo '<div class="comment">
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
                        echo '</div>';
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>
</body>
<script src="company.js"></script>

</html>