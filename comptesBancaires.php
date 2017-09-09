
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=securite;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title> Rich Bank </title>
</head>
<body>
<h1> Vos comptes bancaires </h1>



	<?php
    if (isset($_POST['login']) AND isset($_POST['mot_de_passe']))
    {
    	// On vérifie le login / mdp
    	//var_dump($_POST);
    	
    	$query = "SELECT * FROM users WHERE login = '" . $_POST['login'] . "' AND password = '" . sha1($_POST['mot_de_passe']) ."'";
    	var_dump($query);
    	$reponse = $bdd->query($query) or die(print_r($bdd->errorInfo()));
		$userConnecte = $reponse->fetchall();
		if(!$userConnecte){
			echo '<p>Login ou Mot de passe incorrect</p>';
		}
		else {
			// on affiche ses comptes
			echo "<p> Bonjour <strong>" . $userConnecte[0]["login"] . "</strong>, voici vos comptes bancaires : </p>";
			$query = "SELECT * FROM accounts WHERE owner = '" . $userConnecte[0]['id'] . "'";
			//var_dump($query);
			$reponse = $bdd->query($query);

			while ($donnees = $reponse->fetch()) {
				echo $donnees['type'] . ' : ' . $donnees['amount'] .  '<br />';
			}
		}
	
     }
     else {
     	echo '<p>Login ou mot de passe absent</p>';
     }
   
    ?>
    
    <br/>
    <a href="form1.php"> <-- Retour login </a>

</body>
</html>