<?php 
session_start();
$errorLog = "";
$content = array();

if( !isset($_SESSION['name'] ) OR empty($_SESSION['name'] ) OR !isset($_SESSION['email'] ) OR empty($_SESSION["email"]))
{	

	$host  	= $_SERVER['HTTP_HOST'];
	$uri   	= rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location: http://$host$uri/index.php");
	exit; 
}

else if (isset($_POST['submit'])) 
{
	for ($i = 0; $i <= $_POST["id"]; $i++)
	{
		$content["id".$i] = array(
			"question" 	=> $_POST["question".$i],
			"good" 		=> $_POST["reponse".$i], 
			"reponse" 	=> $_POST["R".$i]);
	}
	$_SESSION["content"] = $content;

	$host  	= $_SERVER['HTTP_HOST'];
	$uri   	= rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location: http://$host$uri/resultat.php");
	exit; 

}
?>
<!DOCTYPE html>
<html>
<head>
	<title> My QCM</title>
	<meta charset="utf-8">
	<link rel="stylesheet"  href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet"  href="assets/css/style.css" />
</head>
<body>
	<div class="container">
		<div class="qcm">
			<header class="heading">
				<h1>Take the Quiz</h1>				
			</header>
			<div class="text">
			<?php 	
					echo "<h3> Très bien " . $_SESSION["name"] . ", reponds aux questions suivantes.</h3>";
					echo "<h4> Les résultats seront envoyés à l'adresse suivante : " . $_SESSION["email"] . "</h4>";
			?>
					<p>(Une seule réponse possible par question.)</p>
					<form method="post" id="deconnect" action="deconnect.php">
						<button class="btn btn-primary deconnect" type="submit" form="deconnect" value="deconnect" name="submit">Effacer ma session</button>	
					</form>					
				
		
			</div>

			<main>				
								
				<form method="post" action="" id="form">

					<div class="question">
						<span class="nmQuestion">1.</span><h3> La terre est-elle plate ? </h3>
						<p class="radio"><input type="radio" name="R0" id="plate" value="Oui, elle est plate" checked><label for="plate" checked>Oui, elle plate</label></p>
						<p class="radio"><input type="radio" name="R0" id="ovale" value="Non, elle est ovale" ><label for="ovale">Non, elle est ovale</label></p>
						<p class="radio"><input type="radio" name="R0" id="triangle" value="Elle est trianglulaire" ><label for="triangle">Elle est triangulaire</label></p>

						<!-- Reponse -->
						<input type="hidden" name="question0" value="La terre est-elle plate ?">
						<input type="hidden" name="reponse0" value="ovale">
					</div><!-- Fin de question 1-->

					<div class="question">
						<span class="nmQuestion">2.</span><h3> Quelle est la capitale de la Belgique ?</h3>
						<p class="radio"><input type="radio" name="R1" id="Bruxelles" value="Bruxelles" checked><label for="Bruxelles">Bruxelles</label></p>
						<p class="radio"><input type="radio" name="R1" id="Paris" value="Paris" ><label for="Paris">Paris</label></p>
						<p class="radio"><input type="radio" name="R1" id="Budapest" value="Budapest" ><label for="Budapest">Budapest</label></p>

						<!-- Reponse -->
						<input type="hidden" name="question1" value="Quelle est la capitale de la Belgique ?">
						<input type="hidden" name="reponse1" value="Bruxelles">
					</div><!-- Fin de question 2-->

					<div class="question">
						<span class="nmQuestion">3.</span><h3> Quels sont les languages informatique qu'on apprend chez Becode ?</h3>
						<p class="radio"><input type="radio" name="R2" id="php" value="PHP/CSS/HTML" checked><label for="php">PHP/CSS/HTML</label></p>
						<p class="radio"><input type="radio" name="R2" id="ruby" value="Ruby/C++" ><label for="ruby">Ruby/C++</label></p>
						<p class="radio"><input type="radio" name="R2" id="java" value="Java/Swift" ><label for="java">Java/Swift</label></p>

						<!-- Reponse -->
						<input type="hidden" name="question2" value="Quels sont les languages informatique qu'on apprend chez Becode ?">	
						<input type="hidden" name="reponse2" value="PHP/CSS/HTML"">
					</div><!-- Fin de question 2-->


					<div class="question">
						<span class="nmQuestion">4.</span><h3> Quel est la couleur du cheval blanc de Napoléon ?</h3>
						<p class="radio"><input type="radio" name="R3" id="rouge" value="Rouge sang" checked><label for="rouge">Rouge sang</label></p>
						<p class="radio"><input type="radio" name="R3" id="gris" value="Gris, à cause de la poudre à canon" ><label for="gris">Gris, à cause de la poudre à canon</label></p>
						<p class="radio"><input type="radio" name="R3" id="blanc" value="Blanc" ><label for="blanc">Blanc</label></p>

						<!-- Reponse -->
						<input type="hidden" name="question3" value="Quel est la couleur du cheval blanc de Napoléon ?">	
						<input type="hidden" name="reponse3" value="Blanc"">
					</div><!-- Fin de question 2-->





						<input type="hidden" name="id" value="3"><!-- nombre de question -1 -->

					<button class="btn btn-primary" type="submit" form="form" value="submit" name="submit">Submit</button>	
				</form><!-- fin ded form -->
			</main><!-- Fin de main -->				
		</div><!-- Fin de la div qcm-->				
	</div><!-- Fin de la div container --> 
</body>
</html>