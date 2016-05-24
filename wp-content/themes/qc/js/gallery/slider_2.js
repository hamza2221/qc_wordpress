$(document).ready(function(){

	$('#slider2').cycle({
		fx: 'scrollHorz', 
		speed:  'slow', 
   		timeout: 0,
   		next:   '#next', 
    	prev:   '#prev',
    	pager:  '#thumb',
    	 
		pagerAnchorBuilder: function(idx, slide) { 
        	return '<li><a href="#"><img src="' + slide.src + '" width="60" height="60" /></a></li>'; 
    	}  
	});
});	
