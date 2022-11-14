<?php

include ("DAO_BossMat.php");

class BossMat{
    private $Id;
    private $Name;
    private $PicturePath;
    private $Origin;
    
    public function __construct($Id){
    
    $tab=DAO_BossMat::Get_All_BossMat_By_Id($Id);
        
    $this->Id=$tab[0]["Id"];
    $this->Name=$tab[0]["Name"];
    $this->PicturePath=$tab[0]["Picpath"];
    $this->Origin=array();
        
    }
    
    //Ajoute l'objet Boss dans l'attribut origin
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