<?php 
function connect_db(){
	$link = mysqli_connect(DBSERVER,DBUSER,DBPASS,DBNAME);
	if(!$link){
		die("Er kon geen verbinding worden gemaakt met de database.");
		return false;	
	}
	return $link;
}

?>
