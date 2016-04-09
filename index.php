<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP test</title>
	<link rel="stylesheet" href="css/style.css">

	<script type="text/javascript" src="js/functions.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<?php
$servername = "localhost";
$susername = "root";
$spassword = "";
$dbname = "phptest";

$conn = mysqli_connect($servername, $susername, $spassword, $dbname);
	if (!$conn) {
		die("connection failed:" . mysqli_connect_error());
	}

	// pagina waar formulier gecheckt wordt //
	require('login.php');
?>
<body>
	<?php

		$page = '';	
		if ( isset( $_GET['page'] ) )
		{
			$page = $_GET['page'];
		}
		switch ($page) {
			case 'login':
				include('login-form.php');
				break;

			case 'home':
				include('home.php');
				break;

			case 'imgposter':
				include('imgposter.php');
				break;

			case 'profile':
				include('profile.php');
				break;
			
			default:
				include('register.php');
				break;
		}

	?>


<div style="clear: both"></div>
<footer>

</footer>

<script>

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

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#imgInp").change(function(){
	    readURL(this);
	});



</script>

	
</body>
</html>