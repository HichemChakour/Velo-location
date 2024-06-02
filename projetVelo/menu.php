<script>
function w3_open() {
  
  document.getElementById("mySidebar").style.width = "20%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'inline-block';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
	
	
	<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Fermer &times;</button>
  <form method="GET">
   <?php
  echo " <a href=\"index.php?page=clients.php\" class='w3-bar-item w3-button'>Tout les clients</a>";
 echo " <a href=\"index.php?page=etatdescommandes.php\" class='w3-bar-item w3-button'>Tout les vélos</a>";
  echo " <a href=\"index.php?page=statstaff.php\" class='w3-bar-item w3-button'>staff</a>";
  ?>
</form>
</div>
<div id="main" >
<div class="w3-blue w3-display-container w3-header w3-padding-32">

  <button id="openNav" class="w3-button w3-blue w3-xlarge" onclick="w3_open()">&#9776;</button>
   
    <h1 class="w3-container w3-display-middle w3-cursive">HC Vélo</h1>
    <?php
    if(!isset($_SESSION['name'])){
      ?>
    
    <a href="/~uapv2202051\index.php?page=connexion.php" ><button class="w3-button w3-display-right">Connexion</button></a>
     <?php
   }
    else{
      ?>
      <div class="w3-display-right">
        <p>Bonjour <?php echo $_SESSION['name'] ;?></p>
       <a href="/~uapv2202051\index.php?page=deconnexion.php" ><button class="w3-button ">Déconnexion</button></a>
     </div>
   <?php } ?>
   
  
</div>