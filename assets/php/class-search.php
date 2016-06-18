<?php 
# 	linken naar de database
include_once("assets/php/config.php");
include_once("assets/php/functions.php");

class search{

private $mysqli;

public function __construct(){
	#verbind met database
	$this->mysqli = connect_db();
} #end construct

public function search($search_term){
	# source: http://www.johnmorrisonline.com/a-php-script-to-search-a-mysql-database/
	
	$sanatized = $this->mysqli->real_escape_string($search_term);
	$query = $this->mysqli->query(
		"SELECT title, actors, genre, year, abstract, rating
		FROM movies
		WHERE title LIKE '%{$sanatized}%'
		OR actors LIKE '%{$sanatized}%'
		OR genre LIKE '%{$sanatized}%'
		OR year LIKE '%{$sanatized}%'
		OR abstract LIKE '%{$sanatized}%'
		OR rating LIKE '%{$sanatized}%'");

if(!$query->num_rows){
	return false;
 } 
	while($row =$query->fetch_object()){
		$rows[] =$row;

	} // end while

	$search_results = array(
		'count' => $query->num_rows,
		'results' => $rows);

	return $search_results;
}
}
?>