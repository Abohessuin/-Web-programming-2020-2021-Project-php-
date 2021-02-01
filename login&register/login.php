<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
    body {

        margin: 0;
        color: #6a6f8c;
        background-color: #2B3E6B;
        font: 600 16px/18px 'Open Sans', sans-serif;

    }

    *,
    :after,
    :before {
        box-sizing: border-box
    }

    .clearfix:after,
    .clearfix:before {
        content: '';
        display: table
    }

    .clearfix:after {
        clear: both;
        display: block
    }

    a {
        color: inherit;
        text-decoration: none
    }

    .login-wrap {
        width: 100%;
        margin: auto;
        margin-top: 5%;
        max-width: 525px;
        min-height: 670px;
        position: relative;
        background: url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;
        box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);

    }

    .login-html {
        width: 100%;
        height: 100%;
        position: absolute;
        padding: 90px 70px 50px 70px;
        background: rgba(40, 57, 101, .9);
    }

    .login-html .sign-in-htm,
    .login-html .sign-up-htm {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        transform: rotateY(180deg);
        backface-visibility: hidden;
        transition: all .4s linear;
    }

    .login-html .sign-in,
    .login-html .sign-up,
    .login-form .group .check {
        display: none;
    }

    .login-html .tab,
    .login-form .group .label,
    .login-form .group .button {
        text-transform: uppercase;
    }

    .login-html .tab {
        font-size: 22px;
        margin-right: 15px;
        padding-bottom: 5px;
        margin: 0 15px 10px 0;
        display: inline-block;
        border-bottom: 2px solid transparent;
    }

    .login-html .sign-in:checked+.tab,
    .login-html .sign-up:checked+.tab {
        color: #fff;
        border-color: #1161ee;
    }

    .login-form {
        min-height: 345px;
        position: relative;
        perspective: 1000px;
        transform-style: preserve-3d;
    }

    .login-form .group {
        margin-bottom: 15px;
    }

    .login-form .group .label,
    .login-form .group .input,
    .login-form .group .button {

        width: 100%;
        color: #fff;
        display: block;
    }

    .login-form .group .input,
    .login-form .group .button {
        border: none;
        padding: 15px 20px;
        border-radius: 25px;
        background: rgba(255, 255, 255, .1);
    }

    .login-form .group input[data-type="password"] {
        -webkit-text-security: circle;
    }

    .login-form .group .label {
        color: #aaa;
        font-size: 12px;
    }

    .login-form .group .button {
        background: #1161ee;
    }

    .login-form .group label .icon {
        width: 15px;
        height: 15px;
        border-radius: 2px;
        position: relative;
        display: inline-block;
        background: rgba(255, 255, 255, .1);
    }

    .login-form .group label .icon:before,
    .login-form .group label .icon:after {
        content: '';
        width: 10px;
        height: 2px;
        background: #fff;
        position: absolute;
        transition: all .2s ease-in-out 0s;
    }

    .login-form .group label .icon:before {
        left: 3px;
        width: 5px;
        bottom: 6px;
        transform: scale(0) rotate(0);
    }

    .login-form .group label .icon:after {
        top: 6px;
        right: 0;
        transform: scale(0) rotate(0);
    }

    .login-form .group .check:checked+label {
        color: #fff;
    }

    .login-form .group .check:checked+label .icon {
        background: #1161ee;
    }

    .login-form .group .check:checked+label .icon:before {
        transform: scale(1) rotate(45deg);
    }

    .login-form .group .check:checked+label .icon:after {
        transform: scale(1) rotate(-45deg);
    }

    .login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
        transform: rotate(0);
    }

    .login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
        transform: rotate(0);
    }


    .foot-lnk {

        text-align: center;
    }

    .logo {
        margin-left: 45%;
        height: 40px;
        margin-bottom: 5%;
    }

    .login-html img {
        height: 30;
        width: 30;
        margin: auto;
    }
    </style>

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
                    document.getElementById("custId").value = "/project/img/"+filename;
                }
            }

        }
    </script>

</head>

<body>
    <div class="logo">
        <img src="/project/img/logo.png">
    </div>
    <div class="login-wrap">

        <div class="login-html">

            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
                In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <form class="sign-in-htm" method="post" action="Signin.php">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" name="name" required class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" name="pass" required class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" name="btn" value="SignIn">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </form>
                <form class="sign-up-htm  sign" method="post" action="insert.php">
                    <div class="group">
                        <label for="img" class="label">Upload image:</label>
                        <input type="file" class="form-control a" id="imgPath" value="" accept=".jpg,.jpeg,.png" onchange="Function1()">
                        <input type="hidden" id="custId" name="custId" value="/project/img/img3.png">
                    </div>
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" name="name" required class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass1" type="password" name="pass" required class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass2" type="password" class="input" name="pass2" required data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label>
                        <input id="pass" type="text" name="mail" required class="input">
                    </div>
                    <div class="group">
                        <label for="birthday" class="label">Date of birth:</label>
                        <input type="date" id="birthday" required name="birthday">
                    </div>
                    <div class="group">
                        <input type="radio" id="company" name="type" value="c">
                        <label for="company"> Company </label>
                        <input type="radio" id="user" name="type" value="n" checked>
                        <label for="user"> User </label>
                    </div>
                    <div class="group group1">
                        <input type="submit" class="button btn" name="btn" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="sign.js"></script>

</html>