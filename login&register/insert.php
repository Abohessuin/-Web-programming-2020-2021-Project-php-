<?php

$dbhost = 'bleowlp0nvlhx4ipkujn-mysql.services.clever-cloud.com';

$dbuser = 'ug0qvs5nb2xs6msh';

$dbpass = 'kcTyXpYKZVE6leVGpJnG';

$dbname = 'bleowlp0nvlhx4ipkujn';

$name = $_POST["name"];
$birthday = $_POST["birthday"];
$mail = $_POST["mail"];
$type = $_POST["type"];
$img= $_POST["custId"];
$pass= $_POST["pass"];
$pass1= $_POST["pass2"];
// Create connection

if( isset($_POST["btn"]) and  $name!="" and  $birthday!="" and  $mail!="" and  $type!="" and  $img!="" and  $pass!="" and $pass==$pass1){

    $conn = new mysqli($dbhost, $dbuser,$dbpass, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

while(true){
  $sql2 = "SELECT userx FROM dummy";
  $result2 = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_array($result2);
   $ID = $row['userx'] ;

   $newuserx=$ID+1;
   $sql3 = "UPDATE dummy SET userx='$newuserx'";
   $result3 = mysqli_query($conn, $sql3);
   

   $sql = "SELECT * FROM user WHERE userid='$ID'";
   
   
   if ($conn->query($sql) === TRUE) {
echo "true" ;
   }
   else {
       break;
   }
   

   
   
}


$sql = "INSERT INTO user (birthdate, name , email , password , photolink , type , userid) VALUES ('$birthday' , '$name' , '$mail' , '$pass' , '$img' , '$type' ,'$ID')";

if ($conn->query($sql) === TRUE) {
    header("Location:  /project/login&register/login.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}

$conn->close();
?>