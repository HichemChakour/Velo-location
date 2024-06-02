<h1>Nos clients</h1>
<?php 
if(isset($_SESSION['name'])){
    if($_SESSION['admin']==true){
    ?>

<a onclick="document.getElementById('id01').style.display='block'"  class='w3-bar-item w3-right w3-button'>Editer clients</a>
<?php 
    }
}
?>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-theme w3-display-topright">&times;</span>
        <form  method="post">
          <div class="w3-container w3-theme">
              <h2>Editer les clients</h2>
          </div>
          <div class="w3-container">
          
              <label class="w3-text-theme" for="ID"><b>ID:</b></label>
              <input class="w3-input w3-border w3-light-grey" type="number" id="ID" name="ID" onkeyup="showHint()" required>

              <label class="w3-text-theme" for="nom"><b>Nom:</b></label>
              <input class="w3-input w3-border w3-light-grey" type="text" id="nom" name="nom" required>

              <label class="w3-text-theme" for="prenom"><b>Prenom:</b></label>
              <input class="w3-input w3-border w3-light-grey" type="text" id="prenom" name="prenom" required>

              <label class="w3-text-theme" for="phone"><b>telephone:</b></label>
              <input class="w3-input w3-border w3-light-grey" type="text" id="phone" name="phone" >

              <label class="w3-text-theme" for="mail"><b>E-mail:</b></label>
              <input class="w3-input w3-border w3-light-grey" type="email" id="mail" name="mail" required>

              <label class="w3-text-theme" for="rue"><b>Rue:</b></label>
              <input class="w3-input w3-border w3-light-grey" type="text" id="rue" name="rue" >

              <label class="w3-text-theme" for="ville"><b>Ville:</b></label>
              <input class="w3-input w3-border w3-light-grey" type="text" id="ville" name="ville" >

              <label class="w3-text-theme" for="etat"><b>Etat:</b></label>
              <input class="w3-input w3-border w3-light-grey" type="text" id="etat" name="etat" >

              <label class="w3-text-theme" for="admin"><b>Admin:</b></label>
              <input type="radio" id="admin" name="admin" value="Y">
              <label for="age1">Oui</label><br>
              <input type="radio" id="admin" name="admin" value="N" default>
              <label for="age2">Non</label><br> 

              <input class="w3-btn w3-round w3-blue-grey" type="submit" value="Valider" >
               </div>
          
        </form>
      </div>
    </div>
    <script>
        //pour afficher les info du client dans le formulaire avec l'id(j'utilise json et ajax qui viennent du javascript)
     function showHint() {
            document.getElementById("nom").value  ="";
            document.getElementById("prenom").value  = "";
            document.getElementById("phone").value  ="" ;
            document.getElementById("mail").value  = "";
            document.getElementById("rue").value  ="" ;
            document.getElementById("ville").value  = "";
            document.getElementById("etat").value  ="" ;
              let str =   document.getElementById("ID").value;
              const xhttp = new XMLHttpRequest();
              xhttp.onload  = function() {
                
                const client = JSON.parse(xhttp.responseText);
                 console.log(client);
                document.getElementById("nom").value  = client.last_name;
                document.getElementById("prenom").value  = client.first_name;
                document.getElementById("phone").value  = client.phone;
                document.getElementById("mail").value  = client.email;
                document.getElementById("rue").value  = client.street;
                document.getElementById("ville").value  = client.city;
                document.getElementById("etat").value  = client.state;
                
            }
              xhttp.open("GET", "/~uapv2202051/existe.php?q="+str);
              xhttp.send();   
            }
    </script>





<?php
// Affichage des clients dans un tableau
echo "<table class='w3-table-all w3-card-4:'>";
echo "<tr><th>ID</th><th>Prénom</th><th>Nom</th></tr>";
foreach ($clients as $client) {
    echo "<tr";if($client->getAdmin()==true){echo" class='admin'";}echo"><td>" . $client->getCustomer_id() . "</td><td>" . $client->getFirst_name() . "</td><td>" . $client->getLast_name() . "</td>";
    echo "<td><a href=\"index.php?page=commandes.php&customer_id=" . $client->getCustomer_id() . "\">Commande</a></td></tr>";
}
echo "</table>";

?>