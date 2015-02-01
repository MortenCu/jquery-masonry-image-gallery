var galleries = document.querySelectorAll('.gallery');
for ( var i=0, len = galleries.length; i < len; i++ ) {
  var gallery = galleries[i];
  initMasonry( gallery );
}
function initMasonry( container ) {
  var imgLoad = imagesLoaded( container, function() {
    new Masonry( container, {
      itemSelector: '.gallery-item',
      columnWidth: '.gallery-item',
      isFitWidth: true
    });
    container.className += " jmig-img-loaded";
  });
  
  
}

/*
jQuery(document).ready(function($){

 $('.wp-caption-text').hide();   

 $('.gallery-item').hover(function(){
  $(this).children('.wp-caption-text').toggle();
 });

});
*/


jQuery(document).ready(function($){
    $('.gallery-item').mouseenter(function(e) {
        //$(this).children('div').children('img').animate({ height: '299', left: '0', top: '0', width: '450'}, 100);
		
		$(this).has("img").fadeTo("slow",0.8);
		$(this).children("figcaption").fadeIn("slow");
        //$(this).children('a').children('span').fadeIn(200);
		//alert("test");
    }).mouseleave(function(e) {
        $(this).has("img").fadeTo("slow",1);
		$(this).children("figcaption").fadeOut("slow");
        //$(this).children('a').children('span').fadeOut(200);
    });
});

