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

    if(isset($_POST['variable'])){
        $var=$_POST['variable'];
        $dataArr = explode("-", $var);
    
        $comment=$_SESSION['name'].':'.$dataArr[0];
        $postid=$dataArr[1];
        
        $sql = "INSERT INTO comment (postid, userid, content) VALUES ('$postid', '$userId', '$comment')";
        $conn->query($sql);
    }else if(isset($_POST['like'])){
        $var=$_POST['like'];
        $dataArr = explode("-", $var);
        $postid = $dataArr[0];
        if($dataArr[1]=="add"){
            $sql = "INSERT INTO liked (postid, userid) VALUES ('$postid', '$userId')";
            $conn->query($sql);
        }else{
            $sql = "DELETE FROM liked WHERE postid='$postid' AND userid='$userId'";
            $conn->query($sql);
        }
    }else if(isset($_POST['btnpost'])){
        $sql2 = "SELECT posty FROM dummy";
        $result2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_array($result2);
        $content=$_POST['content'];
        $img=$_POST['custId'];
        $postid=$row['posty'];
        $sql = "INSERT INTO post (content,imagelink,postid,userid) VALUES ('$content','$img','$postid','$userId')";
        $result = mysqli_query($conn, $sql);
        //update posty
        $newposty=$postid+1;
        $sql3 = "UPDATE dummy SET posty='$newposty'";
        $result3 = mysqli_query($conn, $sql3);

        header("Location:  /project/profile/home.php");

   }
    
    $conn->close();

?>

