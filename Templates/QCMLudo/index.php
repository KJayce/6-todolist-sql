<?php 
$errorLog = "";

if (isset($_POST['studentSubmit']))
{
	if( isset($_POST["lastname"]) && !empty($_POST["lastname"]) && isset($_POST["email"]) && !empty($_POST["email"]))
	{	
		session_start();

		$_POST["lastname"]	= trim($_POST["lastname"]);
		$_POST["lastname"]	= filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
		$_SESSION['name'] 	= $_POST["lastname"];
		$_SESSION["email"]	= $_POST["email"];

		$host  	= $_SERVER['HTTP_HOST'];
		$uri   	= rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("Location: http://$host$uri/question.php");
		exit;
	}
	else
	{
		$errorLog = "Vous n'avez pas rempli les champs correctement";
	}

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
			<div class="jumbotron text">			
				<h2>Encode ton prénom  et ton adresse email</h2>
				<p>Pour commencer, complète ton prénom et ton adresse email. Nous en aurons besoin pour la suite du QCM</p>
				<form method="post" action="" id="student">
					<div class="col-xs-4">						
					<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Prénom">
					</div>
					<div class="col-xs-4">					
					<input type="email" name="email" id="email" class="form-control" placeholder="Email : exemple@exemple.com">
					</div>
					<div class="col-xs-4">
					<button class="btn btn-primary studentbtn" type="submit" form="student" value="studentSubmit" name="studentSubmit">Envoie</button>
					</div>
				</form>
				<p><?php	echo $errorLog;	?></p>
					

			</div>			
		</div><!-- Fin de la div qcm-->				
	</div><!-- Fin de la div container --> 
</body>
</html>