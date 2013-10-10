<?php
/**
 * @file
 * Returns HTML for a sidebar region.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728118
 */
?>

<?php if ($is_front): ?>
  <section class="<?php print $classes; ?>">
    
    <div id = "frontLeftSide">
      <div class="frontSideBlock frontHours">
        <h2>Today's Hours</h2>
        <p class="white"><span class="shadow">8:30</span>am - <span class="shadow">10:00</span>pm</p>
       <p>
        <a href="http://www.library.tufts.edu/tisch/hours.htm">More
          <span class="thickChevron" aria-hidden="true">&raquo;</span></a></p>
      </div>
    <div class="frontSideBlock sideAsk">
      <h2>Ask a Librarian</h2>
      <ul>
        <li><span class="whiteText shadow" data-icon="&#xe00b;" aria-hidden="true"></span> Chat  <span class="thickChevron"  aria-hidden="true">&raquo;</span></a></li>
        <li><span class="whiteText shadow" data-icon="" aria-hidden="true">@</span> Email <span class="thickChevron" aria-hidden="true">&raquo;</span></a> </li>
        <li><span class="whiteText shadow" data-icon="&#xe00a;" aria-hidden="true"></span> In person <span class="thickChevron" aria-hidden="true">&raquo;</span></a> </li>
        <li><span class="whiteText shadow" data-icon="&#xe000;" aria-hidden="true"></span> Phone <span class="thickChevron" aria-hidden="true">&raquo;</span></a> </li>
      </ul>
    </div>
    
    
    
    <?php print $content; ?>
  </div>  <!--end frontLeftSide-->
  </section><!-- region__sidebar -->


<?php elseif ($content): ?>
  <div class="<?php print $classes; ?>">
    <?php print $content; ?>
  </div><!-- /.region -->
<?php endif; ?>