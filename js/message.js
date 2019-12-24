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
        document.querySelector(".message__history").innerHTML = null;
        getMsgList();
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
        result.forEach((value) => {
            let user = document.createElement("p");
            let msg = document.createElement("p");
            if (value.recipient !== recipient) {
                user.className = "message-list__sender";
                msg.className = "message-list__message-sender";
            } else {
                user.className = "message-list__recipient";
                msg.className = "message-list__message-recipient";
            }
            console.log(value);
            user.innerHTML = value.username;
            
            msg.innerHTML = value.message;
            msgList.append(user, msg);
        });
    }

    getMsgList();



}, false);
