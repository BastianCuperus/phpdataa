<?php
$RandomAccountNumber = uniqid();
$timestamp = time();
if (isset($_POST['lul'])) {
			if(!empty($_POST['albumname'])) {
				$albumname = trim($_POST['albumname']);
			}
			else {
				echo "albumnaam is niet ingevuld!";
			}

			if(!empty($_POST['artistname'])) {
					$artistname = trim($_POST['artistname']);
			}
			else {
				echo "artiestnaam is niet ingevuld!";
			}

			
			$image_tmp = $_FILES['image']['tmp_name'];
			$image_name = $_FILES['image']['name'];
			$image_type = $_FILES['image']['type'];

		    $allowed_image = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg', 'image/JPEG');

		    if (in_array($image_type, $allowed_image)) {
		    	$path = '/'.$RandomAccountNumber.$timestamp.$image_name;
		    } else {
		    	echo "file type not allowed";
		    }	


	if($_POST['albumname'] || $_POST['artistname'] != "") {

			$sqli = "SELECT albumname FROM album WHERE albumname = '".$albumname."' AND user_id = '".$user_id."'";
		    $result=mysqli_query($conn, $sqli);
			$row=mysqli_fetch_assoc($result);
		    if($row['albumname'] == $albumname) {
		    	echo "album naam in gebruikt!";
		    }


		    

			// Local path for storing the files, under the directory of this file
			// $local_path = dirname(__FILE__) . '/uploads/';
			// // Create the directory if it doesn't exist
			// if ( ! is_dir( $local_path ) ) {
			//     mkdir( $local_path );
			// }
			// // Make the directory writable
			// if ( ! is_writable( $local_path ) ) {
			//     chmod( $local_path, 0777 );
			// }

			// // Loop through the uploaded files
			// foreach ( $_FILES as $ul_file ) {
			//     // Check for upload errors
			//     if ( $ul_file['error'] )
			//         die( "Your file upload failed with error code " . $ul_file['error'] );
			//     // Set a new file name for the temporary file
			//     $new_file_name = $local_path . '/' . $path;
			//     // Move the temporary file away from the temporary directory
			//     if ( ! move_uploaded_file( $ul_file['tmp_name'], $new_file_name ) )
			//         die( "Failed moving the uploaded file" );
			//     // Store the local file paths to an array
			//     $local_file_paths[] = $new_file_name; 
			// }

			// // Now do your FTP connection
			// $ftp_server     = "ftp.timefor.cooking";
			// $ftp_username   = "timefor.cooking";
			// $ftp_password   = "3whhpAFqN6XJ";
			// $conn_id = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");

			// @ftp_login($conn_id, $ftp_username, $ftp_password);

			// $new_file_name = $local_path . '/' . $path;

			//  // Loop through the local filepaths array we created
			//     foreach ($local_file_paths as $local_file_path) {
			//         // The remote file path on the FTP server is your string + 
			//         // the base name of the local file
			//         $remote_file_path =  $local_file_path;
			//         // Put the file on the server
			//         ftp_put( $conn_id, $remote_file_path, $local_file_path, FTP_BINARY );

			//     }

			//     // Close the connection
			//     ftp_close($conn_id);

			$sqli = "INSERT INTO album (album_id, user_id, albumname, artistname, albumimg)
			VALUES ('', '$user_id', '$albumname', '$artistname', '$path')";

			if(mysqli_query($conn, $sqli)) {
				header('location:index.php?page=home');
			} else {
				echo "error" . "<br>" . mysqli_error($conn);
			}
		}
}
// annuleer formulier toevoegen nieuw album
//if (isset($_POST['annuleer'])) {
//    header("Location:index.php?page=home");
//}
?>