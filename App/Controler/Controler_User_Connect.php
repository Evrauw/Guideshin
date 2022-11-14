<?php

/*
 * Connecte l'utilisateiur s'il possède un compte
 * 
 */

if(session_id() == '') {
    session_start();
}


$Username=$_POST["Username"];
$Password=$_POST["Password"];

include("../Modele/User.php");
$User= new User($Username,$Password,"Connection");
$_SESSION["User"]=$User;

include("../Vue/User_Character_List.php");

?>