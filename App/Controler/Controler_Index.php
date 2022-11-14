<?php

/*
 * Renvoie l'utilisateur vers la page d'inscription ou de connection
 * en fonction du bouton cliqué
 */
if(session_id() == '') {
    session_start();
}

$From=$_POST['From'];
if ($From=="Connect"){
    Include("../Vue/Connection.php");
}
else if ($From=='Sign up'){
    Include("../Vue/Sign_in.php");
}

?>