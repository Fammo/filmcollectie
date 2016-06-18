<?php
# 	linked naar de database
include_once("assets/php/config.php");
#	bevat alle gebruikte functies
include_once("assets/php/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Femke Offringa | Filmcollectie</title>
	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
	<nav>										
			<ul>								
				<li><a href="index.php">Film overzicht</a></li>	
				<li><a href="film_beheer.php">Film toevoegen</a></li>	
			</ul>
		</nav>
</head>
<body>

<div class="content_toevoegen">
<form id="addnewMovie" action="process.php" method="post" class="vertical"><input type="hidden" name="action" value="addNewMovie">
<h1>Voeg een nieuwe film toe</h1>
<p> Voeg hier een nieuwe toe door de velden in te vullen en op sumbit te klikken. <br>Het is niet mogelijk een film in te voeren die al eerder in de database is verschenen.<br> Dit is te controleren met de zoekbalk in het filmoverzicht.</p>
	<br>
	<br>
 	<ul>
 	<li><p1>Titel:</li><input type="text" name="title">
    <br><br>
  	<li>Acteurs:</li><input type="text" name="actors">
    <br><br>
	 	<li>Genre:</li>
	 	<input type="radio" name="genre" value="Horror"> Horror
	 	<input type="radio" name="genre" value="Misdaad"> Misdaad
		<input type="radio" name="genre" value="Actie"> Actie
		<input type="radio" name="genre" value="Drama"> Drama
		<input type="radio" name="genre" value="Fantasie"> Fantasie
		<input type="radio" name="genre" value="Comedy"> Comedy
		<input type="radio" name="genre" value="Romantiek"> Romantiek
	<!--source: http://www.w3schools.com/html/html_form_input_types.asp-->
    <br><br>  
	<li>Jaar van uitkomst:</li><input type="text" name="year">
    <br><br> 
    <li>Samenvatting:</li><input type="text" name="abstract">
    <br><br> 
  	<li>Beoordeling:</li>
  	<input type="radio" name="rating" value="1"> Zeer slecht
	<input type="radio" name="rating" value="2"> Slecht
	<input type="radio" name="rating" value="3"> Matig
	<input type="radio" name="rating" value="4"> Goed
	<input type="radio" name="rating" value="5"> Zeer goed
	<!--source: http://www.w3schools.com/html/html_form_input_types.asp-->
	</p1>

    <br><br>
    <li><input type="submit" value="submit">
    </ul>
</form>
</div>

</form>
</div>

<footer>
		<ul>
 			 <li>femke offringa</li> 
 			 <li><a href="mailto:femke_offringa@hotmail.com">femke_offringa@hotmail.com</a></li>
 			 <li>0623215100</li>
 		 </ul>
	</footer>
</body>
</html>