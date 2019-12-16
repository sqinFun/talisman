"use strict"
document.addEventListener('DOMContentLoaded', function () {
    let msgSelector = document.querySelector(".message-list");
    async function getMsgList() {
        let msgQuery  = await fetch('/php/getMessageList.php');
        let msgList = await msgQuery.json();
        console.log(msgList);
        msgList.forEach((value)=> {
            let div = document.createElement("div");
            div.className = "message-list__item";
            
            let name = document.createElement("p");
            name.className="message-list__username";
            name.innerHTML=(value.username);

            let msg = document.createElement("p");
            msg.className="message-list__message";
            msg.innerHTML=(value.message);

            let send = document.createElement("a");
            send.href = `/sendMessage.php?id=${value.recipient}`
            send.innerHTML = "Ответить"; 

            div.append(name, msg, send);
            msgSelector.append(div);
            console.log(div);
        })
        
    }

    getMsgList();

}, false);
