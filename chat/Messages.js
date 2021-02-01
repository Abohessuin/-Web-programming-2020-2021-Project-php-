const Message = document.querySelectorAll(".Messages .message");
const Conimg = document.querySelectorAll(".chats .userchat img ");
const Conname = document.querySelectorAll(".chats .userchat h1 ");
const userchat = document.querySelectorAll(".chats .userchat");
const texts = document.querySelectorAll(".Conversation .chats .texts");
const messagebox = document.querySelectorAll(
  ".Conversation .Sending .messagebox"
);
const send = document.querySelectorAll(".Conversation .Sending .fa-envelope-square");
console.log(send);


function updateChat(postid,i){
  $.post("/project/profile/chat.php", {recieve1: postid}, function(data){ 
    console.log("id: "+postid);
    const h1 = document.createElement("h1");
    h1.innerText = data;
    console.log("msg: "+data);
    texts[i].innerHTML = '';
    texts[i].appendChild(h1);
  });
} 

function test(postid,i){
updateChat(postid,i);
setInterval(() => {
updateChat(postid,i);
}, 1000);
}


Message.forEach((m, i) => {
  m.addEventListener("click", (e) => {
    Conimg[0].attributes[0].nodeValue = m.childNodes[1].attributes[0].nodeValue;
    Conname[0].textContent = m.childNodes[3].textContent;
    userchat[0].style.height = "15%";
    texts[i].style.height = "85%";
    send[i].style.display= "inline";
    var stringArray = e.target.className.split(/(\s+)/);
    var postid=stringArray[stringArray.length-1];
    clearall(i);
    test(postid,i);
  });
});

function clearall(x) {
  texts.forEach((t, i) => {
    if (i !== x) {
      t.style.height = "0%";
      send[i].style.display = "none";
    }
  });
}

function CheckActiveText(x) {
  texts.forEach((t, i) => {
    if (t.style.height !== "0%") {
      const h1 = document.createElement("h1");
      h1.innerText = x;
      t.appendChild(h1);
    }
  });
}


send.forEach((s, i) => {
s.addEventListener("click", (e) => {
  var stringArray = e.target.className.split(/(\s+)/);
  var postid=stringArray[stringArray.length-1];
  var V = messagebox[0].value;
  
  const out = V+"-"+postid;
  $.post("/project/profile/chat.php", {
    msg1: out
  }, function (data) {
  });

  CheckActiveText(V);
  console.log(i);
  messagebox[0].value = "";
});
});