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
		<!-- Javascript -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/kickstart.js"></script>
</head>
<body>
	<h2> Verander hier filmdetails </h2>
		<p> Niet elke invoer is gelijk de eerste keer perfect. Daarom kunt u hieronder per film en per catagorie alsnog bepaalde gegevens aanpassen door deze in het kader te typen en op "Update" te klikken.</p>
 <?php 			
	$id = $_POST['id'];
	$link = connect_db();
	$id=mysqli_real_escape_string($link,$id);
	$query = "SELECT * FROM movies WHERE id=${id}";
	# Send query to database and receive response in $result
	$result = mysqli_query($link,$query);
	$entry = mysqli_fetch_assoc($result);
 		if(mysqli_affected_rows($link)){ //When info is found
?>
<div class="content_wijzigen">
	<form id="changeMovie" action="process.php" method="post" class="vertical">
				<input type="hidden" name="action" value="changeMovie">
				<input type="hidden" name="id" value="<?php echo $entry['id']?>">
                <h2>Film wijzigen</h2>			    
                <br><br>
                <ul>
			 	<li><p1>Titel:</li><input type="text" name="title" placeholder="<?php echo $entry['title']?>">
			    <br><br>
			  	<li>Acteurs:</li><input type="text" name="actors" placeholder="<?php echo $entry['actors']?>">
			    <br><br>
				 	<li>Genre: was <?php echo $entry['genre']?></li>
				 	<input type="radio" name="genre" value="Horror"> Horror
				 	<input type="radio" name="genre" value="Misdaad"> Misdaad
					<input type="radio" name="genre" value="Actie"> Actie
					<input type="radio" name="genre" value="Drama"> Drama
					<input type="radio" name="genre" value="Fantasie"> Fantasie
					<input type="radio" name="genre" value="Comedy"> Comedy
					<input type="radio" name="genre" value="Romantiek"> Romantiek
				<!--source: http://www.w3schools.com/html/html_form_input_types.asp-->
			    <br><br>  
				<li>Jaar van uitkomst:</li><input type="text" name="year" placeholder="<?php echo $entry['year']?>">
			    <br><br> 
			    <li>Samenvatting:</li><input type="text" name="abstract" placeholder="<?php echo $entry['abstract']?>">
			    <br><br> 
			  	<li>Beoordeling: was <?php echo $entry['rating']?> </li>
			  	<input type="radio" name="rating" value="1"> Zeer slecht
				<input type="radio" name="rating" value="2"> Slecht
				<input type="radio" name="rating" value="3"> Matig
				<input type="radio" name="rating" value="4"> Goed
				<input type="radio" name="rating" value="5"> Zeer goed
				<br><br>

				<li><button type="submit" title="Voeg toe aan de filmcollectie">Toevoegen</button></li>
                <li><button type="reset" title="Begin overnieuw">Reset</button></li><br>
                </p1>
                </li>
                </ul>
</form></div>

<?php }  // end if?>
<footer>
		<ul>
 			 <li>femke offringa</li> 
 			 <li><a href="mailto:femke_offringa@hotmail.com">femke_offringa@hotmail.com</a></li>
 			 <li>0623215100</li>
 		 </ul>
	</footer>
</body>
</html>