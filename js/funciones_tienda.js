$(function() {
    $('#slideshow_producto').after('<ul id="nav_producto">').cycle({
    fx:      'scrollRight', 
    next:   '#right_producto', 
    timeout:  0, 
    easing:  'easeInOutBack',
        pager:  '#nav_producto',
        pagerAnchorBuilder: function(idx, slide) {
            return '<li><a href="#"><img src="' + slide.src + '" width="61" height="44" /></a></li>';
        }
    });
})