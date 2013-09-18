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

  
  <div class="lci_chat_load" >
  <h2>Chat with a librarian</h2>
  <div class="login_field" >
    <input placeholder="Name"/>
  </div>
  <div class="login_field" >
    <textarea placeholder="question here"></textarea> 
  </div>
  <div class="send_button" >
  <input class="lc_button" type="button" value="SEND">
  </div>
  </div>
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
