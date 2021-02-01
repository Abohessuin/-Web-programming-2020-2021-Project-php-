<?php
session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
    header("Location: /project/login&register/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="EditInfoStyle.php">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script type="text/javascript">
        function Function1() {
            var fullPath = document.getElementById("imgPath").value;
            if (fullPath) {
                var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                var filename = fullPath.substring(startIndex);
                if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                    filename = filename.substring(1);
                }
                if(filename.length>0){
                document.getElementById("image").src = "/project/img/"+filename;
                document.getElementById("custId").value = "/project/img/"+filename;
                }
            }

        }
    </script>
</head>

<body>
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

    $sql = "SELECT name,about,bio,skills,password,photolink FROM user WHERE userid='$userId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
?>
    <div class="outer-container">
        <div class="container">
            <div class="title">
                Edit Account Info
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="text-center">
                        <img src=<?php echo $row['photolink'] ?> class="avatar img-circle" alt="avatar" id="image" name="image">
                        <input type="file" class="form-control a" id="imgPath" value="" accept=".jpg,.jpeg,.png" onchange="Function1()">
                    </div>
                </div>
                <div class="col-md-9 personal-info">
                    <form class="form-horizontal" role="form" method="post" action="Process.php">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">name:</label>
                            <div class="col-lg-8">
                                <input type="hidden" id="custId" name="custId" value=<?php echo $row['photolink'] ?>>
                                <input class="form-control" type="text" value=<?php echo $row['name'] ?> name="name">
                            </div>
                        </div>
                        <?php
                        if($_SESSION['type']=='n'){
                            if(!empty($row['skills'])){
                                echo ' <div class="form-group">
                            <label class="col-lg-3 control-label">Skills:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value='.$row['skills'] .' name="skills">
                            </div>
                            </div>';
                            }else{
                                echo ' <div class="form-group">
                                <label class="col-lg-3 control-label">Skills:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" value="none" name="skills">
                                </div>
                                </div>';
                            }
                           
                        }
                        ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bio:</label>
                            <div class="col-lg-8">
                            <input class="form-control" type="text" value=<?php 
                                if(!empty($row['bio'])){
                                    echo $row['bio']; 
                                 }else{ 
                                    echo "none";
                                 }
                                ?> name="bio">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">About:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value=<?php 
                                if(!empty($row['about'])){
                                    echo $row['about']; 
                                 }else{ 
                                    echo "none";
                                 }
                                ?> name="about">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value=<?php echo $row['password'] ?> name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Confirm password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value=<?php echo $row['password'] ?> name="confirmPassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Save Changes" id="bt1" name="saveChangeBtn">
                                <span></span>
                                <input type="submit" class="btn btn-default" value="Cancel" name="cancelBtn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</body>

</html>