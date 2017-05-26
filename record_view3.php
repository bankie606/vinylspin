<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:record_list.php');
}


$sql = "select * from DiscogsInventory where id = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $Artist = stripslashes($row['Artist']);
        $Title = stripslashes($row['Title']);
        $Label = stripslashes($row['Label']);
        $title = "Title Page for " . $Title;
        $pageID = $Artist;
//        $Labelsimp = strstr("$Label ", ", ", true);
        $Feedback = '';//no feedback necessary
    }    


    
}else{//inform there are no records
    $Feedback = '<p>This record does not exist in this database.</p>';
}

?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
    
    
if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo 'Artist: <b>' . $Artist . '</b><br> ';
    echo 'Title: <b>' . $Title . '</b><br> ';
    echo 'Label: <b>' . $Label . '</b><br> ';
    switch($Label){
        case (file_exists("uploads/$Label.jpg")):
        echo '<img id="record-pic" src="uploads/' . str_replace(" ", "", strtolower($Label)) . '.jpg" />';
        break;
        
        case (!file_exists("uploads/$Label.jpg")):    
        echo '<img id="record-pic" src="uploads/default.jpg" />';
        break;
            
        default:
        echo '<img id="record-pic" src="uploads/default.jpg" />';
    }
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="record_list.php">Go Back</a></p>';

#reference images for pager
$prev = '<img src="' . VIRTUAL_PATH . 'images/arrow_prev.gif" border="0" />';
$next = '<img src="' . VIRTUAL_PATH . 'images/arrow_next.gif" border="0" />';

#Create a connection
# connection comes first in mysqli (improved) function
$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));


# Create instance of new 'pager' class
$myPager = new Pager(2,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0)
{#records exist - process
	if($myPager->showTotal()==1){$itemz = "customer";}else{$itemz = "customers";}  //deal with plural
    echo '<p align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</p>';
	while($row = mysqli_fetch_assoc($result))
	{# process each row
         echo '<p align="center">
            <a href="' . VIRTUAL_PATH . 'customer_view.php?id=' . (int)$row['CustomerID'] . '">' . dbOut($row['FirstName']) . '</a>
            </p>';
	}
	//the showNAV() method defaults to a div, which blows up in our design
    echo $myPager->showNAV();//show pager if enough records 
    
    //the version below adds the optional bookends to remove the div design problem
    //echo $myPager->showNAV('<p align="center">','</p>');
}else{#no records
    echo "<p align=center>What! No Customers?  There must be a mistake!!</p>";	
}


//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);





?>
<?php include 'includes/footer.php';?>