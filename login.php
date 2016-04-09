<?php
	// controleren van ingevuld veld username. De escape string is voor de veiligheid.
		if (isset($_POST['inloggen'])) {
			if(!empty($_POST['username'])) {
				$username = trim($_POST['username']);
			}
			else {
				echo "username is niet ingevuld!";
			}


	// controleren van ingevuld veld password
				if(!empty($_POST['password'])) {
					$password = trim($_POST['password']);
			}
			else {
				echo "password is niet ingevuld!";
			}

			$sqli = "SELECT * FROM users WHERE username = '$username' LIMIT 1";

			$result=mysqli_query($conn, $sqli);
			$row=mysqli_fetch_assoc($result);

			if (md5($password) == $row['password']) {
				$_SESSION['user_session'] = $row['user_id'];
				header('location:index.php?page=home');
			} else {
				echo "Verkeerde combinatie";
			}

		}

	// controleren van ingevuld veld username. De escape string is voor de veiligheid.
		if (isset($_POST['register'])) {
			if(!empty($_POST['username'])) {
				$username = trim($_POST['username']);
			}
			else {
				echo "username is niet ingevuld!";
			}


	// controleren van ingevuld veld password
				if(!empty($_POST['password'])) {
					$password = trim($_POST['password']);
					$password = md5($_POST['password']);
			}
			else {
				echo "password is niet ingevuld!";
			}

			$sqli = "INSERT INTO users (user_id, username, password)
			VALUES ('','$username', '$password')";

			if(mysqli_query($conn, $sqli)) {
				header('location:index.php?page=login');
			} else {
				echo "error" . "<br>" . mysqli_error($conn);
			}
		}

?>