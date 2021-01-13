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
const MessBox = document.querySelectorAll(".Post .profile .info .chat button");
const chatbox = document.querySelectorAll(".Posts .fullpost .chatbox");
const Send = document.querySelectorAll(".Posts .fullpost .chatbox i");
const mess = document.querySelectorAll(".Posts .fullpost .chatbox .messagebox");
const chat = document.querySelectorAll(".Posts .fullpost .chatbox .chats");

Send.forEach((s, i) => {
  s.addEventListener("click", () => {
    var Input = mess[i].value;
    const h1 = document.createElement("h1");
    h1.innerText = Input;
    chat[i].appendChild(h1);
    mess[i].value = "";
  });
});

MessBox.forEach((mess, i) => {
  mess.addEventListener("click", () => {
    if (chatbox[i].style.height !== "30vh") {
      chatbox[i].style.height = "30vh";
    } else {
      chatbox[i].style.height = "0vh";
    }
  });
});

LikeBnt.forEach((Like, i) => {
  Like.addEventListener("click", () => {
    if (
      Like.style.background === "rgb(245, 71, 108) none repeat scroll 0% 0%"
    ) {
      Like.style.background = "";
      console.log(Like);
    } else {
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
      console.log(4);
      Post[i].style.height = "66vh";
      Commentbox[i].style.display = "none";
    }

    if (
      comment.style.background === "rgb(245, 71, 108) none repeat scroll 0% 0%"
    ) {
      comment.style.background = "";
    } else {
      comment.style.background = "rgb(245, 71, 108)";
    }
  });
});

commentBnt.forEach((comment, i) => {
  comment.addEventListener("click", () => {
    textarea[i].append(inputBnt[i].value + "\n");
    inputBnt[i].value = "";
  });
});
