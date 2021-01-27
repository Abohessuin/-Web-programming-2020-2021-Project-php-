<?php
    header("Content-type: text/css; charset: UTF-8");
?>

* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

body,
html {
background: black;
display: flex;
align-items: center;
flex-direction: column;
width: 100vw;
height: 100vh;
overflow: hidden;
}

/* nav bar */
.all {
width: 100%;
height: 90vh;
display: flex;
justify-content: center;
align-items: center;
}
.nav-header li .fab,
.fas {
font-size: 4rem;
color: #eaede7;
cursor: pointer;
}
.nav-header li .fab:hover {
scale: 1.2;
transition: 0.5s;
color: white;
}
.nav-header li .fas:hover {
scale: 1.2;
transition: 0.5s;
color: white;
}
.nav-header h1 {
font-size: 2rem;
}
.main-head {
color: white;
position: sticky;
top: 0px;
background-color: #25355a;
z-index: 5;
width: 100vw;

box-shadow: 0px 10px 10px rgba(102, 84, 84, 0.5);
}
nav {
display: flex;
width: 90%;
margin: auto;
padding: 2rem;
min-height: 5vh;
align-items: center;
flex-wrap: wrap;
}

nav ul {
display: flex;
flex: 1 1 40rem;
justify-content: space-around;
align-items: center;
list-style: none;
font-family: "Cormorant Garamond", serif;
}
#logo {
flex: 2 1 40rem;
font-family: "Abril Fatface", cursive;
font-weight: 400;
}

nav button {
outline: none;
background: none;
border: none;
}

/* Messages */

.Messages {
width: 30%;
height: 80%;
background-color: rgba(78, 76, 76);
margin-left: 10%;
border-radius: 2%;
position: relative;
box-shadow: 0px 0px 10px rgb(248, 246, 246);
}
.Messages .message {
margin-top: 1%;
width: 100%;
height: 15%;
display: flex;
align-items: center;
background-color: rgb(41, 38, 38);
box-shadow: 0px 0px 10px rgb(248, 246, 246);
cursor: pointer;
}
.Messages .message:hover {
background-color: rgb(187, 181, 181);
}
.Messages .message img {
width: 13.5%;
height: 90%;
object-fit: cover;
border-radius: 50%;
margin-left: 2%;
}
.Messages .message h1 {
font-size: 1.2rem;
margin-left: 2%;
color: azure;
}
.Messages .topbar,
.botbar {
width: 100%;
background-color: azure;
height: 5%;
border-radius: 2%;
}
.Messages .topbar {
position: absolute;
top: 0%;
background-color: rgba(78, 76, 76);
z-index: 5;
border-radius: 2%;
}
.Messages .botbar {
background-color: rgba(78, 76, 76);
position: absolute;
bottom: 0%;

z-index: 5;
border-radius: 2%;
}
.Messages .MessageBox {
height: 90%;
width: 100%;
margin-top: 5%;
background-color: rgba(78, 76, 76);
box-shadow: 0px 0px 10px rgb(248, 246, 246);
overflow-y: scroll;
}

/* Chats */

.Conversation {
width: 40%;
height: 80%;
background-color: rgba(78, 76, 76);
border-radius: 2%;
box-shadow: 0px 0px 10px rgb(248, 246, 246);
margin-left: 2%;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
}
.Conversation .Sending {
width: 95%;
height: 10%;
display: flex;
justify-content: center;
align-items: center;
}
.Conversation .Sending .messagebox {
width: 100%;
height: 65%;
border-radius: 2%;
background: none;
border: solid rgb(41, 38, 38);
font-family: serif;
color: bisque;
box-shadow: 0px 0px 10px rgb(248, 246, 246);
}
.Conversation .Sending .fas {
font-size: 50px;
color: white;
cursor: pointer;

margin-left: 0%;
}
.Conversation .chats {
width: 95%;
height: 90%;
box-shadow: 0px 0px 10px rgb(248, 246, 246);
}
.Conversation .chats .userchat {
width: 100%;
/*height: 15%;*/
height: 0%;
background-color: rgb(41, 38, 38);
}
.Conversation .chats .texts {
width: 100%;
/*height: 85%;*/
height: 0%;
color: aliceblue;
font-size: 0.7rem;
background-color: black;
overflow-y: scroll;
display: flex;

align-items: center;
flex-direction: column;
}
.Conversation .chats .texts h1 {
border-radius: 2%;
background-color: rgb(41, 38, 38);
box-shadow: 0px 0px 10px rgb(248, 246, 246);
padding: 2% 2%;
margin-top: 5px;
width: 90%;
}
.chats .userchat {
margin-top: 1%;
width: 100%;
height: 15%;
display: flex;
border: solid white 1px;
align-items: center;
background-color: rgb(41, 38, 38);
box-shadow: 0px 0px 10px rgb(248, 246, 246);
}

.chats .userchat h1 {
font-size: 1.5rem;
margin-left: 2%;
color: azure;
}

.chats .userchat img {
width: 11%;
height: 90%;
object-fit: cover;
border-radius: 50%;
margin-left: 2%;
}