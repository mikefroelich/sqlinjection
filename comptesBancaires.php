
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
    	$query = "SELECT * FROM users WHERE login = '" . $_POST['login'] . "' AND password = '" . $_POST['mot_de_passe'] ."'";
    	//var_dump($query);
    	$reponse = $bdd->query($query);
    	//var_dump($reponse);

if($reponse == false){
	echo '<p>Mot de passe incorrect</p>';
	echo '<a href="form1.php"> Retour login </a>';
}
else {
	

	// on affiche ses comptes
	$userConnecte = $reponse->fetchall();
	//var_dump($userConnecte);

	echo "<h2> Bonjour " . $userConnecte[0]["login"] . "</h2>";
	$query = "SELECT * FROM accounts WHERE owner = '" . $userConnecte[0]['id'] . "'";
	$reponse = $bdd->query($query);

	while ($donnees = $reponse->fetch()) {
		echo "Account ID : " . $donnees['id'] . ' Type : ' . $donnees['type'] . ' Amount : ' . $donnees['amount'] .  '<br />';
	}
	

	//$reponse->closeCursor();
}
	
     }
     else {
     	echo '<p>Login ou mot de passe absent</p>';
     }
   
    ?>
    

</body>
</html>