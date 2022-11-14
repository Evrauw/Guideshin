<!DOCTYPE html>
<!--
Formulaire d'inscription
-->

<html>
    <head>
        <title>Sign in</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSS/CSS_Principal.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="../Controler/Controler_User_Sign_In.php" method="POST" >
            <p>
                Username :
                <input type="text" name="Username" required> </br>
                Password :
                <input type="Password" name="Password" required>
                
            </p>
            <p><input type="Submit" value="Sign in"> </p>
        </form>     
        
    </body>
</html>
&