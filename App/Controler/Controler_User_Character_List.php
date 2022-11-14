<?php

/*
 * Gere l'affichage de la liste des personnages de l'utilisateur et 
 * l'ajout d'un personnage a l'utilisateur lorsqu'il reviens de la page Controler/Character_List.php
 * 
 * 
 */

include_once ("../Modele/Characters.php");
include_once ("../Modele/User.php");

if(session_id() == '') {
    session_start();
}


//Test d'arrivé sur la page liste des personnages
if (isset($_GET["Character_Id"])){
    $_SESSION["User"]->Add_Character($_GET["Character_Id"]);
    unset($_GET["Character_Id"]);
}


//Affichages:
$Characters_Tab=$_SESSION["User"]->Get_Characters();

if (count($Characters_Tab)>=1){
    $Counter=0;
    $Character_Counter=-1;
    echo "<tr>";
    foreach ($Characters_Tab as $Characters){
        $Counter++;
        $Character_Counter++;
        
        echo"<td>";
        echo "<pictures><img src='".$Characters->Get_Character_Portrait()."'></picture></Br>";
        echo $Characters->Get_Character_Name()."</Br>";
        echo $Characters->Get_Character_Element()."</Br>";
        echo $Characters->Get_Character_Star()."Stars</Br>";
        echo $Characters->Get_Character_WeaponType()."</Br>";
        echo "Attack level :".$Characters->Get_Character_Attack()."</Br>";
        echo "Elemental level :".$Characters->Get_Character_Elemental()."</Br>";
        echo "Burst level :".$Characters->Get_Character_Burst()."</Br>";
        echo "Character level :".$Characters->Get_Character_Level()."</Br>";
        echo "Ascention level :".$Characters->Get_Character_Ascention()."</Br>";
        echo "<form action='../Controler/Controler_Character_Modify.php?Character_Id=".$Characters_Tab[$Character_Counter]->Get_Character_Id()." method='GET' >
            <button name='Input' value='More info ".$Characters->Get_Character_Id()."'>More Info</button>
            <button name='Input' value='Delete Character ".$Characters->Get_Character_Id()."'>Delete character</button>
        </form>";        
        echo"</td>";
        
        if ($Counter==5){
            echo"</tr><tr>";
                    
        }
        
    }
}
else{
    echo"<td><p>No characters yet<p></td>";       
}
echo"</tr>";
    
    