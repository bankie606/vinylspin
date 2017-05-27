<section class="container">
    <div id="card">
      <?php
 echo '<figure class="front"> <img id="label-pic" src="'. $Frontside .'" /></figure>';

echo '<figure class="back"> <img id="label-pic" src="'. $Backside .'" /></figure>';
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
<?php
 echo '<figure id="record-pic" background-image="uploads/' . str_replace(" ", "", strtolower($Label)) . '.jpg" />';
?>
