<?php 

require 'home.php';
require 'albumposter.php';

?>

<form class="addform" method="post" enctype="multipart/form-data">
	<div class="previewtop">
		<img id="blah" src="#" alt="your image" />
	</div>
	<a>Albumillustratie</a>
	<input type='file' id="imgInp" />
	<a>Album</a>
    <input type="text" name="albumname" placeholder="albumname" >
    <a>Artiest</a>
	<input type="text" name="artistname" placeholder="artistname" >
	<input class="addformbttn" type="submit" name="lul">
	<input class="addformbttn" type="submit" name="annuleer" value="Annuleer" >
</form>
