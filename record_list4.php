<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>

<h1><?=$pageID?></h1>
<?php
$sql = "select * from DiscogsInventory";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo 'Artist: <b>' . $row['Artist'] . '</b> ';
        echo 'Title: <b>' . $row['Title'] . '</b> <br>';
        echo 'Label: <b>' . $row['Label'] . '</b> ';
        echo 'Catalog: <b>' . $row['Catalog'] . '</b> <br>';
        echo 'Format: <b>' . $row['Format'] . '</b> ';
        echo 'Released: <b>' . $row['Released'] . '</b> ';
        echo '<a href="record_view.php?id=' . $row['id'] . '">' . $row['Title'] . '</a>';
        
        echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>There are currently no records</p>';
}


#reference images for pager
$prev = '<img src="' . VIRTUAL_PATH . 'images/arrow_prev.gif" border="0" />';
$next = '<img src="' . VIRTUAL_PATH . 'images/arrow_next.gif" border="0" />';




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
            <a href="' . VIRTUAL_PATH . 'record_view.php?id=' . (int)$row['id'] . '">' . dbOut($row['Title']) . '</a>
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