<?php

include_once("DataBase_Connect.php");

class DAO_TalentBook{
    
    //Récupère la ligne possédant l'Id reçu dans la base SQL
    public static function Get_All_TalentBook_by_Id($Id){
        try {
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("select * from TalentBook where Id=:Id");
            $Request->bindvalue(":Id",$Id,PDO::PARAM_STR_CHAR);
            $Request->execute();

            return $Request->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
}

