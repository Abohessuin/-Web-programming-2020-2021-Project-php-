<?php

        ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
        $dbhost = 'bleowlp0nvlhx4ipkujn-mysql.services.clever-cloud.com';

        $dbuser = 'ug0qvs5nb2xs6msh';

        $dbpass = 'kcTyXpYKZVE6leVGpJnG';

        $dbname = 'bleowlp0nvlhx4ipkujn'; 

         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);


    $curruser= 1;
    $hello = $_POST['hello'];
    $dataArr = explode("-", $hello);
    $userid= $dataArr[1];
    $sql= "SELECT content FROM chat WHERE curruser=1 AND userid=4 ";
    $result= mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $msg = $dataArr[0];
    
    $newmsg="";
   $newmsg.= $msg;
    $newmsg .= $row['content'];

    //getting the sender id

    //getting the reciver id
    $sql2= "UPDATE chat SET content='$newmsg' WHERE curruser=1 AND userid=4 ";
    $result2= mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);




 
  ?>