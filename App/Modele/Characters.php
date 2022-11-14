<?php

include ("DAO_Characters.php");
include ("Element.php");
include ("AscentionGem.php");
include ("LocalSpecialty.php");
include ("MonsterMat.php");
include ("BossMat.php");
include ("TalentBook.php");
include ("WeekBossMat.php");

class Characters{
    
    private $Id;
    private $Name;
    private $PortraitPath;
    private $Element;
    private $Star;
    private $WeaponType;
    private $AscentionGem;
    private $LocalSpecialty;
    private $MonsterMat;
    private $BossMat;
    private $TalentBook;
    private $WeekBossMat;
    private $Attack;
    private $Elemental;
    private $Burst;
    private $Level;
    private $Ascention;
    
    public function __construct($Id,$UserId = Null){
        $this->Id=$Id;
        $Character=DAO_Characters::Get_All_Characters_By_Id($Id);
        $this->Name=$Character[0]["Name"];
        $this->PortraitPath=$Character[0]["PortraitPath"];
        $this->Star=$Character[0]["Star"];
        $this->WeaponType=$Character[0]["WeaponType"];
        $this->Element=new Element($Character[0]["ElementId"]);
        $this->AscentionGem=new AscentionGem($Character[0]["AscentionGemId"]);
        $this->LocalSpecialty=new LocalSpecialty($Character[0]["LocalSpecialtyId"]);
        $this->MonsterMat=new MonsterMat($Character[0]["MonsterMatId"]);
        $this->BossMat=new BossMat($Character[0]["BossMatId"]);
        $this->TalentBook=new TalentBook($Character[0]["TalentBookId"]);
        $this->WeekBossMat=new WeekBossMat($Character[0]["WeekBossMatId"]);
        
        if ($UserId != Null){
            $Stats=DAO_Characters::Get_Characters_Stat_By_Id($UserId,$Id);
            $this->Attack=$Stats[0]["Attack"];
            $this->Elemental=$Stats[0]["Elemental"];
            $this->Burst=$Stats[0]["Burst"];
            $this->Level=$Stats[0]["Levels"];
            $this->Ascention=$Stats[0]["Ascention"];            
        }
        else{
            $this->Attack=1;
            $this->Elemental=1;
            $this->Burst=1;
            $this->Level=1;
            $this->Ascention=0;            
        }
    }
    
    //Modifie l'attaque du personnage ainsi que dans la BDD
    public function Set_Attack($Amount,$UserId){
        $this->Attack=$Amount;
        DAO_Characters::Set_Character_Stat($UserId, $this->Id, $Amount, "Attack");
    }
    
    //Modifie l'Elemental du personnage ainsi que dans la BDD
    public function Set_Elemental($Amount,$UserId){
        $this->Elemental=$Amount;
        DAO_Characters::Set_Character_Stat($UserId, $this->Id, $Amount, "Elemental");
    }
    
    //Modifie le Burst du personnage ainsi que dans la BDD
    public function Set_Burst($Amount,$UserId){
        $this->Burst=$Amount;
        DAO_Characters::Set_Character_Stat($UserId, $this->Id, $Amount, "Burst");
    }
    
    //Modifie le niveau du personnage ainsi que dans la BDD, calcul aussi le niveau d'ascention en fonction du niveau
    public function Set_Level($Amount,$UserId){
        $this->Level=$Amount;
        DAO_Characters::Set_Character_Stat($UserId, $this->Id, $Amount, Levels);
        if($Amount>81){
            $this->Set_Ascention(5, $UserId);
        }
        else if ($Amount>71){
            $this->Set_Ascention(4, $UserId);
        }
        else if ($Amount>61){
            $this->Set_Ascention(3, $UserId);
        }
        else if ($Amount>41){
            $this->Set_Ascention(2, $UserId);
        }
        else if ($Amount>21){
            $this->Set_Ascention(1, $UserId);
        }
        else{
            $this->Set_Ascention(0, $UserId);
        }
    }
    
    //Modifie le niveau du personnage ainsi que dans la BDD
    public function Set_Ascention($Amount,$UserId){
        $this->Ascention=$Amount;
        DAO_Characters::Set_Character_Stat($UserId, $this->Id, $Amount, "Ascention");
    }
    
    public function Get_Character_Portrait(){
        return $this->PortraitPath;
    }
    
    public function Get_Character_Name(){
        return $this->Name;
    }
    
    public function Get_Character_Id(){
        return $this->Id;
    }
    
    public function Get_Character_Element(){
        return $this->Element->Get_Name();
    }
    
    public function Get_Character_Star(){
        return $this->Star;
    }
    
    public function Get_Character_WeaponType(){
        return $this->WeaponType;
    }
    
    public function Get_Character_Attack(){
        return $this->Attack;
    }
    
    public function Get_Character_Elemental(){
        return $this->Elemental;
    }
    
    public function Get_Character_Burst(){
        return $this->Burst;
    }
    
    public function Get_Character_Level(){
        return $this->Level;
    }
    
    public function Get_Character_Ascention(){
        return $this->Ascention;
    }
    

    //renvoie le nombre de personnages dans la BDD
    static function Get_Character_Number(){
        return DAO_Characters::Get_Character_Number();
    }
    
    
    
}