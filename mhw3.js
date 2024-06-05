//cambio immagine Thorfinn
const Thorfinn = document.querySelector("#section3 img");
Thorfinn.addEventListener("click", ClickThorfinn);

function ClickThorfinn(event) {
    console.log("Thorfinn Clicked");
    const el = event.currentTarget;
    el.src = "https://www.animeclick.it/immagini/personaggio/Thorfinn/gallery_original/Thorfinn-5d6f842d8fe9c.jpg";
    const p = document.querySelector("#section3 p");
    p.textContent = "YOU have no enemies";
    const section3 = document.querySelector("#section3");
    section3.classList.add("black");
}

const thumbsup = document.querySelector("#thumbsup");
thumbsup.addEventListener("click", ClickB);

function ClickB(event) {
    const Thorfinn = document.querySelector("#section3 img");
    Thorfinn.src = "https://static0.gamerantimages.com/wordpress/wp-content/uploads/2023/01/vinland-saga-events-thorfinn-season-2-cropped.jpg";
    const p = document.querySelector("#section3 p");
    p.textContent = "I have no enemies";
    const section3 = document.querySelector("#section3");
    section3.classList.remove("black");
}




//accesso
const info = document.querySelector("#info");
info.addEventListener("click", finfo);

function finfo() {
    console.log("accedi");
    const el = document.querySelector("article .accedi");
    if (el.classList.contains("hidden")) {
        el.classList.remove("hidden");
    } else { console.log("non accesso"); }
}


const x = document.querySelector("#x");
x.addEventListener("click", fx);

const vett = document.querySelectorAll(".accedi button");
vett.forEach(function (elemento) {
    elemento.addEventListener("click", fx);
});


function fx(event) {
    console.log("x");
    const el = document.querySelector("article .accedi");
    el.classList.add("hidden");
}






//aggiunge passioni
const passion = document.querySelector("section button");
passion.addEventListener("click", fpassion);

function fpassion(event) {
    const sect = document.querySelector("section");
    sect.dataset.grandezza = "grande";
    const terzop = document.querySelector("#terzopaio");
    terzop.classList.remove("hidden");
    const button = event.currentTarget;
    button.textContent = "Torna indietro";
    passion.removeEventListener("click", fpassion);
    passion.addEventListener("click", passionindietro);
}

function passionindietro(event) {
    const sect = document.querySelector("section");
    sect.dataset.grandezza = "piccolo";
    const terzop = document.querySelector("#terzopaio");
    terzop.classList.add("hidden");
    const button = event.currentTarget;
    button.textContent = "Tutte le mie Passioni";
    passion.removeEventListener("click", passionindietro);
    passion.addEventListener("click", fpassion);
}




//logout
const imglogout = document.querySelector("#logout");
imglogout.addEventListener("click", flogout);

function flogout(event) {
    console.log("ciao");
    fetch("http://localhost/logout.php").then(response => {
        if (response.redirected) {
            window.location.href = response.url; // Redirect to the URL specified in the Location header
        }
    });
}




//cliccando sulle immagini cambi pagina 
const gaming = document.querySelector(".img1");
gaming.addEventListener("click", fgaming);

function fgaming(event) {
    window.location.href = "gaming.php";
}


const music = document.querySelector(".img2");
music.addEventListener("click", fmusic);

function fmusic(event) {
    window.location.href = "music.php";
}



//mi piace diventano blu e aggiorno il DB
const mipiace = document.querySelectorAll(".likebutton");
mipiace.forEach(function (elemento) {
    elemento.addEventListener("click", fmipiace);
});
function fmipiace(event) {
    const el = event.currentTarget;
    const numero = el.dataset.numero;
    let param;
    
    if (el.src.includes("unclickedlike.png")) {

        el.src = "like.png";
        if (el.classList.contains('inverti-colori')) {
            el.classList.remove('inverti-colori');
        }
        param = "click";
    }
    else if (el.src.includes("like.png")) {

        el.src = "unclickedlike.png";
        if (numero === '6') {
            el.classList.add('inverti-colori');
        }
        param = "unclick";
    }
    console.log(param);
    fetch("http://localhost/mipiace.php?image=" + numero + "&param=" + param).then(response => {
    if (response.redirected) {
      window.location.href = response.url; // Redirect to the URL specified in the Location header
    }
  });

    event.stopPropagation();
    console.log(numero);
}





//se il mi piace è nel DB, aggiorno la pagina
mipiace.forEach(checklike);

function checklike(elemento) {
    const el = elemento;
    const numero = el.dataset.numero;
    console.log(numero);
    fetch("http://localhost/checklikes.php?image=" + numero).then(onCheckLike).then(json => JsonCheckLike(json, el)).catch(error => { console.error('Fetch error:', error);});
}

function onCheckLike(response) {
    if (response.redirected) {
        window.location.href = response.url; // Redirect to the URL specified in the Location header
    }
    return response.json();
}

function JsonCheckLike(json, el) {
    const like = json['liked'];

    if (like === true) {
        el.src = "like.png";
        if (el.classList.contains('inverti-colori')) {
            el.classList.remove('inverti-colori');
        }
    }
}




//sessione utente nella home page tramite fetch
fetch("http://localhost/homesession.php").then(OnUserSession).then(JsonUS);

function OnUserSession(response) {
    if (response.redirected) {
        window.location.href = response.url; // Redirect to the URL specified in the Location header
    }
    return response.json();
}

function JsonUS(json) {
    if (json.hasOwnProperty('user_id')) {
        const div = document.createElement("div");
        const img = document.createElement("img");
        img.src = "user.png";
        const text = document.createElement("div");
        const nav = document.querySelector('nav');
        div.classList.add('user');
        nav.appendChild(div);
        div.appendChild(img);
        div.appendChild(text);
        text.textContent = "user: " + json.user_id;
    }
    else {
        console.error("User ID not found in JSON response");
    }
}





//modal view cliccando su API
const API = document.querySelector('.img6');
API.addEventListener("click", apiclick);

function apiclick(event) {
    console.log("modal");
    document.body.classList.add('noscroll');
    const modalView = document.querySelector(".modal-view");
    modalView.style.top = window.pageYOffset + 'px';
    modalView.classList.remove('hidden');
}

const XX = document.querySelector(".modal-view .croce");
XX.addEventListener('click', modalclick);

function modalclick() {
    const modalView = document.querySelector(".modal-view");
    document.body.classList.remove('noscroll');
    modalView.classList.add('hidden');
}



//API per prendere info su artisti e agenti dal DB
const APIform = document.getElementById('myForm');
APIform.addEventListener("submit", fapi);

function fapi(event) {
    const API = document.getElementById('myForm');
    event.preventDefault();
    
    const formData = new FormData(API);
    const params = new URLSearchParams(formData).toString();
    
    const searchParams = new URLSearchParams(params);
    const artistiagentiValue = searchParams.get('artistiagenti');

    console.log('Form parameters:', artistiagentiValue);
    fetch("http://localhost/artistagentAPI.php?artistiagenti=" + artistiagentiValue).then(apiResponse).then(apiJson);
}

function apiResponse(response) {
    return response.json();
}

function apiJson(Json) {
    console.log(Json);
    const modalView = document.querySelector("#contieni-foto");

    Json.forEach(function (obj) {
        const div = document.createElement("div");
        modalView.appendChild(div);
        div.classList.add('img-container');

        const img = document.createElement("img");
        img.src = obj.img;
        div.appendChild(img);


        const name = document.createElement("div");
        if (typeof obj.agent !== 'undefined') {
            
            name.textContent = obj.agent;
        }
        if (typeof obj.artist !== 'undefined') {
            name.textContent = obj.artist;
        }

        div.appendChild(name);
    })
    
}