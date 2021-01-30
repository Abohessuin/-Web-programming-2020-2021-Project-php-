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

    if(isset($_REQUEST['msg'])){
        $var=$_REQUEST['msg'];
        $dataArr = explode("-", $var);
    
        $comment=$_SESSION['name'].':'.$dataArr[0]."\n";
        $postid=$dataArr[1];
        
        echo $comment;
        echo "  ".$postid." ";

        $sql = "SELECT userid FROM post WHERE postid='$postid'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $reciverid = $row['userid'];

        echo $userId."  ".$reciverid;

        $sql = "SELECT content FROM chat WHERE curruser='$userId' AND userid='$reciverid'";
        $result = mysqli_query($conn, $sql);
        if($row = $result->fetch_assoc()){
            $newcontent = $row['content'];
            $newcontent.=$comment;
            $sql = "UPDATE chat SET content='$newcontent' WHERE curruser='$userId' AND userid='$reciverid'";
            $result = mysqli_query($conn, $sql);
        }else{
            $sql = "SELECT content FROM chat WHERE curruser='$reciverid' AND userid='$userId'";
            $result = mysqli_query($conn, $sql);
            if($row = $result->fetch_assoc()){
            $row = $result->fetch_assoc();
            $newcontent = $row['content'];
            $newcontent.=$comment;
            $sql = "UPDATE chat SET content='$newcontent' WHERE curruser='$reciverid' AND userid='$userId'";
            $result = mysqli_query($conn, $sql);
            }else{
                $sql = "INSERT INTO chat (curruser,userid,content) VALUES ('$userId','$reciverid','$comment')";
                $result = mysqli_query($conn, $sql);
            }
        }
    }else if(isset($_REQUEST['recieve'])){
        $postid = $_REQUEST['recieve'];
        $sql = "SELECT userid FROM post WHERE postid='$postid'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $recieverid = $row['userid'];
        
        $sql = "SELECT content FROM chat WHERE curruser='$userId' AND userid='$recieverid'";
        $result = mysqli_query($conn, $sql);
        if($row = $result->fetch_assoc()){
            echo $row['content']."\n";
        }else{
            $sql = "SELECT content FROM chat WHERE curruser='$recieverid' AND userid='$userId'";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            echo $row['content']."\n";
        }
    }else if(isset($_REQUEST['recieve1'])){
        $recieverid = $_REQUEST['recieve1'];
        $sql = "SELECT content FROM chat WHERE curruser='$userId' AND userid='$recieverid'";
        $result = mysqli_query($conn, $sql);
        if($row = $result->fetch_assoc()){
            echo $row['content']."\n";
        }else{
            $sql = "SELECT content FROM chat WHERE curruser='$recieverid' AND userid='$userId'";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            echo $row['content']."\n";
        }
    }else if(isset($_REQUEST['msg1'])){
        $var=$_REQUEST['msg1'];
        $dataArr = explode("-", $var);
    
        $comment=$_SESSION['name'].':'.$dataArr[0]."\n";
        $postid=$dataArr[1];
        $reciverid = $postid;

        $sql = "SELECT content FROM chat WHERE curruser='$userId' AND userid='$reciverid'";
        $result = mysqli_query($conn, $sql);
        if($row = $result->fetch_assoc()){
            $newcontent = $row['content'];
            $newcontent.=$comment;
            $sql = "UPDATE chat SET content='$newcontent' WHERE curruser='$userId' AND userid='$reciverid'";
            $result = mysqli_query($conn, $sql);
        }else{
            $sql = "SELECT content FROM chat WHERE curruser='$reciverid' AND userid='$userId'";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            $newcontent = $row['content'];
            $newcontent.=$comment;
            $sql = "UPDATE chat SET content='$newcontent' WHERE curruser='$reciverid' AND userid='$userId'";
            $result = mysqli_query($conn, $sql);
        }
    }
    $conn->close();
