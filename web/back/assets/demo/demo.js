$(function() {

	$.wijets.make(); 	// Make yo Widjit - see docs for more details.
	prettyPrint(); 		//Apply Code Prettifier
	$(".bootstrap-switch").bootstrapSwitch(); // Bootstrap Switches


	// Bootstrap JS
    $('.popovers').popover({container: 'body', trigger: 'hover', placement: 'top'}); //bootstrap's popover
    $('.tooltips').tooltip(); //bootstrap's tooltip

    //Tabdrop
    jQuery.expr[':'].noparents = function(a,i,m){
            return jQuery(a).parents(m[3]).length < 1;
    }; // Only apply .tabdrop() whose parents are not (.tab-right or tab-left)
    $('.nav-tabs').filter(':noparents(.tab-right, .tab-left, .tabdrop-disabled)').tabdrop();

	// Custom Checkboxes
	$('.icheck input').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass: 'iradio_minimal-blue'
	});

	//Demo Background Pattern
	$(".demo-blocks").click(function(){
		$('.layout-boxed').css('background',$(this).css('background'));
		return false;
	});


    // Sparklines
     
        var sparker = function() {
            $('.spark-totalearnings').sparkline([15,14,17,11,8,12,15,24,17,16,17,14,10,8,11,17,15,13,17,18,16,10,9,1,4,9,13,11,12,15], { fillColor: '#f1f8e9', lineColor: '#dcedc8', lineWidth: 1.5, height: '40px', width: '100%', spotRadius: 3, spotColor: 'transparent', highlightLineColor: '#dcedc8', maxSpotColor: 'transparent', minSpotColor: 'transparent', highlightSpotColor: '#c5e1a5'});

            $('.spark-totalvisitors').sparkline([15,14,17,11,8,12,15,24,17,16,17,14,10,8,11,17,15,13,17,18,16,10,9,1,4,9,13,11,12,15], { fillColor: '#e0f7fa', lineColor: '#b2ebf2', lineWidth: 1.5, height: '40px', width: '100%', spotRadius: 3, spotColor: 'transparent', highlightLineColor: '#b2ebf2', maxSpotColor: 'transparent', minSpotColor: 'transparent', highlightSpotColor: '#80deea'});
            
        }
        var sparkResize;
     
        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparker, 500);
        });
        sparker();

	
});