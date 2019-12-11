"use strict"

document.addEventListener('DOMContentLoaded', function () {


}, false);

function sendForm(selector, path) {
    let form = document.querySelector(selector);
    let formChild = form.children;

    let userInfo = {};

    try {
        for (let i = 0; i < formChild.length; i++) {
            if (formChild[i].name) {
                userInfo[formChild[i].name] = formChild[i].value;
            }
        }
    } catch (err) {
        console.log(err)
    }

    (async () => {
        console.log(userInfo)
        let query = await fetch(path, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(userInfo)
        })

        let sendInfo = await query.json();

        function sendMessage() {
            if (document.querySelector("#sendForm-msg")) document.querySelector("#sendForm-msg").remove();
            if (sendInfo.msg) {
                form.insertAdjacentHTML('afterend', `<p id="sendForm-msg">${sendInfo.msg}</p>`)
            }
        }

        if (sendInfo.isСorrect) {
            sendMessage()
            form.remove();
        } else {
            sendMessage()
        }
    })();
}