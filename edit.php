<?php
include_once("assets/php/config.php");
include_once("assets/php/functions.php");

?>

<!DOCTYPE html>
<html lang-"nl">
<head>
	<meta charget="UTF-8">
	<title>Femke Offringa | Filmcollectie</title>
	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
	<!--icon source: <div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>-->
	<nav>										
			<ul>								
				<li><a href="index.php">Film overzicht</a></li>	
				<li><a href="film_beheer.php">Film toevoegen</a></li>
			</ul>
		</nav>
</head>
<body>
<?php
		$id=$_POST['id'];
		$link=connect_db();
		$id=mysqli_real_escape_string($link,$id);
		$query = "SELECT id,title,year,actors,genre,abstract,rating FROM movies WHERE id=${id}"; //selecteer de informatie van deze specifieke film
		$result = mysqli_query($link,$query);
		$entry = mysqli_fetch_assoc($result);
 		if(mysqli_affected_rows($link)){ //Wanneer er informatie gevonden wordt
?>
<div class = "white_bg clearfix">
	<div class = "grid">
		<form id="changeMovie" action="process.php" method="post" class="vertical">
		<input type="hidden" name="action" value="changeMovie">
		<input type="hidden" name="id" value="<?php echo $entry['id']?>">
			<h2>Wijzig Film</h2>
			<p>Niet elke invoer is goed in de eerste keer. Pas hem hier gerust aan!</p>
			<!-- In het formulier wordt door middel van $entry de eerder ingevulde informatie getoont en kan zo aangepast worden -->
<br><br>
		<label for="frm_title">Titel</label>
<br>			<input type= "text" name = "title" id="frm_title" value="<?php echo $entry['title'] ?>" />
<br><br>
			<label for="frm_year">Jaar</label>
<br>			<input type="text" name = "year" id="frm_year" value="<?php echo $entry['year'] ?>"/>
<br><br>
			<label for="frm_actors">Acteurs</label>
<br>			<input type="text" name = "actors" id="frm_actors" value="<?php echo $entry['actors'] ?>"/>
<br><br>
			<label for="frm_genre">Genre</label>
			<select name="genre" id="frm_genre"/>
			<option><?php echo $entry['genre']?></option>
			<option>Actie</option>
			<option>Comedy</option>
			<option>Documentaire</option>
			<option>Drama</option>
			<option>Horror</option>
			<option>Romantisch</option>
			<option>Sci-Fi</option>
			<option>Thriller</option>
			<option>Avontuur</option>
			<option>Animatie</option>
			<option>Anders</option>
<br>			</select>
<br><br>
			<label for="frm_abstract">Samenvatting</label>
<br>			<textarea name="abstract" id="frm_abstract"/><?php echo $entry['abstract'] ?></textarea>
<br><br>
 			<label for ="frm_rating">Waardering:</label>
 			<select name='rating' id ="frm_rating"/>
 			<option><?php echo $entry['rating'] ?></option>
 			<option>1</option>
 			<option>2</option>
 			<option>3</option>
 			<option>4</option>
 			<option>5</option>
 			</select>
 			<br><br>
<!-- Als er op submit gedrukt wordt wordt er een nieuwe entry gecreëert -->
			<button type = "submit"	title = "add">Wijzigen</button> 
</form>
</div>
</div>

<?php } ?>


</body>

<!-- Deze functie werkt niet. De reden hiervoor is dat ik het niet voor elkaar kreeg dat de oude post verwijderd werd, eigenlijk wordt er dus gewoon een nieuwe film toegevoegd. Ik heb ook nog geprobeerd met een UPDATE query (in plaats van de SELECT query in de editFilm functie) de id echt te gaan bewerken maar dit is ook niet gelukt omdat ik het in dat geval niet voor elkaar kreeg dat de hij de titel etc. van de desbetreffende film kon vinden. -->
