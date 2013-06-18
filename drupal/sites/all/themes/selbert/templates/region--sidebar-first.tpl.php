<?php
/**
 * @file
 * Zen theme's implementation to display a sidebar region.
 *
 * Available variables:
 * - $content: The content for this region, typically blocks.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - region: The current template type, i.e., "theming hook".
 *   - region-[name]: The name of the region with underscores replaced with
 *     dashes. For example, the page_top region would have a region-page-top class.
 * - $region: The name of the region variable as defined in the theme's .info file.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 *
 * @see template_preprocess()
 * @see template_preprocess_region()
 * @see zen_preprocess_region()
 * @see template_process()
 */
?>

  <section class="<?php print $classes; ?>">
  	<?php if ($is_front): ?>
  	<div id = "frontLeftSide">
      <div>
  		<h3>Today's Hours</h3>
  		<p>8:30am - 10:00pm</p>
		<p>
		<a href="http://www.library.tufts.edu/tisch/hours.htm">More Hours</a></p>
       </div>
      <div>
        <h3>Ask a Librarian</h3>
    	<ul>
		<li>Chat ></li>
		<li>Email > </li>
		<li>In person > </li>
		<li>Phone > </li>
		</ul>
	   </div>
        <div>
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
         <div>
    	<h3>Available Study Rooms</h3>
    	<p>xx Group Study Rooms</p>
        </div>    
    </div>	
  	
    <?php print $content; ?>
  </section><!-- region__sidebar -->
<?php endif; ?>
