// Masonry settings to organize sidebar widgets
jQuery(document).ready(function($){
   $('.sidebar-padder').masonry({
       columnWidth: 250,
       itemSelector: '.widget',
       isFitWidth: true,
       isAnimated: true
   }); 

   $('#content.main-content-inner .masonry').masonry({
   	   columnWidth: 460,
       itemSelector: 'article.post',
       isFitWidth: true,
       isAnimated: true
   });
});