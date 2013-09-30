<?php
/**
 * @file
 * Returns HTML for a sidebar region.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728118
 */
?>
<section class="<?php print $classes; ?>">
  	<?php if ($is_front): ?>
   <!-- <div class="happening">
    <h3>Happening Now</h3>
   
</div>-->
<?php else:?>

  
  
<?php endif; ?>
<!-- Taken out; replaced by view block
<div class="recentArrival">
  <hr>
  <h4>RECENT ARRIVALS</h4>
</div>  
-->

<!--<div class="lowerMainContent">
    <div id="frontChat">-->
   <?php print $content; ?>


<!--end content for front page-->
  	
  	
    
    
    
  </section><!-- region__sidebar -->
