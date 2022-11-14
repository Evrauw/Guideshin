<?php

include("DAO_Monster.php");

class Monster{
    private $Id;
    private $Name;
    private $PicturePath;
    private array $Loots;
    
    public function __construct($Name){
        $tab=DAO_Monster::Get_All_Monster_By_Name($Name);
        
        $this->Id=$tab[0]["Id"];
        $this->Name=$tab[0]["Name"];
        $this->PicturePath=$tab[0]["Picpath"];
        $this->Loots=array();
        
    }
    //Ajoute l'objet MonsterMat dans l'attribut loots
    public function Add_Loot($Loot){
        $this->loot[]=$Loot;
    }
    
    public function Get_Id(){
        return $this->Id;
    }
    
    public function Get_Name(){
        return $this->Name;
    }
    
    public function Get_PicturePath(){
        return $this->PicturePath;
    }
    public function Get_Loots(){
        return $this->Loots;
    }
}