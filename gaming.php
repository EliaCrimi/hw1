<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="gaming.css">
    <title>GAMING!</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap">
    <script src="gaming.js" defer></script>
</head>

<body>
    <nav>
        <a id="home" href="index.php">
            Home
        </a>
        <div id="elia">
            GAMING
        </div>
        <div class="user">
            <img src="user.png">
        </div>
        <img src="controller.png" id="controller"/>
    </nav>

    <section>
        <p>Genera l'immagine del tuo agente (valorant) preferito!</p>
        <form class="gaming">
            <input type="text" id="agent" placeholder="Agent">
            <input type="submit">
        </form>
        <div id="image-container" class="gaming"></div>
    </section>
</body>
</html>