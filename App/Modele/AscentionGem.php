<?php

include ("DAO_AscentionGem.php");

Class AscentionGem {
    private $Id;
    private $Name;
    private $Rarity;
    private $PicturePath;
    
    //Crée l'objet AscentionGem a partir de l'id en utilisant la classe d'acces aux données
    public function __construct($Id){
        $tab= DAO_AscentionGem::Get_All_AscentionGem_by_Id($Id);
        $this->Id=$tab[0]["Id"];
        $this->Name=$tab[0]["Name"];
        $this->Rarity=$tab[0]["Rarity"];
        $this->PicturePath=$tab[0]["Picpath"];
    }
    
    public function Get_Id(){
        return $this->Id;
    }
    
    public function Get_Name(){
        return $this->Name;
    }
    
    public function Get_Rarity(){
        return $this->Rarity;
    }
    
        public function Get_Picture_Path(){
        return $this->PicturePath;
    }
}