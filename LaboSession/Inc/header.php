<?php
session_start();

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
    <a href=./catalogue.php >Retour au catalogue</a>
    
    
  </div>
</div>


</body>
</html>