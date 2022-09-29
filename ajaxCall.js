/*/const xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        const user = JSON.parse(xhr.responseText);

        console.log(user);
    }
};

xhr.open("GET", "https://www.yii2.solatlantico.cv/api/inspeccoes", true);
xhr.send();*/

/*let btn = document.querySelector("#btn");
let list = document.querySelector("#list");

btn.addEventListener("click", function() {
  fetch('https://reqres.in/api/users?page=2')
    .then(function(response) {
      return response.json();
    })
    .then(function(response) {
      console.log(response);
    })
})*/