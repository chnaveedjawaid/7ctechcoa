<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script>
			jQuery(document).ready(function() {
				//Main.init();
				//FormElements.init();
			
			
					
	var prevGroup, $group = $();
	$('#select_test option').remove().each(function() {
    var $option = $(this),
        values = $option .text().split('-'),
		
        group = values[0];
    alert($option.text());
    if (group != prevGroup) {
        $group = $('<optgroup />', { label: group }).appendTo('#select_test');
    }
    
    $group.append($('<option />', {
        text: values[1],
        value: values[1]
    }));
    
    prevGroup = group;
});
		
			
			});
			
			
			
			
	
		</script>
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
