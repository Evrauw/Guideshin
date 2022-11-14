<?php

include_once ('DataBase_Connect.php');

class DAO_MonsterMat{
    
    //Récupère la ligne possédant l'Id reçu dans la base SQL
    public static function Get_All_MonsterMat_By_Id($Id){
        try {
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("select * from MonsterMat where Id=:Id");
            $Request->bindvalue(":Id",$Id,PDO::PARAM_STR_CHAR);
            $Request->execute();

            return $Request->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        } 
       
    }
    
    //Récupère les Id des Monster donnant l'Id reçu depuis la base SQL
    public static function Get_MonsterMat_Origin($MonsterMatId){
        try {
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("select * from MonsterLoot where IdMonsterMat=:MonsterMatId");
            $Request->bindvalue(":MonsterMatId",$MonsterMatId,PDO::PARAM_STR_CHAR);
        
            $Request->execute();
        
            return $Request->fetchall(PDO::FETCH_ASSOC) ;
        
        }
        catch(PDOException $e){ 
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}