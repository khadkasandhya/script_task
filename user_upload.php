<?php
/* MySQL server connection. */
$mysqli = new mysqli("localhost", "root", "");
 
/* Check connection */
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
/* Attempt create database query execution */
$sql = "CREATE DATABASE demo";
if($mysqli->query($sql) === true){
         
    echo "Database created successfully";
} 
else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
$mysqli = new mysqli("localhost", "root", "","demo");
$query = "CREATE TABLE  users(
id int,
name char(244),
surname char(244),
email varchar(244)
)";
if ($mysqli->query($query) === true) {
  echo "Table is successfully created in My_Company database.";
} else {
 echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
if (($open = fopen("users.csv", "r")) !== FALSE) 
  {
  
    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
    {        
                // Get row data
    	$name = ucwords(str_replace("'", "''", "$data[0]")); 
        $surname = ucwords(str_replace("'", "''", "$data[1]"));
        $email = strtolower(str_replace("'", "''", "$data[2]"));
               
                
        $query = "INSERT INTO users (name, surname, email) VALUES ('" . $name . "', '" . $surname . "', '" . $email. "')";
    if ($mysqli->query($query) === true) {
  echo "Table is inserted.";
} else {
 echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
                }
 
            // Close opened CSV file
    }
  
    fclose($open);

 
 
           
            // fclose($csvFile);
         
    
 
/* Close connection */
$mysqli->close();
?>