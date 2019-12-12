"use strict";

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector("#friend-form").onsubmit = submit;

    async function addFriend(userData) {
        console.log(JSON.stringify(userData));

        let response = await fetch('php/addFriend.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(userData)
        })
        
        let msg = await response.json();
        return msg;
    }

    async function submit(event) {
        let userList = sendForm('#friend-form', '/php/findFriend.php');
        userList.then(function (val) {
            let wrap = document.createElement('div');
            wrap.className = "friends";

            val.addition.forEach((user) => {
                let div = document.createElement('div');
                div.className = "friends__item";

                let btn = document.createElement('button');
                div.className = "friends__add";

                btn.onclick = async (event) => {
                    let result = await addFriend(user);

                    let msg = document.createElement("p");
                    msg.className = "friends__msg";
                    msg.innerHTML = result;
                    if(document.querySelector('.friends__msg')) document.querySelector('.friends__msg').remove();
                    event.target.after(msg);
                    console.log(result);
                }
                btn.innerHTML = "Добавить в друзья";

                let p = document.createElement("p");
                p.innerHTML = user.username;

                div.append(p, btn);
                wrap.append(div);

            });
            if (document.querySelector(".friends")) document.querySelector(".friends").remove();
            document.querySelector("#friend-form").after(wrap);
        });


        event.preventDefault();
    }

}, false);