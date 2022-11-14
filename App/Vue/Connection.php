<!DOCTYPE html>
<!--
Formulaire de connection
-->

<html>
    <head>
        <title>Connection</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSS/CSS_Principal.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="../Controler/Controler_User_Connect.php" method="POST" >
            <p>
                Username :
                <input type="text" name="Username" required> </br>
                Password :
                <input type="Password" name="Password" required>
                
            </p>
            <p><input type="Submit" value="Connection"> </p>
        </form>     
        
    </body>
</html>

