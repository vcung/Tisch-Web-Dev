<?php	
include_once('phpQuery-onefile.php');

	$html = ('http://library.tufts.edu/record=b2307230~S2 #bibItems'); // see below for source
	$count = "";
	$offset = 0;

	$ipad = get_num_available($html, $offset, $count);
	$harddrive = get_num_available('http://library.tufts.edu/record=b2321148~S1', $offset, $count);
	$laptop = get_num_available('http://library.tufts.edu/record=b1684189~S1', 15, $count); //first 5 is not from tisch
	$bike = get_num_available('http://library.tufts.edu/search~S1?/.b2133185/.b2133185/1,1,1,B/holdings~2133185&FF=&1,0,', $offset, 90);
	$camcorder = get_num_available('http://library.tufts.edu/record=b2032147~S1', $offset, $count);

echo $ipad . $harddrive . $laptop . $bike . $camcorder;


function get_num_available($html, $offset, $count){

// loads the page above
phpQuery::newDocumentFileHTML($html);

// Once the page is loaded, you can then make queries on whatever DOM is loaded.  
// This example grabs the title of the currently loaded page.
	
	$technology = pq('.bibItemsEntry td');
	
	if (empty($count)) {
		$technologyCount = count($technology);
	} else {
		$technologyCount = $count;
	}
	
	$available=0;
	
	if ($technologyCount == 0) {}
	else{
		for ($i=$offset; $i<=$technologyCount - 1; $i++) {
			$url = pq('.bibItemsEntry td:eq(' . $i . ') a')->attr('href');
			$itemsLoc = pq('.bibItemsEntry td:eq(' . $i . ')')->text();
			$itemsNo = pq('.bibItemsEntry td:eq(' . ($i+=1) . ')')->text();
			$itemsStat = pq('.bibItemsEntry td:eq(' . ($i+=1) . ')')->text();
			
			//to remove prefixing "nbsp;" 
			preg_match("/nbsp\;(.*) /s",htmlspecialchars(htmlentities($itemsStat)), $status);
			
			if (trim($itemsStat) == 'AVAILABLE' || trim($status[1]) == 'AVAILABLE') {
				$available += 1;
			}
		}
	}
	return $available;
}



?>

}