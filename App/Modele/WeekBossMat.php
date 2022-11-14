<?php

include("DAO_WeekBossMat.php");

class WeekBossMat{
    private $Id;
    private $Name;
    private $PicturePath;
    private $Origin;
    
    public function __construct($Id){
    
    $tab=DAO_WeekBossMat::Get_All_WeekBossMat_By_Id($Id);
        
    $this->Id=$tab[0]["Id"];
    $this->Name=$tab[0]["Name"];
    $this->PicturePath=$tab[0]["Picpath"];
    $this->Origin=array();
        
    }
    
    //Ajoute l'objet WeekBoss dans l'attribut origin
    public function Add_Origin($Boss){
        $this->Origin[]=$Boss;
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