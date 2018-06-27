jQuery(document).ready(function($) { 
    $('div#comments').addClass('twosides');
   /* $('.comment').addClass('twosides-left'); */
});//end noconflict
jQuery(document).ready(function($) { 
    $( 'li.twosides_positive:last-child' ).addClass('lastpositive');
    $( 'li.twosides_negative:last-of-type' ).addClass('lastnegative');
});
/*
jQuery(document).ready(function($) { 
    $('ol.comment-list li').wrap('<span></span>');
});

jQuery(document).ready(function($) { 
        $('ol.comment-list').wrapInner('<ul class="comment-list wraps"></ul>');
        
});
*/
