<?php

/*
Gère l'affichage de tout les personnages et
la selection d'un personnage par l'utilisateur
 */

include_once("../Modele/Characters.php");
include_once ("../Modele/User.php");

if(session_id() == '') {
    session_start();
}

//Récupération du nombre total de personnages inscrit dans la BDD
$CharacterList=array();
$Character_Number=Characters::Get_Character_Number();
for ($Id=1;$Id<=$Character_Number[0]["count(DISTINCT Id)"];$Id++){
    $CharacterList[]=new Characters($Id);

}


//Affichage plus récupération du click via count sachant que les personnages sont afficher par ordre d'id
$Count=0;
$Count_For_Display=0;
echo'<tr>';
foreach($CharacterList as $Character_to_add){
    $Count_For_Display++;
    echo '<td><a href="../Vue/User_Character_List.php?Character_Id='.$CharacterList[$Count]->Get_Character_Id().'">';
    echo "<pictures><img src='".$Character_to_add->Get_Character_Portrait()."'></picture></Br>";
    echo "<p>".$Character_to_add->Get_Character_Name()."</p>";
    echo "<p>".$Character_to_add->Get_Character_Element()."</p>";
    echo "<p>".$Character_to_add->Get_Character_Star()." Stars</p>";
    echo "<p>".$Character_to_add->Get_Character_WeaponType()."</p>";
    echo"</td>";
    
    $Count++;
    if ($Count_For_Display==5){
        echo"</tr><tr>";
        $Count_For_Display=0;
        
    }
}
