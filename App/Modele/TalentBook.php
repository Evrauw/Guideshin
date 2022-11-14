<?php

include ("DAO_TalentBook.php");

Class TalentBook{
    private $Id;
    private $Name;
    private $Rarity;
    private $PicturePath;
    
    public function __construct($Id){
        $tab= DAO_TalentBook::Get_All_TalentBook_by_Id($Id);
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