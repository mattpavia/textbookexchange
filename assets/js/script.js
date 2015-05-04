$('document').ready(function() {
	$('.search_header_button').on('click', function(e) {
		e.preventDefault();
		$('.header_search').focus();
	});

	//
    //Flash Message
    //
    setTimeout(slide_up, 5000);

    function slide_up() {
        $(".flash_message").slideUp(1000);
    }
});