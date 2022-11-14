<?php

include_once ("../Modele/Characters.php");
include_once ("../Modele/User.php");

if(session_id() == '') {
    session_start();
}

foreach ($_SESSION['User']->Get_Characters() as $Characters){
        if ($_POST["CharacterId"]==$Characters->Get_Character_Id()){
            $Character=$Characters;
        }
}

if($_POST["Level"]!=null){
    $Character->Set_Level($_POST["Level"],$_SESSION['User']->Get_Id());
}
if($_POST["Attack"]!=null){
    $Character->Set_Attack($_POST["Attack"],$_SESSION['User']->Get_Id());
}
if($_POST["Elemental"]!=null){
    $Character->Set_Elemental($_POST["Elemental"],$_SESSION['User']->Get_Id());
}
if($_POST["Burst"]!=null){
    $Character->Set_Burst($_POST["Burst"],$_SESSION['User']->Get_Id());
}

include("../Vue/User_Character_List.php");