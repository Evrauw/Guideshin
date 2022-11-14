<?php

include ("DAO_MonsterMat.php");


class MonsterMat{
    
    private $Id;
    private $Name;
    private $Rarity;
    private $PicturePath;
    private $Origin;
    
    public function __construct($Id){
    $tab=DAO_MonsterMat::Get_All_MonsterMat_By_Id($Id);
        
    $this->Id=$tab[0]["Id"];
    $this->Name=$tab[0]["Name"];
    $this->Rarity=$tab[0]["Rarity"];
    $this->PicturePath=$tab[0]["Picpath"];
    $this->Origin=array();
        
    }
    
        //Ajoute l'objet Monster dans l'attribut origin
    public function Add_Origin($Monster){
        $this->Origin[]=$Monster;
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
    public function Get_Origin(){
        return $this->Origin;
    }
    
}