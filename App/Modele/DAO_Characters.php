<?php

include_once ("DataBase_Connect.php");

class DAO_Characters{
    
        //Récupère la possédant l'id reçu dans la base SQL
    public static function Get_All_Characters_By_Id($Id){
        try{
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("select * from Characters where Id=:Id");
            $Request->bindvalue(":Id",$Id,PDO::PARAM_STR_CHAR);
            $Request->execute();
            $Tab=$Request->fetchAll(PDO::FETCH_ASSOC);
            return $Tab;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
    //Récupère le niveau des personnages d'un utilisateur
    public static function Get_Characters_Stat_By_Id($UserId,$CharacterId){
        try{
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("select * from UserCharact where IdUser=:UserId and IdCharacter=:CharacterId");
            $Request->bindvalue(":UserId",$UserId,PDO::PARAM_STR_CHAR);
            $Request->bindvalue(":CharacterId",$CharacterId,PDO::PARAM_STR_CHAR);
            $Request->execute();
       
            return $Request->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
    //Modifie la valeur d'une stat du personnage d'un utilisateur
    public static function Set_Character_Stat($UserId,$CharacterId,$Amount,$Stat){
        //try{
            print($UserId.$CharacterId.$Amount.$Stat);
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("update UserCharact set :Stat=:Amount where IdUser=:UserId and IdCharacter=:CharacterId");
            $Request->bindvalue(":Stat",trim($Stat),PDO::PARAM_STR_CHAR);
            $Request->bindvalue(":Amount",$Amount,PDO::PARAM_STR_CHAR);
            $Request->bindvalue(":UserId",$UserId,PDO::PARAM_STR_CHAR);
            $Request->bindvalue(":CharacterId",$CharacterId,PDO::PARAM_STR_CHAR);
            $Request->debugDumpParams();
            $Request->execute();
        /*} catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }*/
    }
    
    //Renvoie le nombre de personnage dans la BDD
    public static function Get_Character_Number(){
        try{
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("select count(DISTINCT Id) from Characters");
            $Request->execute();
       
            return $Request->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
        
}