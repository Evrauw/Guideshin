<?php

insert("DAO_WeekBoss.php");

class WeekBoss{
    
    private $Id;
    private $Name;
    private $Trial;
    private $PicturePath;
    private $Loot;
    
    public function __construct($Id){
        $Tab=DAO_Boss::Get_All_WeekBoss_By_Id($Id);
        $this->Id=$Id;
        $this->Name=$Tab[0]["Name"];
        $this->Trial[0]["Trial"];
        $this->PicturePath=$Tab[0]["Picpath"];
    }
    
        //Ajoute l'objet WeekBossMat dans l'attribut loot
    public function Add_Loot($BossMat){
        $this->Loot=$BossMat;
    }
    
}