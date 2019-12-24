document.addEventListener('DOMContentLoaded', function () {

    (async()=> {
        let userList = await fetch("/php/getFriendList.php");
        let friendLisn = await userList.json();
        console.log(friendLisn);

        let friendWrap = document.createElement("div");
        friendWrap.className = "section";
        friendLisn.forEach((item)=> {
            let div = document.createElement("div");
            div.className = "section__item-right";

            let p = document.createElement("p");
            p.className = "section__header";
            p.innerHTML = item.username

            let a = document.createElement("a");
            a.className = "normal-link"
            a.href = `/sendMessage.php?id=${item.recipient}`;
            a.innerHTML = "Написать сообщение";
            div.append(p, a);
            friendWrap.append(div);
        });
        document.querySelector('.friends-wrap').append(friendWrap);
    })();

}, false);