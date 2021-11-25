<?php
session_start();
include_once("fonction.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/style.css">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color:#c1d4d9;
}

.header {
  overflow: hidden;
  background-color: #9db8bf;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 25px; 
  line-height: 25px;
  border-radius: 4px;
}

.header span{
  font-size: 40px;
  font-weight: bold;
  margin-top:-50px;
}

.header a:hover {
  background-color: #315d69;
  text-transform: bold;
  color:white;
}


.header-right {
  float: right;
}

.rechercheCommande{
  position:absolute;
  background-color:#9db8bf;
  width:100%;
  display:flex;
  align-items:right;
  justify-content:right;
  padding:3px;
  flex-direction:column;
  margin-top:-1%;
}

.error{
  margin-top:-1%;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>
<body>

<div class="header">
  <span class="logo">Projet de Session / Yanick Clermont / Pascal Tremblay</span>
  <div class="header-right">
    <a href="./catalogue.php" >Retour au catalogue</a>
    
  </div>
</div>


</body>
</html>


<?php

  $contenu = "<div class=rechercheCommande><form method=post>

<input style=width:350px;font-size:20px; type=number name=idCommande placeholder='Entrez le numéro de commande'>
<input style=font-size:25px; type=submit name=ok value=rechercher>
</form>";

if(isset($_POST["ok"])){
  $commandeManager = new CommandeManager(connexion("bdd_catalogue"));
  $commande = $commandeManager->getCommande($_POST["idCommande"]);
  if($commande == Null){
    $contenu .= "<div class=error><p style=color:red>aucune commande avec ce numéro</p></div>";
  }else{
    foreach($commande as $keyCommande => $valueCommande){
      $id = $valueCommande->idCommande();
    }
      ?>
      <script>
        window.location = "./boncommande.php?idCommande="+<?php echo $id;?>;
      </script>
      <?php
  }
}
echo $contenu."</div>"; 



?>
