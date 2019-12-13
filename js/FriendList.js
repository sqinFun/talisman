document.addEventListener('DOMContentLoaded', function () {

    (async()=> {
        let userList = await fetch("/php/getFriendList.php");
        let friendLisn = await userList.json();
        console.log(friendLisn);

        let friendWrap = document.createElement("div");
        friendWrap.className = "friend";
        friendLisn.forEach((item)=> {
            let div = document.createElement("div");
            div.className = "friend__item";

            let p = document.createElement("p");
            p.className = "friend__name";
            p.innerHTML = item.username

            let a = document.createElement("a");
            a.href = `/sendMessage.php?id=${item.recipient}`;
            a.innerHTML = "Написать сообщение";
            div.append(p, a);
            friendWrap.append(div);
        });
        document.querySelector('.container').append(friendWrap);
    })();

}, false);