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



}, false);
