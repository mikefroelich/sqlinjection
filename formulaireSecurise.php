<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>formulaire sécurisé - Sécurité des applications</title>        
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <p> Céline Grunenberger - Mike Froelich </p>
    <h1> Vos comptes bancaires (sécurisés)</h1>
        <p>Veuillez entrer vos identifiants pour obtenir afficher vos comptes bancaires :</p>
        <form action="comptesBancairesSecurises.php" method="post">
            <p>
            <input type="text" name="login" />
            <input type="text" name="mot_de_passe" />
            
            <input type="submit" value="Se connecter" />
            </p>
        </form>
        <p>
        - M2 MIAGE - Sécurité des applications -
        </p>

        <?php include("footer.php"); ?>

    </body>
</html>