<?php
session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
    header("Location: /project/login&register/login.php");
    exit();
}
header("Location: /project/login&register/login.php");
exit();
?>
<?php

session_unset();
session_destroy(); 

?>
