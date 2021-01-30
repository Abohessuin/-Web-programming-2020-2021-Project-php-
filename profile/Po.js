const LikeBnt = document.querySelectorAll(".Posts .fullpost .icons .fa-heart");
const CommentBnt = document.querySelectorAll(
  ".Posts .fullpost .icons .fa-comment"
);
const Post = document.querySelectorAll(".Post");
const Commentbox = document.querySelectorAll(".Post .caption .comment");
const inputBnt = document.querySelectorAll(".Post .caption .comment input");
const commentBnt = document.querySelectorAll(
  ".Posts .fullpost .icons .fa-paper-plane"
);

const textarea = document.querySelectorAll(".Post .caption .comment textarea");
const Myname = document.querySelectorAll(".Post .profile .info .Name");
const MessBox = document.querySelectorAll(".Post .profile .info .chat .bt");
const chatbox = document.querySelectorAll(".Posts .fullpost .chatbox");
const Send = document.querySelectorAll(".Posts .fullpost .chatbox .fa-envelope-square");
const mess = document.querySelectorAll(".Posts .fullpost .chatbox .messagebox");
const chat = document.querySelectorAll(".Posts .fullpost .chatbox .chats");

const man = document.querySelector(".man");


Send.forEach((s, i) => {
  s.addEventListener("click", (e) => {    
    var stringArray = e.target.className.split(/(\s+)/);
    var postid=stringArray[stringArray.length-1];
    
    var Input = mess[i].value;
    const out = Input+"-"+postid;
    $.post("chat.php", {
      msg: out
    }, function (data) {
    });
    const h1 = document.createElement("h1");
    h1.innerText = Input;
    chat[i].appendChild(h1);
    mess[i].value = "";
  });
});

function updateChat(postid,i){
        console.log(postid+" "+i);
        $.post("chat.php", {recieve: postid}, function(data){ 
          const h1 = document.createElement("h1");
          h1.innerText = data;
          console.log(data);
          chat[i].innerHTML = '';
          chat[i].appendChild(h1);
        });
} 


function test(postid,i){
  updateChat(postid,i);
  setInterval(() => {
    updateChat(postid,i);
    console.log("here");
  }, 1000);
}

MessBox.forEach((mess, i) => {
    mess.addEventListener("click", (e) => {
      if (chatbox[i].style.height !== "30vh") {
        chatbox[i].style.height = "30vh";
        var stringArray = e.target.className.split(/(\s+)/);
        var postid=stringArray[stringArray.length-1];
        test(postid,i);
      } else {
        chatbox[i].style.height = "0vh";
      }
    });
});


LikeBnt.forEach((Like, i) => {
  Like.addEventListener("click", (e) => {
    if (Like.style.background === "rgb(245, 71, 108)" || Like.style.background === "rgb(245, 71, 108) none repeat scroll 0% 0%") {
      var stringArray = e.target.className.split(/(\s+)/);
      var postid=stringArray[stringArray.length-1];
      const out = postid + "-" + "delete";
      console.log(out);
      $.post("post.php", {
        like: out
      }, function (data) {
      });
      Like.style.background = "none";
    } else {
      var stringArray = e.target.className.split(/(\s+)/);
      var postid=stringArray[stringArray.length-1];
      const out = postid + "-" + "add";
      console.log(out);
      $.post("post.php", {
        like: out
      }, function (data) {
      });
      Like.style.background = "rgb(245, 71, 108)";
    }

  });
});

CommentBnt.forEach((comment, i) => {
  comment.addEventListener("click", () => {
    if (Post[i].style.height !== "85vh") {
      Post[i].style.height = "85vh";
      Commentbox[i].style.display = "inline";
    } else {

      Post[i].style.height = "66vh";
      Commentbox[i].style.display = "none";
    }

    if (comment.style.background === "rgb(245, 71, 108)" || comment.style.background === "rgb(245, 71, 108) none repeat scroll 0% 0%") {
      comment.style.background = "";
    } else {
      comment.style.background = "rgb(245, 71, 108)";
    }
  });
});

commentBnt.forEach((comment, i) => {
  comment.addEventListener("click", (e) => {
    textarea[i].append(inputBnt[i].value + "\n");
    var stringArray = e.target.className.split(/(\s+)/);
    var postid=stringArray[stringArray.length-1];
    const out = inputBnt[i].value + "-" + postid;
    console.log(out)
    $.post("post.php", {
      variable: out
    }, function (data) {
    });
    inputBnt[i].value = "";
  });
});


