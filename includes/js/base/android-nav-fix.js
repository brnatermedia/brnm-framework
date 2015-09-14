$("li.menu-item-parent").addClass('disableclick');
	$("li.menu-item-parent a").click(function(e){
		if( $(this).parent().hasClass('disableclick') ){
			e.preventDefault();
		}
		$(this).parent().removeClass('disableclick');
	});