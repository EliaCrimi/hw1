<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap">
    <link rel="stylesheet" href="mhw3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="mhw3.js" defer></script>
    <title>HW1</title>
</head>

<body>
    <article>
        <nav>
            <div id="info">Accedi</div>
            <h1>Elia Crimi</h1>
            <img src="logout.webp" id="logout">
        </nav>

        <div class="hidden accedi">
            <button onclick="window.location.href='accedi.php';" id="acc">Clicca qui per accedere<img src="accesso.png"></button>
            <button onclick="window.location.href='registra.php';" id="reg">Clicca qui per registrarti<img src="signup.png"></button>
            <img id="x" src="croce.png" />
        </div>


        <header>IL MIO SITO</header>
        <p>Uno dei siti di sempre.</p>
    </article>

    <section data-grandezza="piccolo">
        <h2>Le mie Passioni</h2>

        <div class="primo paio">
            <div class="section-item img1">
                <p>GAMING</p>
                <img src="unclickedlike.png" class="likebutton"  data-numero="1">
            </div>

            <div class="section-item img2">
                <p>MUSIC</p>
                <img src="unclickedlike.png" class="likebutton"  data-numero="2">
            </div>
        </div>

        <div class="paio">
            <div class="section-item img3">
                <p>GYM</p>
                <img src="unclickedlike.png" class="likebutton"  data-numero="3">
            </div>
            <div class="section-item img4">
                <p>COMPUTER ENGINEERING</p>
                <img src="unclickedlike.png" class="likebutton" data-numero="4">
            </div>
        </div>

        <div class="hidden paio" id="terzopaio">
            <div class="section-item img5">
                <p>ANIME</p>
                <img src="unclickedlike.png" class="likebutton" data-numero="5">
            </div>
            <div class="section-item img6">
                <p>APIs</p>
                <img src="unclickedlike.png" class="likebutton inverti-colori" data-numero="6">
            </div>
        </div>

        <button>Tutte le mie Passioni</button>

    </section>

    <div id="section2"><p>Informazioni universitarie:</p><em>Matricola: 10000303444</em></div>

    <div id="section3">
        <img src="https://static0.gamerantimages.com/wordpress/wp-content/uploads/2023/01/vinland-saga-events-thorfinn-season-2-cropped.jpg" />
        <p>I have no enemies</p><em>- Thorfinn</em>
    </div>


    <footer>
        <div id="nome">Elia</div>
        <div id="quote">*The quote from above is not to be taken seriously<br>It was added only for comedic purposes</div>
        <img id="thumbsup" src=https://cdn.pixabay.com/photo/2022/12/11/04/11/thumbs-up-7648171_1280.png></img>
    </footer>

    <div class="modal-view hidden">
        <img src="croce.png" class="croce">
        <div id="whiteboard">
            <form id="myForm">
                <label for="artistiagenti">Vuoi vedere i tuoi agenti o i tuoi artisti salvati?:</label>
                <input list="artage" name="artistiagenti" id="artistiagenti">
                <datalist id="artage">
                    <option value="Artisti">
                    <option value="Agenti">
                </datalist>
                <input type="submit">
            </form>
            <div id="contieni-foto"></div>
        </div>
    </div>

</body>
</html>

