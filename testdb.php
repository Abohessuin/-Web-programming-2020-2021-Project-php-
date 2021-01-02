<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '12345678';
         $dbname = 'linkedon';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully<br>';
         $sql = 'SELECT id FROM test';
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               echo "id: " . $row["id"]. "<br>";
            }
         } else {
            echo "0 results";
         }
         mysqli_close($conn);



?>