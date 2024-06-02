<?php
//page deconnexion qui detruit la ssession si on appuis sur le bouton deconnexion dans le menu
session_destroy(); 
header("Location: /~uapv2202051/index.php");
?>