<?php

include ("DAO_LocalSpecialty.php");

class LocalSpecialty{
    
    private $Id;
    private $Name;
    private $Region;
    private $PicPath;
    
    public function __construct($Id){
        $Tab=DAO_LocalSpecialty::Get_All_LocalSpecialty_by_Id($Id);
        $this->Id=$Tab[0]["Id"];
        $this->Name=$Tab[0]["Name"];
        $this->Region=$Tab[0]["Region"];
        $this->PicturePath=$Tab[0]["Picpath"];
    }
    
    public function Get_Id(){
        return $this->Id;
    }
    
    public function Get_Name(){
        return $this->Name;
    }
    
    public function Get_Region(){
        return $this->Region;
    }
    
    public function Get_Picture_Path(){
        return $this->PicturePath;
    }
}