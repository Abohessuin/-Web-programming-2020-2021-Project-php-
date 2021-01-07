<?php
    header("Content-type: text/css; charset: UTF-8");
?>

*{
    padding: 0px;
    margin: 0px;
    box-sizing:border-box;

    
}
 

.Container{
    width:100%;
    height:auto;
    background-color:black;
    padding-left:200px;
    padding-top:100px;
    perspective: 1000px;
    
}
.introduction{
   width:80%;
   border:5px solid black;
   border-radius:15px;
   overflow:hidden;
   box-shadow: 0 1px 10px #461800;
   
   
}

.upperBackground{
    width:100%;
    height:250px;
    
   
}

.img1{
    width:100%;
    height:100%;
    object-fit:cover;

}
.whiteSpace{
    background-color:white;
    width:100%;
    height:150px
    
}

.profileImg{
    height:150px;
    width:150px;
    border-radius:50%;
    border:none;
    position:absolute;
    bottom:2%;
    filter: drop-shadow(30px 30px 30px rgb(166, 189, 204));
}

.img2{
    max-width:100%;
    height:100%;
    border-radius:50%;

}

.content{
    display:flex;
    flex-direction:row;
    margin-left:150px;
    position:relative;
    
}

.name{
    font-family: 'Abril Fatface', cursive;
    font-size:2vw;
    background-color:white;
    text-shadow:1px 1px black;
}
.info{
    margin-top:30px;
    margin-left:190px;
    display:flex;
    flex-direction:column;
    height:64px;
    justify-content:space-between;
    background-color:white;
    
   
}
.workInfo{
    background-color:white;
}

.About{
   width:80%;
   height:auto;
   display:flex;
   flex-direction:column;
   justify-content:space-between;
   background-color:white;
   background-color:white;
   padding:0.5%;
   overflow:hidden;
   margin-top:28px;
   border:2px solid black;
   border-radius:10px;
   box-shadow: 0 1px 15px #461800;
}

.aboutInfo{
    background-color:white;
}

.about{
    background-color:white;
    font-size:2.5vw;
    
}

.moreInfo{
   width:80%;
   height:auto;
   display:flex;
   background-color:white;
   padding:0.5%;
   border:2px solid black;
   border-radius:10px;
   overflow:hidden; 
   margin-top:28px

}

.leftInfo{
    width:40%;
 
}

.userSkills{
    display:flex;
    justify-content:flex-start;
    flex-wrap:wrap;
    padding:5px;
    text-align:center;
 
    
}



.skill{
    display:flex;
    justify-content:center;
    align-items:center;
    width:auto;
    height:20px;
    font-size:1vw;
    margin:5px;
    padding:20px;



}

.links{
    width:90%;
    margin-top:20px;
    display:flex;
    justify-content:space-between;
    margin-left:20px;
}

 button{
     width:100px;
    font-size: 15px;
    padding:10px;
    border-radius: 4px;
    border: 2px solid #4CAF50;
 
}

.skills{
    border:5px solid gray;
    padding:5px;
}