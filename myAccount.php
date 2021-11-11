<?php
$conexion=mysqli_connect('localhost', 'root', '', 'damas')
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta names="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-UA-Compatible" content="ie=edge">
    <title>DAMAS PRUEBA</title>
    <link rel="shourt icon" href="assets/damajust1.png" type="image/x-icon">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="hero">
        <div class="container">
            <nav class="nav">
                <a href="#" class="nav__items">My account</a>
            </nav>
            <section class="hero__container">
                <div class="hero_text">
                </div>
            </section>
        </div>
        <div class="hero_wave" style="overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C193.28,70.55 305.58,118.91 500.27,57.72 L500.00,150.00 L-14.95,154.44 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>
    <main>
        <section class="presentation container">
            <table style="border-collapse: collapse; border: 2px solid black; padding: 20px;">
                <h1>Cantidad de partidas jugadas</h1>
                <tr style="border: 2px solid black">
                    <th>Fecha partida</th>
                    <th>Mi usuario</th>
                    <th>Usuario contrincante</th>
                </tr>
                <?php
                $sql="SELECT fechaPartida, usuario1, usuario2 from partida"
                $result=msqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){
                ?>
                    <tr style="border: 2px solid black">
                        <th>
                            <?php echo $mostrar['fechaPartida']?>
                        </th>
                        <th>
                            <?php echo $mostrar['usuario1']?>
                        </th>
                        <th>
                            <?php echo $mostrar['usuario2']?>
                        </th>
                    </tr>
                    <?php
                    }
                    ?>
            </table>
        </section>
    </main>
<footer class="footer"></footer>
    </body>
    
    </html>