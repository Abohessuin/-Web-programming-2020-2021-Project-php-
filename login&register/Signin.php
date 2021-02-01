<?php
session_start();
$dbhost = 'bleowlp0nvlhx4ipkujn-mysql.services.clever-cloud.com';

$dbuser = 'ug0qvs5nb2xs6msh';

$dbpass = 'kcTyXpYKZVE6leVGpJnG';

$dbname = 'bleowlp0nvlhx4ipkujn';

$name = $_POST["name"];
$pass= $_POST["pass"];

// Create connection

$flag = false;

if( isset($_POST["btn"]) and $name!="" and $pass!=""){

    $conn = new mysqli($dbhost, $dbuser,$dbpass, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

 $sql = "SELECT name, password,userid,type FROM user WHERE name='$name' AND password='$pass'";
    
 $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['userid'];
    $_SESSION['type']=$row['type'];
    $_SESSION['name']=$row['name'];

    $flag = true;
  } else {
    echo "You Need To SignUp First";
  }
  $conn->close();
  if($flag){
    header("Location:  /project/profile/home.php");
    exit();
  }
}
?>