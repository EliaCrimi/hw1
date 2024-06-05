<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="accedi.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGNUP ELIA</title>
</head>

<body>
    <div class="background-image">
        <a href="index.php" id="elia">Elia</a>
        <main class="trasparente">
            <h1>Sign Up</h1>
            <form method="post" action="">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="username">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="password">

                <input type="submit" value="Sign Up">

                <?php
                session_start();

                if(isset($_POST["username"]) && isset($_POST["password"])){
                    $conn = mysqli_connect("localhost", "root", "", "test");

                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);

                    $query = "SELECT * FROM users WHERE username = '$username'";
                    $res = mysqli_query($conn, $query);

                    if(mysqli_num_rows($res) > 0){
                        $row = mysqli_fetch_assoc($res);

                        if($row['username'] === $username){
                            // user già esiste
                            echo "<div class=\"warning\"><img src=\"warning.png\"><p>username $username esiste gia</p></div>";
                        }
                    }  
                    else{
                        //se l'utente non esiste

                        //check se la pass ha almeno 5 letere
                        if (strlen($password) >= 5) {

                            //check se ha una maiuscola
                            if (preg_match('/[A-Z]/', "$password")) {

                                $password_nuova = "$password"; 
                                $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password_nuova')";
                                if(mysqli_query($conn, $insert_query)){
                                    $_SESSION["username"] = $_POST["username"];
                                    header("Location: index.php");
                                    exit;
                                }
                            }
                            else{
                                echo "<div class=\"warning\"><img src=\"warning.png\"><p>password deve contenere una maiuscola</p></div>";
                            }
                        }
                        else{
                            echo "<div class=\"warning\"><img src=\"warning.png\"><p>password deve contenere 5 lettere</p></div>";
                        }
                    }
                }
                ?>
            </form>
        </main>

        <section class="trasparente">
            <div class="warning">La Password deve contenere almeno 5 lettere fra cui una maiuscola</div>
            <a href="accedi.php" id="scambio">Hai gia un Account?</a>
        </section>
    </div>
</body>
</html>
