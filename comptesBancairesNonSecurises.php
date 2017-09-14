
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

    <link rel="stylesheet" href="style.css">
</head>
<body>
<br/>
<a href="formulaireNonSecurise.php"> <-- retour </a><h1> Vos comptes bancaires </h1>



	<?php

	echo "<p> Bonjour <strong>" . $_GET["login"] . "</strong>, voici vos comptes bancaires : </p>";
    //if (isset($_POST['login']) AND isset($_POST['mot_de_passe'])) {
    if (isset($_GET['login']) AND isset($_GET['mot_de_passe'])) {

    	
    	//$query = "SELECT users.login, accounts.owner, accounts.type, accounts.amount FROM accounts INNER JOIN users ON accounts.owner = users.id  WHERE users.login = '" . $_POST['login'] . "' AND users.password = '" . $_POST['mot_de_passe'] ."'";
    	$query = "SELECT users.login, accounts.owner, accounts.type, accounts.amount FROM accounts INNER JOIN users ON accounts.owner = users.id  WHERE users.login = '" . $_GET['login'] . "' AND users.password = '" . $_GET['mot_de_passe'] ."'";
    	//var_dump($query);

    	$reponse = $bdd->query($query) or die(print_r($bdd->errorInfo()));
		//var_dump($reponse);

		if($reponse){
			$userConnecte = $reponse->fetchall();
			//var_dump($userConnecte);
		} else {
			$userConnecte = null;
		}
		
		if(!$userConnecte){
			echo '<p>Login ou Mot de passe incorrects</p>';
		}
		else {
			
			//var_dump($userConnecte);
			//echo "<p> Bonjour <strong>" . $userConnecte[0]["login"] . "</strong>, voici vos comptes bancaires : </p>";
			
			foreach ($userConnecte as $i => $account) {
				echo $userConnecte[$i]['type'] . ' : ' . $userConnecte[$i]['amount'] .  '<br />';
			}
			
			
		}
	
     }
     else {
     	echo '<p>Erreur</p>';
     }
   
    ?>
    
    

</body>
</html>