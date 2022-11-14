<?php

include("DAO_Boss.php");

class Boss{
    private $Id;
    private $Name;
    private $PicturePath;
    private $Loot;
    
    public function __construct($Id){
        $Tab=DAO_Boss::Get_All_Boss_By_Id($Id);
        $this->Id=$Id;
        $this->Name=$Tab[0]["Name"];
        $this->PicturePath=$Tab[0]["Picpath"];
    }
    
    //Ajoute un objet BossMat dans l'attribut Loot
    public function Add_Loot($BossMat){
        $this->Loot=$BossMat;
    }
}
