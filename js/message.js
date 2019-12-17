"use strict"
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.message__form').onsubmit = sendMsg;
    
    
    async function sendMsg(event) {
        event.preventDefault();
        let msg = document.querySelector(".message__text").value;

        var recipient = location.search.split("=")[1];
        let sendData = {
            'msg': msg,
            'recipient': recipient
        }

        let query = await fetch('/php/sendMessage.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(sendData)
        })
        let result = await query.json();
        if (result == true) document.querySelector('.message__text').value = null;
    }

    async function getMsgList() {

        var recipient = location.search.split("=")[1];
        let sendData = {
            'recipient': recipient
        }

        let query = await fetch('/php/getMessageHistory.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(sendData)
        })
        let result = await query.json();
        console.log(result);
        let msgList = document.querySelector(".message__history");
        result.forEach((value)=> {
            let user = document.createElement("p");
            user.className = "message-list__sender";
            user.innerHTML = value.username;

            let msg = document.createElement("p");
            msg.className = "message-list__message";
            msg.innerHTML = value.message;
            msgList.append(user, msg);
        });
    }
    
    getMsgList();






}, false);
