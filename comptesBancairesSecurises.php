
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
<div id="zone1">
<a href="formulaireSecurise.php"> <-- retour </a>

<h1> testseVos comptes bancaires (sécurisés) </h1>




	<?php

    if (isset($_POST['login']) AND isset($_POST['mot_de_passe'])) {
    	
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
			echo "<p> Bonjour <strong>" . $userConnecte[0]["login"] . "</strong>, voici vos comptes bancaires : </p>";
			?>
			
			<table>
			<?php
			foreach ($userConnecte as $i => $account) {				
				?>
				<tr>
					<td> <?php echo $userConnecte[$i]['type'] ?> </td>
					<td> <?php echo $userConnecte[$i]['amount'] ?> </td>
				<tr>	
			<?php 
			} 
			?>
			</table>
			</div>
			<?php
			
		}
	
     }
	 
     else {
     	echo '<p>Erreur</p>';
     }
   
    ?>
    
    

</body>
</html>