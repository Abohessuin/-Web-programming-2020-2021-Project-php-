const Message = document.querySelectorAll(".Messages .message");
const Conimg= document.querySelectorAll(".chats .userchat img ");
const Conname= document.querySelectorAll(".chats .userchat h1 ");
const userchat= document.querySelectorAll(".chats .userchat");
const texts= document.querySelectorAll(".Conversation .chats .texts");
const messagebox= document.querySelectorAll(".Conversation .Sending .messagebox");
const send= document.querySelectorAll(".Conversation .Sending .fas");

Message.forEach((m, i) => {
    m.addEventListener("click", () => {
     Conimg[0].attributes[0].nodeValue=m.childNodes[1].attributes[0].nodeValue;
     Conname[0].textContent=m.childNodes[3].textContent;
     userchat[0].style.height="15%";
     texts[i].style.height="85%";
     clearall(i);
    })
});

function clearall(x){
    texts.forEach((t, i) => {
        if(i!==x){
        t.style.height="0%";
        }
    });
}

function CheckActiveText(x){
    texts.forEach((t, i) => {
        if(t.style.height!=="0%"){
            const h1 = document.createElement("h1");
            h1.innerText = x;
            t.appendChild(h1);
        }
    });
}

    send[0].addEventListener("click", (e) => {

       const postid=e.target.className[e.target.className.length - 1];
       var V = messagebox[0].value;
       const out=messagebox[0].value+"-"+postid;
       console.log(postid);
       console.log(out);
       CheckActiveText(V)
       $.post("chatback.php",{
          hello: out
       })
        messagebox[0].value="";
    });
