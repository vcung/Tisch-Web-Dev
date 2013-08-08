
<?php 

$html = ('http://www.library.tufts.edu/ginn/techhelp-borrowing.shtml #mobileTechnology'); // see below for source
  
// loads the page above
phpQuery::newDocumentFileHTML($html);

// Once the page is loaded, you can then make queries on whatever DOM is loaded.  
// This example grabs the title of the currently loaded page.
	
	$available = pq('#mobileTechnology #q1')->text();
	$technology = pq('#mobileTechnology ul li');
	$technologyCount = count($technology);
	
	print '<ul>';
	
	for ($i=0; $i<=$technologyCount - 1; $i++) {
		
		$items = pq('#mobileTechnology ul li:eq(' . $i . ')')->text();
		$url = pq('#mobileTechnology ul li:eq(' . $i . ') a')->attr('href');

		print ('<li>');
		print ('<div style="font-weight: normal; padding-top: 3px; padding-bottom: 5px; font-size: 100%;"><a href="technology-item.php?url=' . $url . '">' . $items . '</a></div>');
		print ('</li>');
		
	}
		
	print ('</ul>');

?>	


			


