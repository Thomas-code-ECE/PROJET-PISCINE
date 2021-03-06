<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Informations de votre compte</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			if($("#souhait_acheteur").change(function(){
				if($(this).is($(":checked"))){
					$("#adresse_1").css("visibility","visible");
					$("#adresse_2").css("visibility","visible");
					$("#ville").css("visibility","visible");
					$("#code_p").css("visibility","visible");
					$("#pays").css("visibility","visible");
					$("#num").css("visibility","visible");
					$("#valider").css("visibility","visible");
				};
				if($(this).is($(":checked"))==false){
					$("#adresse_1").css("visibility","hidden");
					$("#adresse_2").css("visibility","hidden");
					$("#ville").css("visibility","hidden");
					$("#code_p").css("visibility","hidden");
					$("#pays").css("visibility","hidden");
					$("#num").css("visibility","hidden");
					$("#valider").css("visibility","hidden");
				};
			}));
			if($("#souhait_vendeur").change(function(){
				if($(this).is($(":checked"))){
					$("#photo_profil").css("visibility","visible");
					$("#image_fond").css("visibility","visible");
					$("#pseudo").css("visibility","visible");
					$("#valider").css("visibility","visible");
				};
				if($(this).is($(":checked"))==false){
					$("#photo_profil").css("visibility","hidden");
					$("#image_fond").css("visibility","hidden");
					$("#pseudo").css("visibility","hidden");
					$("#valider").css("visibility","hidden");
				};
			}));
			if($("#souhait_vendeur").is($(":checked"))){
					$("#photo_profil").css("visibility","visible");
					$("#image_fond").css("visibility","visible");
					$("#pseudo").css("visibility","visible");
					$("#valider").css("visibility","visible");
			};
			if($("#souhait_acheteur").is($(":checked"))){
					$("#adresse_1").css("visibility","visible");
					$("#adresse_2").css("visibility","visible");
					$("#ville").css("visibility","visible");
					$("#code_p").css("visibility","visible");
					$("#pays").css("visibility","visible");
					$("#num").css("visibility","visible");
					$("#valider").css("visibility","visible");
			};
		});
	</script>
</head>
<body>
	<h1>Information sur votre compte:</h1>
	<?php 
		try
		{
			$bdd = new PDO('mysql:host=localhost:3308;dbname=projetpiscine;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
		$reponse=$bdd->query("	SELECT *
								FROM acheteur							
							") or die(print_r($bdd->errorInfo()));
		$type="vendeur";
		while($donnees=$reponse->fetch()){
			if($donnees['Email_ECE']==$_GET['email']){
				$type="acheteur";
				echo  '<table><tr><td>Nom: '.$donnees["Nom_acheteur"].'</td></tr><tr><td>Prenom: '.$donnees["Prenom_acheteur"].'</td></tr><tr><td>Adresse: '.$donnees["Adresse_ligne1"].'</td></tr><tr><td>Email :'.$donnees["Email_ECE"].'</td></tr></table>';

			}
		}
		$reponse->closeCursor();
		$reponse_2=$bdd->query("SELECT *
								FROM vendeur							
							") or die(print_r($bdd->errorInfo()));
		while($donnees_2=$reponse_2->fetch()){
			if(($donnees_2['Email_ECE']==$_GET['email'])&&($type=="acheteur")){
				$type="acheteur_vendeur";
			}
			if(($donnees_2['Email_ECE']==$_GET['email'])&&($type=="vendeur")){
				echo  '<table><tr><td>Nom: '.$donnees_2["Nom_vendeur"].'</td></tr><tr><td>Prenom: '.$donnees_2["Prenom_vendeur"].'</td></tr><tr><td>Email :'.$donnees_2["Email_ECE"].'</td></tr></table>';

			}
		}
		$reponse_2->closeCursor();
	 if($type=="vendeur"){
	 	echo '<form method="POST" action="Information_compte_paiement.php"><input type="hidden" name="email" value="'.$_GET["email"].'" /></form>Voulez-vous acheter des articles sur notre site?<input type="checkbox" name="souhait_acheteur" id="souhait_acheteur"/>';
	 ?>
	 <form method="POST" action="verification_acheteur.php"/>
	 	<table>
			<tr>
				<td>
					<select name="pays" id="pays" style="visibility:hidden;">
						<optgroup label="Afrique">
							<option value="afriqueDuSud">Afrique Du Sud</option>
							<option value="algerie">Algérie</option>
							<option value="angola">Angola</option>
							<option value="benin">Bénin</option>
							<option value="botswana">Botswana</option>
							<option value="burkina">Burkina</option>
							<option value="burundi">Burundi</option>
							<option value="cameroun">Cameroun</option>
							<option value="capVert">Cap-Vert</option>
							<option value="republiqueCentre-Africaine">République Centre-Africaine</option>
							<option value="comores">Comores</option>
							<option value="republiqueDemocratiqueDuCongo">République Démocratique Du Congo</option>
							<option value="congo">Congo</option>
							<option value="coteIvoire">Côte d'Ivoire</option>
							<option value="djibouti">Djibouti</option>
							<option value="egypte">Égypte</option>
							<option value="ethiopie">Éthiopie</option>
							<option value="erythrée">Érythrée</option>
							<option value="gabon">Gabon</option>
							<option value="gambie">Gambie</option>
							<option value="ghana">Ghana</option>
							<option value="guinee">Guinée</option>
							<option value="guinee-Bisseau">Guinée-Bisseau</option>
							<option value="guineeEquatoriale">Guinée Équatoriale</option>
							<option value="kenya">Kenya</option>
							<option value="lesotho">Lesotho</option>
							<option value="liberia">Liberia</option>
							<option value="libye">Libye</option>
							<option value="madagascar">Madagascar</option>
							<option value="malawi">Malawi</option>
							<option value="mali">Mali</option>
							<option value="maroc">Maroc</option>
							<option value="maurice">Maurice</option>
							<option value="mauritanie">Mauritanie</option>
							<option value="mozambique">Mozambique</option>
							<option value="namibie">Namibie</option>
							<option value="niger">Niger</option>
							<option value="nigeria">Nigeria</option>
							<option value="ouganda">Ouganda</option>
							<option value="rwanda">Rwanda</option>
							<option value="saoTomeEtPrincipe">Sao Tomé-et-Principe</option>
							<option value="senegal">Séngal</option>
							<option value="seychelles">Seychelles</option>
							<option value="sierra">Sierra</option>
							<option value="somalie">Somalie</option>
							<option value="soudan">Soudan</option>
							<option value="swaziland">Swaziland</option>
							<option value="tanzanie">Tanzanie</option>
							<option value="tchad">Tchad</option>
							<option value="togo">Togo</option>
							<option value="tunisie">Tunisie</option>
							<option value="zambie">Zambie</option>
							<option value="zimbabwe">Zimbabwe</option>
						</optgroup>
						<optgroup label="Amérique">
							<option value="antiguaEtBarbuda">Antigua-et-Barbuda</option>
							<option value="argentine">Argentine</option>
							<option value="bahamas">Bahamas</option>
							<option value="barbade">Barbade</option>
							<option value="belize">Belize</option>
							<option value="bolivie">Bolivie</option>
							<option value="bresil">Brésil</option>
							<option value="canada">Canada</option>
							<option value="chili">Chili</option>
							<option value="colombie">Colombie</option>
							<option value="costaRica">Costa Rica</option>
							<option value="cuba">Cuba</option>
							<option value="republiqueDominicaine">République Dominicaine</option>
							<option value="dominique">Dominique</option>
							<option value="equateur">Équateur</option>
							<option value="etatsUnis">États Unis</option>
							<option value="grenade">Grenade</option>
							<option value="guatemala">Guatemala</option>
							<option value="guyana">Guyana</option>
							<option value="haiti">Haïti</option>
							<option value="honduras">Honduras</option>
							<option value="jamaique">Jamaïque</option>
							<option value="mexique">Mexique</option>
							<option value="nicaragua">Nicaragua</option>
							<option value="panama">Panama</option>
							<option value="paraguay">Paraguay</option>
							<option value="perou">Pérou</option>
							<option value="saintCristopheEtNieves">Saint-Cristophe-et-Niévès</option>
							<option value="sainteLucie">Sainte-Lucie</option>
							<option value="saintVincentEtLesGrenadines">Saint-Vincent-et-les-Grenadines</option>
							<option value="salvador">Salvador</option>
							<option value="suriname">Suriname</option>
							<option value="triniteEtTobago">Trinité-et-Tobago</option>
							<option value="uruguay">Uruguay</option>
							<option value="venezuela">Venezuela</option>
						</optgroup>
						<optgroup label="Asie">
							<option value="afghanistan">Afghanistan</option>
							<option value="arabieSaoudite">Arabie Saoudite</option>
							<option value="armenie">Arménie</option>
							<option value="azerbaidjan">Azerbaïdjan</option>
							<option value="bahrein">Bahreïn</option>
							<option value="bangladesh">Bangladesh</option>
							<option value="bhoutan">Bhoutan</option>
							<option value="birmanie">Birmanie</option>
							<option value="brunei">Brunéi</option>
							<option value="cambodge">Cambodge</option>
							<option value="chine">Chine</option>
							<option value="coreeDuSud">Corée Du Sud</option>
							<option value="coreeDuNord">Corée Du Nord</option>
							<option value="emiratsArabeUnis">Émirats Arabe Unis</option>
							<option value="georgie">Géorgie</option>
							<option value="inde">Inde</option>
							<option value="indonesie">Indonésie</option>
							<option value="iraq">Iraq</option>
							<option value="iran">Iran</option>
							<option value="israel">Israël</option>
							<option value="japon">Japon</option>
							<option value="jordanie">Jordanie</option>
							<option value="kazakhstan">Kazakhstan</option>
							<option value="kirghistan">Kirghistan</option>
							<option value="koweit">Koweït</option>
							<option value="laos">Laos</option>
							<option value="liban">Liban</option>
							<option value="malaisie">Malaisie</option>
							<option value="maldives">Maldives</option>
							<option value="mongolie">Mongolie</option>
							<option value="nepal">Népal</option>
							<option value="oman">Oman</option>
							<option value="ouzbekistan">Ouzbékistan</option>
							<option value="pakistan">Pakistan</option>
							<option value="philippines">Philippines</option>
							<option value="qatar">Qatar</option>
							<option value="singapour">Singapour</option>
							<option value="sriLanka">Sri Lanka</option>
							<option value="syrie">Syrie</option>
							<option value="tadjikistan">Tadjikistan</option>
							<option value="taiwan">Taïwan</option>
							<option value="thailande">Thaïlande</option>
							<option value="timorOriental">Timor oriental</option>
							<option value="turkmenistan">Turkménistan</option>
							<option value="turquie">Turquie</option>
							<option value="vietNam">Viêt Nam</option>
							<option value="yemen">Yemen</option>
						</optgroup>
						<optgroup label="Europe">
							<option value="allemagne">Allemagne</option>
							<option value="albanie">Albanie</option>
							<option value="andorre">Andorre</option>
							<option value="autriche">Autriche</option>
							<option value="bielorussie">Biélorussie</option>
							<option value="belgique">Belgique</option>
							<option value="bosnieHerzegovine">Bosnie-Herzégovine</option>
							<option value="bulgarie">Bulgarie</option>
							<option value="croatie">Croatie</option>
							<option value="danemark">Danemark</option>
							<option value="espagne">Espagne</option>
							<option value="estonie">Estonie</option>
							<option value="finlande">Finlande</option>
							<option value="france">France</option>
							<option value="grece">Grèce</option>
							<option value="hongrie">Hongrie</option>
							<option value="irlande">Irlande</option>
							<option value="islande">Islande</option>
							<option value="italie">Italie</option>
							<option value="lettonie">Lettonie</option>
							<option value="liechtenstein">Liechtenstein</option>
							<option value="lituanie">Lituanie</option>
							<option value="luxembourg">Luxembourg</option>
							<option value="exRepubliqueYougoslaveDeMacedoine">Ex-République Yougoslave de Macédoine</option>
							<option value="malte">Malte</option>
							<option value="moldavie">Moldavie</option>
							<option value="monaco">Monaco</option>
							<option value="norvege">Norvège</option>
							<option value="paysBas">Pays-Bas</option>
							<option value="pologne">Pologne</option>
							<option value="portugal">Portugal</option>
							<option value="roumanie">Roumanie</option>
							<option value="royaumeUni">Royaume-Uni</option>
							<option value="russie">Russie</option>
							<option value="saintMarin">Saint-Marin</option>
							<option value="serbieEtMontenegro">Serbie-et-Monténégro</option>
							<option value="slovaquie">Slovaquie</option>
							<option value="slovenie">Slovénie</option>
							<option value="suede">Suède</option>
							<option value="suisse">Suisse</option>
							<option value="republiqueTcheque">République Tchèque</option>
							<option value="ukraine">Ukraine</option>
							<option value="vatican">Vatican</option>
						</optgroup>
						<optgroup label="Océanie">
							<option value="australie">Australie</option>
							<option value="fidji">Fidji</option>
							<option value="kiribati">Kiribati</option>
							<option value="marshall">Marshall</option>
							<option value="micronesie">Micronésie</option>
							<option value="nauru">Nauru</option>
							<option value="nouvelleZelande">Nouvelle-Zélande</option>
							<option value="palaos">Palaos</option>
							<option value="papouasieNouvelleGuinee">Papouasie-Nouvelle-Guinée</option>
							<option value="salomon">Salomon</option>
							<option value="samoa">Samoa</option>
							<option value="tonga">Tonga</option>
							<option value="tuvalu">Tuvalu</option>
							<option value="vanuatu">Vanuatu</option>
						</optgroup>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="number" id="code_p" name="code_p" placeholder="Code postal" style="visibility:hidden;"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="adresse_1" id="adresse_1" placeholder="Adresse numéro 1" style="visibility:hidden;"/>
				</td>
			</tr>
			<tr>
				<td id="td_adresse_2" style="visibility:hidden;">
					<input type="text" name="adresse_2" id="adresse_2" placeholder="Adresse numéro 2"/>
					(Facultatif)
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="ville" id="ville" placeholder="Ville" style="visibility:hidden;"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="tel" name="num" id="num" placeholder="Numéro de téléphone" style="visibility:hidden;"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="email" id="email" value="<?php echo $_GET["email"];?>" style="visibility:hidden;"/>
				</td>
			</tr>
		</table>
		<input type="submit" value="Valider"  id="valider" name="valider" style="visibility:hidden"/>
	</form>
	 <?php
	 }
	 if($type=="acheteur"){
	 	echo'<form method="POST" action="Information_compte_paiement.php">Si vous voulez connaitre vos informations de paiement, saisissez votre mot de passe:<input type="password" name="mdp"id="mdp" /><input type="submit" name="validation" value="Voir mes informations"/><input type="hidden" name="email" value="'.$_GET["email"].'" /></form>Voulez-vous devenir vendeur ?<input type="checkbox" name="souhait_vendeur" id="souhait_vendeur"/>';

	 	?>
	 <form action="verification_vendeur.php" method="POST" enctype="multipart/form-data"/>
	 	<table>
	 		<tr>
				<td>
					<input type="file"  id="photo_profil" accept="image/png,image/jpeg" name="photo_profil" style="visibility:hidden;"/>
				</td>
			</tr>
				<td>
					<input type="file" id="image_fond" accept="image/png,image/jpeg" name="image_fond" style="visibility:hidden;"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" style="visibility:hidden;"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="email" id="email" value="<?php echo $_GET["email"]?>" style="visibility:hidden;"/>
				</td>
			</tr>
	 	</table>
	 	<input type="submit" id ="valider" value="Valider" name="valider" style="visibility:hidden"/>
	 </form>
	 
	 <?php 
	}
	 	if($type=="acheteur_vendeur"){
	 		echo'<form method="POST" action="Information_compte_paiement.php">Si vous voulez connaitre vos informations de paiement, saisissez votre mot de passe:<input type="password" name="mdp"id="mdp" /><input type="submit" name="validation" value="Voir mes informations"/><input type="hidden" name="email" value="'.$_GET["email"].'" /></form>';
	 	}
	  ?>
	
</body>
</html>