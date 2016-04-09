<?php
if(!isset($_SESSION['user_session'])){
	session_destroy();
	unset($_SESSION['user_session']);
	header('location:index.php?page=login');
}

$user_id = $_SESSION['user_session'];
	$sqli = "SELECT username,photo FROM users WHERE user_id = '$user_id' LIMIT 1";
		$result=mysqli_query($conn, $sqli);
		$row=mysqli_fetch_assoc($result);

		$image = $row['photo'];
			if (empty($image)) $image = "assets/default.png";
			else {  $image = $row['photo']; }

?>

<div class="container">
	<header>
		<div class="profilenmblock">
			
			<?php echo "<img src='".$image."'>"; ?>
			<?php echo "<a href='index.php?page=profile'>"."Hi, " . $row['username']."</a>"; ?>
		</div>

		<div class="button albumbttn">
			<p> <a href="index.php?page=imgposter">ALBUM TOEVOEGEN</a></p>
		</div>
	</header>

	<div class="sidebar">
		<ul>
			<?php
				if ($page === "over")
				{
					echo 	" 
							<li><a href='index.php'>HOME</a></li>
		  					<li class='active'><a href='index.php?page=over'>OVER</a></li>
		  					<li><a href='index.php?page=contact'>CONTACT</a></li>
		  					";
				}
				elseif ($page === "contact")
				{
					echo 	" 
							<li><a href='index.php'>HOME</a></li>
		  					<li><a href='index.php?page=over'>OVER</a></li>
		  					<li class='active'><a href='index.php?page=contact'>CONTACT</a></li>
		  					";
				}
				else
				{
					echo 	" 
							<li class='active'><a href='index.php'>HOME</a></li>
		  					<li><a href='index.php?page=over'>OVER</a></li>
		  					<li><a href='index.php?page=contact'>CONTACT</a></li>
		  					";
				}

			?>
		</ul>
		<a href="index.php">LOG OUT</a>
	</div>

	<div class="contentblock">
		<?php
			$imggetter = "SELECT * FROM album WHERE user_id = '$user_id'";
				$results=mysqli_query($conn, $imggetter);
				
				while ($album=mysqli_fetch_assoc($results)) {
					?>
				<div class="album">
					<div class="album-img">
						<?php echo "<img src='uploads".$album['albumimg']."'>"; ?>
					</div>
					<div class="album-name">
						<?php echo $album['albumname']; ?>
					</div>
					<div class="artist-name">
						<?php echo $album['artistname']; ?>
					</div>
				</div>
				<?php
				}
		?> 
	</div>
</div>