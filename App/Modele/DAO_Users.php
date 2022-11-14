<?php
include_once ("DataBase_Connect.php");

class DAO_Users{
    
    //Récupère l'id possédant l'Username et le Password reçu dans la base SQL
    public static function Get_User_Id($Username,$Password){
        try{
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("select Id from Users where Username=:Username and Password=:Password");
            $Request->bindvalue(":Username",$Username,PDO::PARAM_STR_CHAR);
            $Request->bindvalue(":Password",$Password,PDO::PARAM_STR_CHAR);
            $Request->execute();
                    
            $Id=$Request->fetch(PDO::FETCH_ASSOC);
            return $Id["Id"];
            
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
            
        
    }
    
    //Vérifie l'éxistance de Username et Password dans la BDD
    public static function Get_Info($Username,$Password){
        try{
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("select * from Users where Username=:Username and Password=:Password");
            $Request->bindvalue(":Username",$Username,PDO::PARAM_STR_CHAR);
            $Request->bindvalue(":Password",$Password,PDO::PARAM_STR_CHAR);
            $Request->execute();
            
            $Tab=$Request->fetchall(PDO::FETCH_ASSOC);
            print_r($Tab);
        if ($Tab[0]["Username"]==$Username and $Tab[0]["Password"]==$Password){
                return true;
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            return false;
        }
    }
    
    // Récupère les personnages de l'utilisateur
    public static function Get_User_Characters($UserId){
        try{
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("select IdCharacter from UserCharact where IdUser=:UserId");
            $Request->bindvalue(":UserId",$UserId,PDO::PARAM_STR_CHAR);
        
            $Request->execute();
        
            return $Request->fetchall(PDO::FETCH_ASSOC) ;
        
        }
        catch(PDOException $e){
            return null;
        }
    }
    
    // Créée un utilisateur
    public static function Create_User($Username,$Password){
        try{
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("Insert into Users(username,password) values(:Username,:Password)");
            $Request->bindvalue(":Username",$Username,PDO::PARAM_STR_CHAR);
            $Request->bindvalue(":Password",$Password,PDO::PARAM_STR_CHAR);
            $Request->execute();
            
            
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
    // Ajoute un Personnage dans la liste de l'utilisateur
    public static function Add_Character($UserId,$CharacterId){
        try{
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("Insert into UserCharact(`IdUser`,`IdCharacter`,`Attack`,`Elemental`,`Burst`,`Levels`,`Ascention`) values(:UserId,:CharacterId,1,1,1,1,0)");
            $Request->bindvalue(":UserId",$UserId,PDO::PARAM_INT);
            $Request->bindvalue(":CharacterId",$CharacterId,PDO::PARAM_INT);
        
            $Request->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        
    }
    
    //Supprime un personnage dans la liste de l'utilisateur
    public static function Delete_Character($UserId,$CharacterId){
        try{
            $Connect=Database_Connect::Connect();
            $Request=$Connect->prepare("Delete from UserCharact where IdUser=:UserId and IdCharacter=:CharacterId");
            $Request->bindvalue(":UserId",$UserId,PDO::PARAM_INT);
            $Request->bindvalue(":CharacterId",$CharacterId,PDO::PARAM_INT);
        
            $Request->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
}
