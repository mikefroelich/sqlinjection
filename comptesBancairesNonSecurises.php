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
    <link rel="stylesheet" href="style_unsecure.css">
</head>
<body>
<br/>

<h1> Espace personnel <a href="formulaireNonSecurise.php"> <img src="logging-out.png" alt="Déconnexion" /> </a></h1> 

	<?php
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
			?>			
			<h2> Comptes & Contrats </h2> 
			<?php
			echo "<p> Monsieur " . $userConnecte[0]["login"] . "</p>";
			?>
			
			<table id="tableau">
			<?php
			//var_dump($userConnecte);
			
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
	
     else {
     	echo '<p>Erreur</p>';
     }
   
    ?>
</body>
</html>