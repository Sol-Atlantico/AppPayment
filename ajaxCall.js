/*/const xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        const user = JSON.parse(xhr.responseText);

        console.log(user);
    }
};

xhr.open("GET", "https://www.yii2.solatlantico.cv/api/inspeccoes", true);
xhr.send();*/