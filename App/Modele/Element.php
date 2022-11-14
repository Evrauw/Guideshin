<?php

include ("DAO_Element.php");
Class Element{
    
    private $Id;
    private $Name;
    private $PicturePath;
    
    public function __construct($Id){
        $Tab= DAO_Element::Get_All_Element_by_Id($Id);
        $this->Id=$Tab[0]["Id"];
        $this->Name=$Tab[0]["Name"];
        $this->PicturePath=$Tab[0]["Picpath"];
    }
    
    public function Get_Id(){
        return $this->Id;
    }
    
    public function Get_Name(){
        return $this->Name;
    }
    
        public function Get_Picture_Path(){
        return $this->PicturePath;
    }
    
}