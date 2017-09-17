<!DOCTYPE html>
<?php 

session_start();
$token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
$_SESSION['token'] = $token;
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>formulaire sécurisé - Sécurité des applications</title>        
        <link rel="stylesheet" href="style.css">
    </head>

    <body> 
        <div id="zone">
            <h1> Espace client</h1>
                <h2>Connexion</h2>
                <form action="comptesBancairesSecurises.php" method="post">
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
                                <input type="submit" value="Se connecter" />
                            </td>
                        <tr>

                    </table>
                    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
                </form>  
            <?php include("footer.php"); ?>
        </div>
    </body>
</html>