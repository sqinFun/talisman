"use strict"
document.addEventListener('DOMContentLoaded', function () {
    let msgSelector = document.querySelector(".message-list");
    async function getMsgList() {
        let msgQuery  = await fetch('/php/getMessageList.php');
        let msgList = await msgQuery.json();
        console.log(msgList);
        msgList.forEach((value)=> {
            let div = document.createElement("div");
            div.className = "section__item-left";
            
            let name = document.createElement("p");
            name.className="section__header";
            name.innerHTML=(value.username);

            let msg = document.createElement("p");
            msg.className="message";
            msg.innerHTML=(value.message);

            let send = document.createElement("a");
            send.className="normal-link";
            send.href = `/sendMessage.php?id=${value.recipient}`
            send.innerHTML = "Ответить"; 

            div.append(name, msg, send);
            msgSelector.append(div);
            console.log(div);
        })
        
    }

    getMsgList();

}, false);