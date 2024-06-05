 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="accedi.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN ELIA</title>
</head>

<body>

   
    <div class="background-image">
        <a href="index.php" id="elia">Elia</a>
        <main class="trasparente">
            <h1>Login</h1>
            <form method="post" action="">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="username">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="password">

                <input type="submit" value="Log IN">

                <?php
                    session_start();
                  
                    if(isset($_POST["username"]) && isset($_POST["password"])){
                        $conn = mysqli_connect("localhost", "root", "", "test");
                  
                        $username = mysqli_real_escape_string($conn, $_POST['username']);
                        $password = mysqli_real_escape_string($conn, $_POST['password']);
                  
                        $query = "SELECT * FROM users WHERE username = '$username'";
                        $res = mysqli_query($conn, $query);
                  
                        if(mysqli_num_rows($res) > 0){
                            //utente gia esiste
                            $row = mysqli_fetch_assoc($res);
                  
                            $stored_password = $row['password'];
                            if($password === $stored_password) {
                                 //password corretta
                                 $_SESSION["username"] = $_POST["username"];
                                 header("Location: index.php");
                                 exit;
                            }
                            else{
                                //pass sbagliata
                                echo "<div class=\"warning\"><img src=\"warning.png\"><p>password e utente non coincidono</p></div>";
                            }
                        }  
                        else{
                            //se l'utente non esiste
                             echo "<div class=\"warning\"><img src=\"warning.png\"><p>username $username non esiste</p></div>";
                  
                        }
                    }
                ?>
           </form>
        </main>

        <section class="trasparente">
            <a href="registra.php" id="scambio">Non Hai un account?<br>Registrati Ora!</a>
        </section>
    </div>




</body>
</html>