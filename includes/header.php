<!DOCTYPE html>
<html>
<head>
     <?php    
    //dynamic copyright  
    date_default_timezone_set('America/Los_Angeles');
    $yearofoperation = date("Y");
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" title="blue" href="css/style.css"/>
<link rel="alternate stylesheet" type="text/css" title="pink" href="css/nauticahtml.css">
    <link rel="alternate stylesheet" type="text/css" title="pink" href="css/nauticalayout.css">
    <link rel="alternate stylesheet" type="text/css" title="purple" href="css/bluestyle.css">
    <link rel="stylesheet" href="css/activestyletoggle.css" />
    <link rel="stylesheet" href="css/recordstyle.css" />
    <link rel="stylesheet" href="css/flipstyle.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
        <script src="js/util.js" ></script>
        <script src="js/flipcard.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      active: false
    });
  } );
  </script>
    <script>

// *** TO BE CUSTOMISED ***

var style_cookie_name = "theme" ;
var style_cookie_duration = 30 ;
var style_domain = "frcrescioni.net/vinylspin/a9pager/" ;

// *** END OF CUSTOMISABLE SECTION ***
// You do not need to customise anything below this line

function switch_style ( css_title )
{
// You may use this script on your site free of charge provided
// you do not remove this notice or the URL below. Script from
// https://www.thesitewizard.com/javascripts/change-style-sheets.shtml
  var i, link_tag ;
  for (i = 0, link_tag = document.getElementsByTagName("link") ;
    i < link_tag.length ; i++ ) {
    if ((link_tag[i].rel.indexOf( "stylesheet" ) != -1) &&
      link_tag[i].title) {
      link_tag[i].disabled = true ;
      if (link_tag[i].title == css_title) {
        link_tag[i].disabled = false ;
      }
    }
    set_cookie( style_cookie_name, css_title,
      style_cookie_duration, style_domain );
  }
}
    
</script>
    
    
    
    
    
<title><?=$title?></title>
    </head>
    
    <body onload="set_style_from_cookie()">
         <script>
    $("#card").flip('toggle');
    </script>
        <!--menu options-->
<div id="header">
<?php $page = basename($_SERVER['SCRIPT_NAME']); ?> 
<ul id="menu">

    
<li <?php if ($page == 'template.php') { echo 'class="active"'; } ?>><a href="template.php">Template</a></li>    
<li <?php if ($page == 'record_list.php.php') { echo 'class="active"'; } ?>><a href="record_list.php">Record Inventory</a></li>
<li <?php if ($page == 'book.php') { echo 'class="active"'; } ?>><a href="book.php">Book Sample</a></li>    
<li <?php if ($page == 'contact.php') { echo 'class="active"'; } ?>><a href="contact.php">Contact</a></li>    
</ul>
</div> 
<!-- theme picker -->
<!--
        <h3>PICK A THEME</h3>
        <input id="blue" type="submit" onclick="switch_style('blue');return false;" name="theme" value="BSOD">
<input id="pink" type="submit" onclick="switch_style('pink');return false;" name="theme" value="Nautica05"> 
        <input id="purple" type="submit" onclick="switch_style('purple');return false;" name="theme" value="BlueSkies"> 
-->
        

            <!-- #page: holds the page content -->
  <div id="page">
      <div id="site_content">  
	
      <div id="header_image"></div>	  		    
        
	  <div id="content">
        
		<div class="border_top"></div>
        <div class="border_bottom"></div>			
		
		<div class="content_item">		
		

    <!-- #columns: holds the columns of the page -->
    <div id="columns" class="widthPad">


    <!-- Single column -->
    <div class="floatLeft width100">

        
        
        <header>
        <h1><?=$banner?></h1>
        </header>
            <section>
    <!--Header Ends Here -->  