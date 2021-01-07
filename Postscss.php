<?php
    header("Content-type: text/css; charset: UTF-8");
?>

* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

body {
background-color: #272a2f;
display: flex;
justify-content: center;
align-items: center;
}

.Posts {
background-color: #272a2f;
width: 60vw;
height: 100%;
margin-top: 2%;
border-radius: 1%;
box-shadow: 0px 10px 10px rgba(245, 71, 108, 1);
display: flex;
flex-direction: column;
}

.Posts .fullpost {
width: 100%;
height: 100%;
display: flex;
position: relative;
}
.Posts .fullpost .chatbox {
width: 10vw;
height: 0vh;

transition: width 2s;
transition: all 1.5s ease-out;
/*
display:inline;
height: 30vh;*/
margin-left: 2%;
margin-top: 5%;
border: solid;
border-width: 0.1px;
border-color: rgb(245, 71, 108);
border-radius: 2%;
box-shadow: 0px 10px 10px rgba(245, 71, 108, 0.5);
position: relative;
}
.Posts .fullpost .chatbox .chats {
width: 100%;
height: 88%;
overflow: scroll;
overflow-x: hidden;
/*background-color: aliceblue;*/
}
.Posts .fullpost .chatbox .chats h1 {
font-size: larger;
color: aliceblue;
/*background-color: aliceblue;*/
}
.Posts .fullpost .chatbox i {
position: absolute;
font-size: 35px;
cursor: pointer;
margin-top: 0%;
right: 1%;
color: rgb(224, 231, 235);
/*background-color: aliceblue;*/
}
.Posts .fullpost .chatbox i:hover {
color: rgb(167, 26, 57);
/*background-color: aliceblue;*/
}
.Posts .fullpost .chatbox .messagebox {
width: 100%;
height: 2.05rem;
margin-top: 0%;
background: none;
border: solid;
border: none;
border-top: solid rgb(245, 71, 108);
border-width: 0.1px;
font-family: "Cormorant Garamond", serif;
color: aliceblue;
/*background-color: aliceblue;*/
}
.Posts .fullpost .icons {
display: flex;
flex-direction: column;
position: absolute;
top: 55%;
left: 87%;
}

.Posts .fullpost .icons i {
font-size: 70px;
margin-bottom: 60%;
color: aliceblue;
cursor: pointer;
border-radius: 50%;
background: #272a2f;
box-shadow: 0px 10px 10px rgba(245, 71, 108, 1);
}

.Posts .fullpost .icons i:hover {
background-color: rgb(167, 26, 57);
}

.Post {
background-color: #272a2f;
box-shadow: 0px 10px 10px rgba(245, 71, 108, 1);
margin-top: 5%;
margin-left: 5%;
border-radius: 0.5%;
transition: width 2s;
transition: all 0.75s ease-out;
border: solid rgb(245, 71, 108);
border-width: 0.1px;
width: 45vw;
height: 66vh;
/* height: 82vh; */
}

.Post .profile {
display: flex;
}

.Post .profile img {
flex: 0.1 1;
width: 9%;
border-radius: 10%;
box-shadow: 0px 10px 10px rgba(245, 71, 108, 0.5);
margin-top: 2%;
margin-left: 2%;
}

.Post .profile .info {
flex: 2 1;
margin-top: 7%;
margin-left: 2%;
display: flex;
justify-content: space-between;
}
.Post .profile .info .chat {
display: flex;
flex-direction: column;
}
.Post .profile .info .chat button {
display: flex;
flex-direction: column;
padding: 0.5rem 1rem;
margin-right: 1rem;
cursor: pointer;
border-color: rgb(245, 71, 108);
border-radius: 5%;
color: aliceblue;
box-shadow: 0px 10px 10px rgba(245, 71, 108, 0.1);
background: none;
font-family: "Cormorant Garamond", serif;
}
.Post .profile .info .chat button:hover {
background-color: rgb(245, 71, 108);
color: aliceblue;
}
.Post .profile .info h1 {
color: whitesmoke;
font-family: "Cormorant Garamond", serif;
font-size: x-large;
}

.Post .profile .info h2 {
color: rgb(245, 71, 108);
font-family: "Cormorant Garamond", serif;
font-size: small;
margin-right: 2%;
}

.Post .profile .info .Hr {
font-size: smaller;
color: rgb(245, 71, 108);
font-family: "Courier New", Courier, monospace;
}

.Post .caption {
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
}

.Post .caption .comment {
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
margin-top: 2%;
width: 90%;

transition: all 0.75s ease-out;
/* displ inline */
display: none;
}

.Post .caption .comment input {
box-shadow: 0px 10px 10px rgba(245, 71, 108, 0.05);
margin-top: 1%;
padding: 1rem 2rem;
width: 80%;
border-radius: 1%;
color: aliceblue;
margin-left: 10%;
font-family: "Cormorant Garamond", serif;
background: #272a2f;
}

.Post .caption .comment textarea {
box-shadow: 0px 10px 10px rgba(245, 71, 108, 0.05);
margin-top: 1%;
color: aliceblue;
font-size: medium;
width: 100%;
border-radius: 1%;
font-family: "Cormorant Garamond", serif;
background: #272a2f;
pointer-events: none;
}

.Post .caption p {
font-family: "Cormorant Garamond", serif;
font-size: x-large;
color: whitesmoke;
margin-top: 4%;
margin-left: 2%;
}

.Post .caption .sea {
margin-top: 1%;
width: 30vw;
box-shadow: 0px 10px 10px rgba(245, 71, 108, 0.2);
}