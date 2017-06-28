<?php 
session_start();
$note = 0;
$result ="";


if( !isset($_SESSION['name'] ) OR empty($_SESSION['name'] ) OR !isset($_SESSION['email'] ) OR empty($_SESSION["email"]) OR empty($_SESSION["content"]))
{	

	$host  	= $_SERVER['HTTP_HOST'];
	$uri   	= rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location: http://$host$uri/index.php");
	exit; 
}

else 
{
	$content = $_SESSION["content"];
	$numQuestion = count($content) ; //(-1 car tableau commence à 0)

	for ($i=0; $i < $numQuestion; $i++)
	{
		$id = "id". $i;

		if ($content[$id]["good"] == $content[$id]["reponse"])
		{	
			$result .= '<div class="correction true"><img src="assets/img/true.png" alt="vrai" />';
			$result .= "<p>Question : " . $content[$id]["question"];
			$result .= "<p>Votre réponse : ". $content[$id]["reponse"] .". Bonne réponse, Bravo ! </p> </div>";
			$note++;
		}
		else 
		{
			$result .= '<div class="correction false"><img src="assets/img/false.png" alt="faux" />';
			$result .= "<p>Question : " . $content[$id]["question"];
			$result .= "<p>Votre réponse : ". $content[$id]["reponse"] .". Mauvaise réponse, la bonne réponse était ".$content[$id]["good"]." </p> </div>";
		}
	}

}

$notefinal = ($note / $numQuestion) * 100;
$notefinal = intval($notefinal);

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
				<?php echo $result; ?> 

				<div class="question">
				Votre note est de <?php echo $notefinal ?> /100
				</div>
			</main><!-- Fin de main -->				
		</div><!-- Fin de la div qcm-->				
	</div><!-- Fin de la div container --> 
</body>
</html>				