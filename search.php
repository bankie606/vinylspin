<?php

require 'includes/config.php'; #provides configuration, pathing, error handling, db credentials 

#Create a connection
# connection comes first in mysqli (improved) function
$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

    /*       
        if connection fails it will stop loading the page and display an error
    */
if(mysqli_connect_errno()){
        echo "Failed to connect: " . mysqli_connect_error();
    }

     
//mysqli_select_db($iConn, "DiscogsInventory") or die(mysql_error());
    /* tutorial_search is the name of database we've created */


   
# SQL statement
$sql = "select * from DiscogsInventory";

#Fills <title> tag  
$title = 'Database Search';

# END CONFIG AREA ---------------------------------------------------------- 

include 'includes/header.php'; #header must appear before any HTML is printed by PHP

include 'includes/randomnameguy.php'; #random name generator


$output='';

if(isset($_GET['query']) && $_GET['query'] !== ' ') {
    $searchq = $_GET['query'];
    
     $query = mysqli_real_escape_string($iConn,$query);
        // makes sure nobody uses SQL injection
    
    $q = mysqli_query($iConn, "SELECT * FROM DiscogsInventory WHERE TITLE LIKE '%$searchq%'  OR ARTIST LIKE '%$searchq%' OR LABEL LIKE '%$searchq%'" ) OR die (mysqli_error()); 
   
    $c = mysqli_num_rows($q);
    if($c == 0){
     $output = 'No search results for <b>' . $searchq . '</b> '. $randomnameguy . '.';
    } else
        while($row = mysqli_fetch_array($q))       {
        # process each row
       echo '<p>';
        echo '#<b>' . $row['id'] . '</b> <br>';
        echo 'Artist: <b>' . $row['Artist'] . '</b> ';
        echo 'Title: <b>' . $row['Title'] . '</b> <br>';
        echo 'Label: <b>' . $row['Label'] . '</b> ';
        echo 'Catalog: <b>' . $row['Catalog'] . '</b> <br>';
        echo 'Format: <b>' . $row['Format'] . '</b> ';
        echo 'Released: <b>' . $row['Released'] . '</b> ';
        echo '<a href="record_view.php?id=' . $row['id'] . '">' . $row['Title'] . '</a>';
	} 
    echo '<p>Total results for <b>' . $searchq . '</b> ' . $c . ', ' . $randomnameguy . '.</p>';
 
} else {
    header("location: ./");
}
   echo($output);
   mysqli_close($iConn);


?>
</body>
</html>