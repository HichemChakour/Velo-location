<?php 
//page de connexion quand la session n'existe pas et en creer une, si elle existe elle revoie vers la page index.php (clients.php)
  if(isset($_POST['username'])){
    foreach ($clients as $c) {
      if($_POST['username']== $c->getLast_name()){
        if($_POST['pwd']== $c->getCustomer_id()){
          
          $_SESSION['name']=$c->getFirst_name(). " " .$c->getlast_name();
          $_SESSION['mdp']=$c->getCustomer_id();
          $_SESSION['admin']=$c->getAdmin();
          break;
        }
        else {
          break;
        }
      } 
    }
    if(!isset($_SESSION['name'])){
      echo "<p>Nom d'utilisateur ou mot de passe erroné</p>";
    }
    else{
      header("Location: /~uapv2202051/index.php");
    }
  }
?>

<form  method="post">
          <div class="w3-container w3-theme">
              <h2>Formulaire de connexion</h2>
          </div>
          <div class="w3-container">
          
              <label class="w3-text-theme" for="username"><b>Nom d'utilisateur:</b></label>
              <input class="w3-input w3-border w3-light-grey" type="text" id="username" name="username">

              <label class="w3-text-theme" for="pwd"><b>Mot de passe:</b></label>
              <input class="w3-input w3-border w3-light-grey" type="password" id="pwd" name="pwd">

              <input class="w3-btn w3-round w3-blue-grey" type="submit" value="Valider" >

          
        </form>