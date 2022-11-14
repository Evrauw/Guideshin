<?php

/*
 * Page gérant la modification de niveau ou suppression d'un personnage de la liste de l'utilisateur
 */
include_once ("../Modele/Characters.php");
include_once ("../Modele/User.php");
include ("../Modele/Strprephp8.php");

if(session_id() == '') {
    session_start();
}

$Input=$_GET["Input"];
//Recherche de provenance
if (Strprephp8::str_starts_with($Input,"Delete Character")){
    $Input=str_split($Input,17);
}
else if (Strprephp8::str_starts_with($Input,"More info")){
    $Input=str_split($Input,10);
}


//Partie suppression du personnage
if ($Input[0]=="Delete Character "){
    $_SESSION['User']->Delete_Character($Input[1]);
    include("../Vue/User_Character_List.php");
}

//Partie modification des niveaux
else if ($Input[0]=="More info "){
    //Récupération du bon objet en fonction de l'ID
    foreach ($_SESSION['User']->Get_Characters() as $Characters){
        if ($Input[1]==$Characters->Get_Character_Id()){
            $Character=$Characters;
        }
    }
    include("../Vue/More_Character_Info.php");
    echo "<th><p>".$Character->Get_Character_Name()."</Br>"
            . "<img src='".$Character->Get_Character_Portrait()."'></p></th></tr></thead>";
    echo "<tbody><td>";
    echo "<form action='../Controler/Controler_Character_Level_Up' method='POST'>"
    . "<p>
        <label for='Level'>Character Level :</label>
        <input type='text' name='Level' placeholder=".$Character->Get_Character_Level()."></p>"
    . "<p>
        <label for='Ascention'>Ascention Level : ".$Character->Get_Character_Ascention()."</label></p>"
    . "<p>
        <label for='Attack'>Attack Level :</label>
        <input type='text' name='Attack' placeholder=".$Character->Get_Character_Attack()."></p>"
    . "<p>
        <label for='Elemental'>Elemental Level :</label>
        <input type='text' name='Elemental' placeholder=".$Character->Get_Character_Elemental()."></p>"
            . "<p>
        <label for='Burst'>Burst Level :</label>
        <input type='text' name='Burst' placeholder=".$Character->Get_Character_Burst()."></p>"
    ."<button name='CharacterId' value='".$Character->Get_Character_Id()."'>Confirm</button></form>";
    

}

