<section class="container">
    <div id="card">
    
        
        
      <?php


//echo '<div class="picturepadding>';
echo '<figure class="front"> <img style="border: 1px solid transparent;padding: 5%;
     -webkit-border-image: url('. $Frontside .') 10 round; /* Safari 3.1-5 */
     -o-border-image: url('. $Frontside .') 10 round; /* Opera 11-12.1 */
      " class="record-pic" src="'. $Frontside .'" alt="'. $Artist ." ". $Title .'" /></figure>';
echo '<figure class="back"> <img style="border: 1px solid transparent;padding: 5%;
     -webkit-border-image: url('. $Backside .') 10 round; /* Safari 3.1-5 */
     -o-border-image: url('. $Backside .') 10 round; /* Opera 11-12.1 */
      " class="record-pic" src="'. $Backside .'" alt="'. $Artist ." ". $Title .'" /></figure>';

//echo '</div>';
?>
<!--
<figure class="front"></figure>
      <figure class="back"></figure>
-->
    </div>
  </section>

    <section id="options">
    <p><button id="flip">Flip the script.</button></p>
  </section>

