<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./Postscss.php" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
</head>

<body>

    <div class="Posts">
        <div class="fullpost">
            <div class="Post">
                <div class="profile">
                    <img class="me" src="/imges/pexels-photo-220453.jpeg" alt="Avatar">
                    <div class="info">
                        <div class="head">
                            <h1 class="Name">Simon Smith</h1>
                            <h1 class="Hr">3h ago</h1>
                        </div>
                        <div class="chat">
                            <button>Message Me</button>
                            <h2 class="Date">2021/1/2</h2>
                        </div>

                    </div>

                </div>
                <div class="caption">
                    <p>if U Don't Like The World that U Live In U Must have The Power to Change it</p>
                    <img class="sea" src="imges/pexels-markus-spiske-129105.jpg" alt="sea" />
                    <div class="comment">
                        <input class="typecomment" type="text" placeholder="Comment Here ...">
                        <textarea name="comments" id="comments" cols="30" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="icons">
                <i class="far fa-heart"></i>
                <i class="far fa-comment"></i>
                <i class="far fa-paper-plane"></i>
            </div>
            <div class="chatbox">
                <div class="chats"></div>
                <input class="messagebox" type="text"></input>
                <i class="fas fa-envelope-square"></i>
            </div>
        </div>

    </div>
</body>

<script src="./Po.js"></script>

</html>