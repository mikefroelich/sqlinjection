<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Sécurité des applications</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div id="zone">
        <h1> Espace client</h1>
            <h2>Connexion</h2>
            <!--<form action="comptesBancaires.php" method="post">-->
            <form action="comptesBancairesNonSecurises.php">
            <table>
                <tr>
                    <td>    Identifiant     </td>
                    <td>    <input type="text" name="login" />    </td>
                </tr>

                <tr>
                    <td>    Mot de passe    </td>
                    <td>    <input type="text" name="mot_de_passe" />   </td>
                </tr>
                <td>
                </td>
                    <td>
                        <input id="button" type="submit" value="Se connecter" />
                    </td>
                <tr>

            </table>
            </form>   
    

<?php include("footer.php"); ?>
    </div>
    </body>
</html>