/************************
* This jQuery takes the links in the dropdowns
* of the megamenu and sorts them into columns.
* If there are less than 12 links, the dropdown
* will have 3 columns, and if equal or greater,
* there will be 4 columns.
*/

(function ($) {
  $(document).ready(function(){
    
    var menuItems = new Array();
    //creates an array of the menus that you want to creat columns for
    //the numbers correspond to the 'menu-# class of the megamenu
    menuItems=[3003, 3006, 3009, 3011, 3012, 3077];
    for (var k = 0; k < menuItems.length; k++)
    {
      var list = '.menu-'+ menuItems[k] +' > .sf-hidden'; 
      //gets all of the children (the links) of each menu
      var kids = $(list).children();
      var len = kids.length;
      var i = 0;
      var col = 1;
      //check to see if going to be a 3 column dropdown
      if( len < 12)
      {
         //check to see if there is an uneven number of elements for 3 cols
         if( len % 3 > 0)
         { 
           //wrap the links in a div named col_1
           kids.slice(i, i + len/3 + 1).wrapAll('<div class="col_1"/>');
           i = i + len/3 + 1;
           //check to see if second column is going to have more elements as well
           if( len %  3 == 2)
           {
	     //wraps in div called col_2
             kids.slice(i, i + len/3 ).wrapAll('<div class="col_2"/>');
             i = i + len/3 ;
             col = 3;
           }else{
             //now we know second and third rows will have equal amounts
             col = 2;
           }
         }  
         //loops through columns that have length that divides evenly
         for(var j=col; j<4; j++)
         {
          kids.slice(i, i + len/3).wrapAll('<div class="col_' + j + '"/>');
          i += len/3;
         }
       }	   
     //checks to see if going to be 4 column dropdown
     if( len > 11)
     { 
       //check to see if not divisible by 4 and for which col
       var curCol = 1;
      
       //for each column that will have an extra link, makes div
       for(var g=0; g<3; g++)
       {
         if( len % 4 == curCol)
         { 
           kids.slice(i, i + len/4 + 1).wrapAll('<div class="col_' + col + '"/>');
           i += len/4 + 1;
           col++; 
         }
         curCol++;
       }
      //for all of the columns that have a standard number of links, makes div
       for(var j = col; j<5; j++)
       {
         kids.slice(i, i + len/4).wrapAll('<div class="col_' + j + '"/>');
         i += len/4; 
       }
     } 
   }
  });
}(jQuery));

