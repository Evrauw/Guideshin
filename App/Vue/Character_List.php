<!DOCTYPE html>
<!--Affiche un tableau avec tout les personnages de l'utilisateur.-->

<html>
    <head>
        <title>Character List</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSS/CSS_Principal.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
            <div class="center">    
        <table>
            <thead>
                <tr>
                    <th>Characters List</th>
                </tr>
            </thead>
            
            <tbody>
                <?php include("../Controler/Controler_Character_List.php");?>
                