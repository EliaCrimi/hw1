let token;

const client_id = "4f9ea3998d244005ae4b56289da1ac4f";
const client_secret = "f1037da3ce7b4434ba73b91a07cbd7f7";


function onJson(json) {
    console.log(json);

    const artistItems = json.artists.items;
    const artist = artistItems[0]; 
    const images = artist.images;
    const urlimg = images[0].url;
    console.log("URL: ", urlimg);
    const artistContainer = document.querySelector('#image-container');

    const contieniImg = document.createElement('div');
    contieniImg.classList.add('contieniImg');
    artistContainer.appendChild(contieniImg);

    const artistImage = document.createElement('img');
    artistImage.src = urlimg;
    contieniImg.appendChild(artistImage);
    artistImage.classList.add('ArtistaImmagine');


    //aggiungi + element
    const aggiungi = document.createElement('img');
    aggiungi.src = "add.jpg";
    aggiungi.classList.add('addmusic');
    contieniImg.appendChild(aggiungi);

    aggiungi.setAttribute("nome", artist.name);
    aggiungi.setAttribute("img", urlimg);
    aggiungi.addEventListener("click", fadd);
}


function onResponse(response) {
    console.log('Response received');
    return response.json();
}

function search(event) {
    event.preventDefault();

    const artist_input = document.querySelector('#artist');
    const artist_value = encodeURIComponent(artist_input.value);
    console.log('Searching for: ' + artist_value);

    const apiUrl = `https://api.spotify.com/v1/search?q=${artist_value}&type=artist`;
    fetch(apiUrl, {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    }).then(onResponse)
        .then(onJson);
}



function onTokenJson(json) {
    token = json.access_token;
}

function onTokenResponse(response) {
    return response.json();
}

fetch("https://accounts.spotify.com/api/token", {
    method: "post",
    body: 'grant_type=client_credentials',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
        'Authorization': 'Basic ' + btoa(client_id + ':' + client_secret)
    }
}).then(onTokenResponse)
    .then(onTokenJson);

const form = document.querySelector('form');
form.addEventListener('submit', search);


fetch("http://localhost/homesession.php").then(OnUserSession).then(JsonUS);

function OnUserSession(response) {
    return response.json();
}

//"<div class=\"user\"><img src=\"user.png\"><div>user: $user_id</div></div>";
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



//quando click sul + aggiunge al DB
function fadd(event) {
    console.log("click");
    const el = event.currentTarget;
    const nome = el.getAttribute("nome");
    const img = el.getAttribute("img");
    console.log(nome);
    console.log(img);
    fetch("http://localhost/agenttable.php?artist=" + nome + "&urlimg=" + img).then(response => {
        if (response.redirected) {
            window.location.href = response.url; // Redirect to the URL specified in the Location header
        }
    });
}
