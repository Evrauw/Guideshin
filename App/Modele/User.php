<?php

include ("DAO_Users.php");
include_once ("Characters.php");

Class User{
    private $UserId;
    private $Username;
    private $Password;
    private array $CharacterList;
    
    /*
     * Si viens de la connection vérifie la concordance MDP/Username et récupère les personnages de l'utilisateur
     * Si viens de l'inscription vérifie la disponibilité du couple MDP/Username
     */
    public function __construct($Username,$Password,$from){
        switch ($from){
            case "Connection":
                if (DAO_Users::Get_Info($Username, $Password)){
                    $this->Username=$Username;
                    $this->Password=$Password;
                    $this->UserId= DAO_Users::Get_User_Id($Username,$Password);
                        
                    $CharactList=DAO_Users::Get_User_Characters($this->UserId);
                    if (gettype($CharactList)==null){
                        $this->CharacterList=array();
                    }
                    else{
                        foreach ($CharactList as $CharacterId){
                            $this->CharacterList[]=new Characters($CharacterId['IdCharacter'],$this->Get_Id());                            
                        }
                    }
                }
                else{
                    Echo "Wrong password or username";
                    die();
                    
                }
                break;
            
            case "Sign in":
                if (!DAO_Users::Get_Info($Username, $Password)){
                    $this->Username=$Username;
                    $this->Password=$Password;
                
                    DAO_Users::Create_User($Username, $Password);
                
                    $this->CharacterList=array(); 
                    
                }
                else{
                    echo "Username allready exist";
                    die();
                    
                }
                break;
        }
    }

    //ajoute un personnage a l'utilisateur
    public function Add_Character($characterId){
        $character=new Characters($characterId);
        $this->CharacterList[]=$character;
        DAO_Users::Add_Character($this->Get_Id(),$characterId);
    }
    
    //supprime un personnage de l'utilisateur
    public function Delete_Character($characterId){
        DAO_Users::Delete_Character($this->Get_Id(),$characterId);
        $New_Character_List=array();
        foreach ($this->Get_Characters() as $character){
            if ($character->Get_Character_Id()!=$characterId){
                $New_Character_List[]=$character;
            }
        }
        $this->CharacterList=$New_Character_List;
    }
    
    public function Get_Id(){
        return $this->UserId;
    }
    
    public function Get_Characters(){
        return $this->CharacterList;
    }
}
