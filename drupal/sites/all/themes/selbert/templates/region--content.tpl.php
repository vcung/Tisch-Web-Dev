<?php
/**
 * @file
 * Zen theme's implementation to display a region.
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
<?php if ($content): ?>
  <div class="<?php print $classes; ?>">
    <?php print $content; ?>
    <?php if ($is_front): ?>
    <div class="lowerMainContent">
    <div id="frontChat">
    <!-- Springshare Chat code //-->
<!-- Springshare Chat code //-->
<div id="libchat_inline_widget"></div>
<script type="text/javascript">
 var libchat_inline = {
   iid: "153",
   key: "ec6c23a0a18c5c2",
   domain: "answers.library.tufts.edu",
   width: "100%",
   height: "195%",
   star_ratings: false,
   la_hide: true,
   la_hide_msg: "Sorry, chat is offline. <a href=\"http://answers.library.tufts.edu\">Search the Knowledge Base or Submit your Question</a>",
   depart_id: "0"
 };
</script>
<script type="text/javascript" src="//libanswers.com/js/chat_load_client_in.js"></script>
<!-- End Springshare Chat code //-->
    </div><!--end front chat-->
    </div><!--end first box lowerMainContent-->
    <div class="lowerMainContent lastBlock">

    	<h4>Resources</h4>
    	<ul>
		<li>Databases A-Z</li>
		<li>Journals & Newspapers A-Z</li>
		<li>E-books</li>
        </ul>
		<h4>Services</h4>
		<ul>
	    <li>Course Reserves</li>
		<li>Research Guides by Subject</li>
		<li>Interlibrary Loan (IILiad)</li>
		
	</ul>
	</div> <!--end 2nd/last block for lowerMainContent-->	
<?php endif; ?> <!--end if Front-->
  		</div><!-- /.region -->

<?php endif; ?>