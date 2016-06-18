<?php
# 	linked naar de database
include_once("assets/php/config.php");
#	bevat alle gebruikte functies
include_once("assets/php/functions.php");

if (isset($_GET['s'])){
require_once (dirname(__FILE__) . '/assets/php/class-search.php');
$search = new search();
$search_term = htmlspecialchars($_GET['s'], ENT_QUOTES);
$search_results = $search->search($search_term);
}
# source: http://www.johnmorrisonline.com/a-php-script-to-search-a-mysql-database/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Femke Offringa | Filmoverzicht</title>
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

<?php if($search_results){ //als search_results bestaat voer uit?>
<div class="results-count">
	<p>Aantal overeenkomsten: <?php echo $search_results['count'];//pak de eerste optie uit de array search-results?></p>
</div>
<div class="results-table">
	<?php foreach( $search_results['results'] as $search_result ){//noem voor het gemak de tweede optie uit de array search_results voortaan search_result ?> 
<div class="results">
	<p><?php echo $search_result->title;//toon titel?> </p>
</div>
	<?php } //end foreach ?>
<?php } //end if 	
	else{ echo "Dit zoekwoord staat niet in de database."?>
 </div>
 	<?php } //end else ?>
<footer>
		<ul>
 			 <li>femke offringa</li> 
 			 <li><a href="mailto:femke_offringa@hotmail.com">femke_offringa@hotmail.com</a></li>
 			 <li>0623215100</li>
 		 </ul>
	</footer>
</body>
</html>