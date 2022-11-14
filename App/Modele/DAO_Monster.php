<?php

include_once ("DataBase_Connect.php");

//Récupère la ligne possédant l'Id reçu dans la base SQL
class DAO_Monster{
    public static function Get_All_Monster_By_Id($Id){
        try {
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("select * from Monster where Id=:Id");
            $Request->bindvalue(":Id",$Id,PDO::PARAM_STR_CHAR);
            $Request->execute();

            return $Request->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
    //Récupère les Id MonsterMat depuis l'id Monster Id via la BDD
    public static function Get_Monster_Loot($MonsterId){
        try {
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("select * from MonsterLoot where IdMonster=:MonsterId");
            $Request->bindvalue(":MonsterId",$MonsterId,PDO::PARAM_STR_CHAR);
        
            $Request->execute();
        
            return $Request->fetchall(PDO::FETCH_ASSOC) ;
        
        }
        catch(PDOException $e){ 
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}
