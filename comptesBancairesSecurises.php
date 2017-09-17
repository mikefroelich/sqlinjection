<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title> Rich Bank </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<br/>
<h1> Espace personnel <a href="formulaireSecurise.php"> <img src="logging-out.png" alt="Déconnexion" /> </a></h1> 

<?php

	session_start();
	// on vérifie que tous les jetons sont présents 
	if(isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token']))
	{
		// On vérifie que les deux correspondent 
		if($_SESSION['token'] == $_POST['token'])
		{
			$login = $_POST['login'];
			$password = $_POST['mot_de_passe'];

			if (isset($login) AND isset($password)) 
			{
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=securite;charset=utf8', 'root', '');
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage()) or die(print_r(($bdd->errorInfo)));
				}

				// Requête SQL sécurisée
				$req = $bdd->prepare("SELECT * FROM users WHERE users.login=? AND users.password=?");
				$req->execute(array($login, $password));

				$query = "SELECT users.login, accounts.owner, accounts.type, accounts.amount FROM accounts INNER JOIN users ON accounts.owner = users.id  WHERE users.login = '" . $_POST['login'] . "' AND users.password = '" . $_POST['mot_de_passe'] ."'";
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
					echo '<p>Login ou Mot de passe incorrect</p>';
				}
				else {									
					//var_dump($userConnecte);

					?>			
					<h2> Comptes & Contrats </h2> 
					<?php
					echo "<p> Monsieur " . $userConnecte[0]["login"] . "</p>";
					?>
								
					<table id="tableau">
					<?php
					foreach ($userConnecte as $i => $account) {				
						?>
						<tr>
							<td id="compte"> <?php echo $userConnecte[$i]['type'] ?> </td>
							<td id="montant"> + <?php echo $userConnecte[$i]['amount'] ?> EUR </td>
						<tr>	
					<?php 
					} 
					?>
					</table>
					</div>
					<?php			
				}	
		     }

			else 
			{
			  	echo '<p>Erreur</p>';
			}				
		}
	}
	else
	{
		echo '<p> Erreur de vérification </p>';
	}
?>	

</body>
</html>
