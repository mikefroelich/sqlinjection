<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Sécurité des applications</title>
    </head>
    <body>
    <p> Céline Grunenberger - Mike Froelich </p>
    <h1> Vos comptes bancaires</h1>
        <p>Veuillez entrer vos identifiants pour obtenir afficher vos comptes bancaires :</p>
        <!--<form action="comptesBancaires.php" method="post">-->
        <form action="comptesBancairesNonSecurises.php">
            <p>
            <input type="text" name="login" />
            <input type="text" name="mot_de_passe" />
            
            <input type="submit" value="Valider" />
            </p>
        </form>
        <p>
        - M2 MIAGE - Sécurité des applications -
        </p>

<?php include("footer.php"); ?>
    </body>
</html>