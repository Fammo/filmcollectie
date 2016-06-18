<?php
# 	linked naar de database
include_once("assets/php/config.php");
#	bevat alle gebruikte functies
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
	<div class="search">
	    <form  method="get" action="overview.php" id="searchMovie"> 
		<input  type="search" name="s" placeholder="Typ hier je zoekterm"> 
		<input  type="submit" name="submit" value="Zoek"> 
		</form> 
	</div>

<?php
			# Connect to our database with a function from functions.php
			$link = connect_db();
			# Prepare query
			if(isset($_GET['s']) && $_GET['s'] !=""){
				$s = mysqli_real_escape_string($link,$_GET['s']);
				$query ="SELECT * FROM movies WHERE title LIKE '%${s}%' OR actors LIKE '%${s}%' OR year LIKE '%${s}%' OR summary LIKE '%${s}%' OR rating LIKE '%${s}%' OR genre LIKE '%${s}%'";
			}else{ 
 		$query = "SELECT * FROM movies ORDER BY title"; 
 	}
 	$result = mysqli_query($link,$query);
 	if(mysqli_num_rows($result)){ 
 		while($entry = mysqli_fetch_assoc($result)){
 ?>

 	<article class="entry" id="entry-<?php echo $entry['id']?>">
		<table>
			<tr><td><form action="process.php" method="post" class="delete">
				<input type="hidden" name="action" value="deleteMovie">
				<input type="hidden" name="id" value="<?php echo $entry['id']?>">
				<button type="delete" value="delete" title="Verwijder <?php echo $entry['title']?>">Delete</button> 
			</form></td>
			<td><form action="edit.php" method="post" class="edit">
				<input type="hidden" name="action" value="changeMovie">
				<input type="hidden" name="id" value="<?php echo $entry['id']?>">
				<button class="small" type="submit" title="Bewerk <?php echo $entry['title']?>">Edit</button>
			</form></td></tr>
		<h2><?php echo $entry["title"] ?></h2>
			<tr>
				<td><p>Beoordeling:</p></td>
				<td><?php for($i=1;$i<=$entry['rating'];$i++){?>
					<img src= "assets/gfx/star.gif" height="15" width="15">
				<?php } ?></td>
			</tr>
			<tr>
				<p><td>Genre:</td>
				<td><?php echo $entry["genre"];?></td>
			</tr>
			<tr>
				<td>Jaar van uitkomst:</td>
				<td><?php echo $entry["year"]."<br />";?></td>
			</tr>
			<tr>
				<td>Acteurs:</td>
				<td><?php echo $entry["actors"]."<br />";?></td>
			</tr>
			<tr>
				<td>Samenvatting:</td>
				<td><?php echo $entry["abstract"]."<br />";?></td>
			</tr></p>
		</table>

	</article>
				<?php 	} //endwhile ?>

				<?php	} //endif	?>
<footer>
		<ul>
 			 <li>femke offringa</li> 
 			 <li><a href="mailto:femke_offringa@hotmail.com">femke_offringa@hotmail.com</a></li>
 			 <li>0623215100</li>
 		 </ul>
	</footer>
</body>
</html>