<?php
    header("Content-type: text/css; charset: UTF-8");
?>
*{
    overflow-x: hidden;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.outer-container {
    width: 100vw;
    height: 100vh;
    background-color: black;
}
.container {
    width: 40%;
    height: 85%;
    background-color: white;
    box-shadow: 2px 2px white;
    border: 5px solid red;
    border-radius: 10px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    padding: 20px;
}
.form-control{
    margin-top: 10px;
    padding-top: 5px;
}
.a{
   padding: 3px !important;
   text-align: center !importanta;
}
.title {
    font-size: 30px;
}
img {
    border-radius: 50%;
}
