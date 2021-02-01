<?php
session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
    header("Location: /project/login&register/login.php");
    exit();
}
?>
<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
        $dbhost = 'bleowlp0nvlhx4ipkujn-mysql.services.clever-cloud.com';

        $dbuser = 'ug0qvs5nb2xs6msh';

        $dbpass = 'kcTyXpYKZVE6leVGpJnG';

        $dbname = 'bleowlp0nvlhx4ipkujn'; 

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);


    if(isset($_POST["saveChangeBtn"])){
        $name = $_POST["name"];
        $skills = $_POST["skills"];
        $about = $_POST["about"];
        $bio = $_POST["bio"];
        $password = $_POST["password"];
        $src = $_POST["custId"];
        $userId = $_SESSION['id'];
        
        $sql = "UPDATE user SET name='$name',
        password='$password',skills='$skills',bio='$bio',about='$about',photolink='$src' WHERE userid = '$userId' ";
        $result = mysqli_query($conn, $sql);
        if($result){
            if($_SESSION['type']=='n'){
                header("Location: /project/profile/userprofile.php");
                exit();
            }else{
                header("Location: /project/profile/companyprofile.php");
                exit();
            }
           
        }
    }else if(isset($_POST["cancelBtn"])){
        if($_SESSION['type']=='n'){
            header("Location: /project/profile/userprofile.php");
            exit();
        }else{
            header("Location: /project/profile/companyprofile.php");
            exit();
        }
       
    }    

?>
