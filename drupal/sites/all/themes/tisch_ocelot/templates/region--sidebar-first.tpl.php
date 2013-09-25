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
      <span class="thickChevron" data-icon="&#xf101;" aria-hidden="true"></span></a></p>
       </div>
      <div class="frontSideBlock sideAsk">
        <h2>Ask a Librarian</h2>
      <ul>
    <li><span class="white shadow" data-icon="&#xe00b;" aria-hidden="true"></span> Chat  <span class="thickChevron" data-icon="&#xf101;" aria-hidden="true"></span></a></li>
    <li><span class="white shadow" data-icon="" aria-hidden="true">@</span> Email <span class="thickChevron" data-icon="&#xf101;" aria-hidden="true"></span></a> </li>
    <li><span class="white shadow" data-icon="&#xe00a;" aria-hidden="true"></span> In person <span class="thickChevron" data-icon="&#xf101;" aria-hidden="true"></span></a> </li>
    <li><span class="white shadow" data-icon="&#xe000;" aria-hidden="true"></span> Phone <span class="thickChevron" data-icon="&#xf101;" aria-hidden="true"></span></a> </li>
    </ul>
     </div>
       <!-- <div class="frontSideBlock techAvail">
      <h3>Available Technology</h3>
        <ul>
    <li>xx Bikes</li>
    <li>xx External Hard Drives</li>
    <li>xx iPads</li>
    <li>xx Laptops</li>
    <li>xx Video Cameras</li>
    <li>xx Workstations</li>
    </ul>
        </div>-->
        <!-- <div class="frontSideBlock roomAvail">
      <h3>Available Study Rooms</h3>
      <p>xx Group Study Rooms</p>
        </div> -->   
    
    
    <?php print $content; ?>
  </div>  <!--end frontLeftSide-->
  </section><!-- region__sidebar -->


<?php elseif ($content): ?>
  <div class="<?php print $classes; ?>">
    <?php print $content; ?>
  </div><!-- /.region -->
<?php endif; ?>