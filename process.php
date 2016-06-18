 <?php
// connects to database.
include_once("assets/php/config.php"); 
include_once("assets/php/functions.php");

// here the selection is made wich function to use.
	if(!empty($_POST['action'])){ //if there is a function found
		switch($_POST['action']){ //switch to it
			case "addNewMovie":		//links to addNewMovie
				addNewMovie();
			break;
			case "deleteMovie":		//Links to deleteMovie
				deleteMovie();
			break;
			case "changeMovie":		//Links to changeMovie (doenst work yet, not enough time left:P)
				changeMovie();
			break;
			default:				// this is the standard function. if no function are addes this is displayed.
			trigger_error("Geen geldige opdracht ontvangen.", E_USER_ERROR);
			break;
		}
	}else{	//trigger this if all are empty.
		trigger_error("Geen opdracht ontvangen.", E_USER_ERROR);
	}

function addNewMovie(){	
	$title = $_POST['title'];		//post to database in title
	$actors = $_POST['actors'];		//post to database in actors
	$genre = $_POST['genre'];		//post to database in genre
	$year = $_POST['year'];			//post to database in year
	$abstract = $_POST['abstract'];	//post to databse in abstract
	$rating = $_POST['rating'];		//post to database in rating

	$errors = array();				// put eventual errors in  an array

	//title validation 
		if($title == ""){ 
			$errors[] = "Er is geen titel ingevoerd.";
		} // if empty add to error array
		if (stripos($title,"<script>") !== false){
			$errors[] ="Er mag geen javascript ingevuld worden.";
		} //if a script is inserted add to error


	//actors validation  
		if($actors == ""){
			$errors[] ="Er zijn geen acteurs ingevoerd.";
		} // if empty add to error array
		if (stripos($actors,"<script>") !== false){
			$errors[] ="Er mag geen javascript ingevuld worden.";
		}//if a script is inserted add to error

	//genre validation
		if($genre == ""){
			$errors[] = "Er is geen genre gekozen.";
		} // if empty add to error array

	//year validation
		if($year ==""){
			$errors[] = "Er is geen jaar ingevoerd.";
		} // if empty add to error array
		if(!is_numeric($year)){
			$errors[] = "Bij jaar zijn er geen cijfers ingevuld";
		} //Checks is there are numbers inserted
			#source: http://stackoverflow.com/questions/16362058/php-form-numeric-validation
		if(strlen($year) != 4){
			$errors[] ="Er is bij jaar geen geldig aantal cijfers ingevuld.";
		} //checks for amound of numbers entered
			#source: http://stackoverflow.com/questions/16362058/php-form-numeric-validation
		if (stripos($year,"<script>") !== false){
			$errors[] ="Er mag geen javascript ingevuld worden.";
		} //if a script is inserted add to error
		if($year <= "1890"){
			$errors[] ="Het jaartal is te lang geleden.";
		} //check if the number inserted is bigger then 1890 (first movie made)
	
	//abstract validation
		if($abstract ==""){
			$errors[] = "Er is geen samenvatting ingevoerd.";
		} // if empty add to error array
		if (stripos($abstract,"<script>") !== false){
			$errors[] ="Er mag geen javascript ingevuld worden.";
		} //if a script is inserted add to error

	//rating validation
		if($rating ==""){
			$errors[] = "Er is geen beoordeling ingevuld.";
		} // if empty add to error array

	if(count($errors) <1){ // if there are no errors added to the error array
	$link = connect_db(); // connect to database
	
	$query = "INSERT INTO movies(title,actors,year,abstract,rating,genre) VALUES('${title}','${actors}','${year}','${abstract}','${rating}','${genre}')";
						// insert the right pieces to the right tables
	$result = mysqli_query($link, $query);
						// send the query to database.

		header('Refresh: 2; url=index.php'); //stuur de pagina door binnen 2 seconden.
		echo "De film is toegevoegd."; // geef een melding dat het goed is gegaan.
	
}else{ 
			// If there are errors, say so.
			echo "Er zijn 1 of meer fouten geconstateerd:<br />";
			echo "<pre>",print_r($errors,true),"</pre>"; //and specify
		
}// end else
} // end addNewMovie
function deleteMovie(){
		$id = $_POST['id']; 	//check for id
		$link = connect_db();	//connect
		$id = mysqli_real_escape_string($link,$id); //connect link and id

		$query = "DELETE FROM movies WHERE id = ${id}";
		//deletes from movies where the selected id is used.

		// Send query to database
		$result = mysqli_query($link, $query);

		// Check if there are less rows.
		if(mysqli_affected_rows($link)){
			header('Refresh: 2; url=index.php'); //send to index.php within 2 seconds.
			echo "De film is verwijderd.";
		}else{
			trigger_error("An error occured while executing query: ". mysqli_error($link));
			// show error if excists
		
	} // end deleteMessage()
}

function changeMovie(){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$year = $_POST['year'];
		$actors = $_POST['actors'];
		$genre = $_POST['genre'];
		$abstract = $_POST['abstract'];
		$rating = $_POST['rating'];
		
			$link = connect_db();

			$title = mysqli_real_escape_string($link,$title);
			$actors = mysqli_real_escape_string($link,$actors);
			$year = mysqli_real_escape_string($link,$year);
			$genre = mysqli_real_escape_string($link,$genre);
			$abstract = mysqli_real_escape_string($link,$abstract);
			$rating = mysqli_real_escape_string($link,$rating);
			
			$query = "UPDATE filmcollection SET title='$title', actors='$actors', year='$year', genre='$genre', abstract='$abstract', rating='$rating' WHERE id='$id'";

	$result = mysqli_query($link, $query);

	if(mysqli_affected_rows($link)){
			header('Refresh: 2; url=index.php');
			echo "De film is gewijzigd.";
	}else{
		echo $query;
		echo "<hr />";
		trigger_error("An error occured while executing query: ". mysqli_error($link));
	}
}
?>