<?php
include("./Inc/header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <div class="container">
    <h1>Catalogue</h1>
<div class="items">
    <div class=tHorreur><h2>Horreur</h2></div>
    <div class=tScience><h2>Science</h2></div>
    <div class=tBd><h2>Bande-dessiné</h2></div>
    <div class=tAnime><h2>Anime</h2></div>
</div>
<div class="items">

<span class="imgHorreur">

    <img style="width:80%;height:500px;margin-left:10%" src="./images/horreur.jpg" alt="error"/>
    <br><br>
    <a style="margin-left:10%;border:2px solid white;text-decoration:none;color:white;font-size:25px;padding:5px;" href="livre.php?theme=horreur">Consulter</a>
</span>

<span class="imgScience">

    <img style="width:80%;height:500px;margin-left:10%" src="./images/science.jpg" alt="error"/>
    <br><br>
    <a style="margin-left:10%;border:2px solid white;text-decoration:none;color:white;font-size:25px;padding:5px;" href="livre.php?theme=science">Consulter</a>
</span>


<span class="imgBd">

    <img style="width:80%;height:500px;margin-left:10%" src="./images/bd.jpg" alt="error"/>
    <br><br>
    <a style="margin-left:10%;border:2px solid white;text-decoration:none;color:white;font-size:25px;padding:5px;" href="livre.php?theme=bd">Consulter</a>
</span> 

<span class="imgAnime">

    <img style="width:80%;height:500px;margin-left:10%" src="./images/anime.jpg" alt="error"/>
    <br><br>
    <a style="margin-left:10%;border:2px solid white;text-decoration:none;color:white;font-size:25px;padding:5px;" href="livre.php?theme=anime">Consulter</a>
</span>

        </div>
    </div>

</body>
</html>