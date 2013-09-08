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
      <h3>Today's Hours</h3>
      <p>8:30am - 10:00pm</p>
    <p>
    <a href="http://www.library.tufts.edu/tisch/hours.htm">More Hours</a></p>
       </div>
      <div class="frontSideBlock sideAsk">
        <h3>Ask a Librarian</h3>
      <ul>
    <li>Chat ></li>
    <li>Email > </li>
    <li>In person > </li>
    <li>Phone > </li>
    </ul>
     </div>
        <div class="frontSideBlock techAvail">
      <h3>Available Technology</h3>
        <ul>
    <li>xx Bikes</li>
    <li>xx External Hard Drives</li>
    <li>xx iPads</li>
    <li>xx Laptops</li>
    <li>xx Video Cameras</li>
    <li>xx Workstations</li>
    </ul>
        </div>
         <div class="frontSideBlock roomAvail">
      <h3>Available Study Rooms</h3>
      <p>xx Group Study Rooms</p>
        </div>    
    </div>  
    
    <?php print $content; ?>
  </section><!-- region__sidebar -->


<?php elseif ($content): ?>
  <div class="<?php print $classes; ?>">
    <?php print $content; ?>
  </div><!-- /.region -->
<?php endif; ?>