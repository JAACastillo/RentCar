(function($) {

		$('.minDate').datetimepicker('option', 'minDate', new Date());
    	
    	$('.minDate').change(function() {
       		$('.maxDate').datetimepicker('option', 'minDate', $(this).val());
    	});

})(jQuery);
