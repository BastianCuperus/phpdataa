$(document).ready(function(){
		  $("#hide").click(function(){
			$("#show").show('fast');
			$("#slider").fadeOut('fast', function(){
				$("#hide").fadeOut('fast');
			});
		  });
		  $("#show").click(function(){
			// $("#show").fadeOut('fast', function(){
				$("#hide").fadeIn('fast');
				$("#slider").fadeIn('fast'); 
			// });
			$("#mobilenav").show('fast');
		  });
		});