<?php
/**
 * @file
 * Returns HTML for a region.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728112
 */
?>
<?php if ($content): ?>

  <div class="<?php print $classes; ?>">
  	<div id="askHeader">
    	<div id="ask">
    	<a href=""><span  data-icon="&#xe00b;" aria-hidden="true"></span>  Ask a Librarian</a>
    	<hr>
    </div>
       <div id="audtopic">
       	<div id="aud">
       		<a href="">I'm a...</a>
         </div>
         <div id="topic">
         	<a href="">My subject is...</a>
         </div>
    </div>
    </div>
    <?php print $content; ?>
  </div><!-- /.region -->
<?php endif; ?>
