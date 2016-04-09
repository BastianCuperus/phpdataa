<?php 

$user_id=$_SESSION['user_session'];
	$query="SELECT username, photo FROM users WHERE user_id = '$user_id' LIMIT 1";
	$result = mysqli_query($conn, $query);
	// Kijken of ik een geldig resultaat krijg.
	if($result == false) {
		die("Query failed: ".mysqli_error().PHP_EOL.$query);
	}
	while($row = mysqli_fetch_array($result))


require 'home.php';
require 'albumposter.php';

?>


<form class="addform" method="post" enctype="multipart/form-data">
	<div class="previewtop">
		<img id="blah" src="/image/'.$image.'">
	</div>
	<a>Wijzig profielfoto</a>
	<input type='file' id="imgInp" />
	<?php echo $username=$row['username']; ?>
	<input class="addformbttn" type="submit" name="lul">
	<input class="addformbttn" type="submit" name="annuleer" value="Annuleer" >
</form>
