<?php

$dbhost = 'bleowlp0nvlhx4ipkujn-mysql.services.clever-cloud.com';

$dbuser = 'ug0qvs5nb2xs6msh';

$dbpass = 'kcTyXpYKZVE6leVGpJnG';

$dbname = 'bleowlp0nvlhx4ipkujn';

$name = $_POST["name"];
$pass= $_POST["pass"];

// Create connection

if( isset($_POST["btn"]) and $name!="" and $pass!=""){

    $conn = new mysqli($dbhost, $dbuser,$dbpass, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

 $sql = "SELECT name, password FROM user WHERE name='$name' AND password='$pass'";

 if ($conn->query($sql) === FALSE) {
    echo "You Need To SignUp First";
  } else {
    echo "Welcome '$name' \n ";
  }
    

}
$conn->close();
?>