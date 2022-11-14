<?php

/*
 * Crée un compte a l'utilisateur 
 * 
 */

if(session_id() == '') {
    session_start();
}


$Username=$_POST["Username"];
$Password=$_POST["Password"];

include("../Modele/User.php");
$User= new User($Username,$Password,"Sign in");

$_SESSION["User"]=$User;

include("../Vue/User_Character_List.php");

?>