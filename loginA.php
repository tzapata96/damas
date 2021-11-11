<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta names="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-UA-Compatible" content="ie=edge">
        <title>DAMAS PRUEBA</title>
        <link rel="shourt icon" href="assets/damajust1.png" type="image/x-icon">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/loginA.css">
    </head>

    <body>
        <div class="container">
            <img class="avatar" src="assets/damajust1.png" alt="Logo damas">
            <h1>Login User</h1>

            <form action="game.php" method="post">
                <label for="username">Username</label>
                <input type="text" placeholder="Enter Username" name="username">
                
                <label for="password">Password</label>
                <input type="password" placeholder="Enter Password" name="password">
            
                <input type="submit" value="Log In">

                <label for="register">¿No se ha registrado aun?</label>
                <a href="registerA.php">Registrese</a>

            </form>
        </div>

    </body>