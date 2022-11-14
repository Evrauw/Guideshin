<?php
class DataBase_Connect {
    static private $Login="root";
    static private $Password="";
    static private $Database="Guideshin";
    static private $Server="Localhost";
    
    
    //Crée l'objet permettant de se connecter a la BDD
    public static function Connect(){
        try{
            $Connect = new PDO("mysql:host=".DataBase_Connect::$Server.";dbname=".DataBase_Connect::$Database, DataBase_Connect::$Login, DataBase_Connect::$Password);
            $Connect-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            return $Connect;            
            
        } catch (Exception $ex) {
            print("Erreur de connection BDD");
            die();
        }
    }
}
    
