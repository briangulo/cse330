<!DOCTYPE html>
<html>
<head>
	<title>Files</title>
</head>
<body>
	<?php
	session_start();
	$user = $_SESSION['user'];
	$userdir = '/home/brian/file_sharing/'.$user;

	printf("<p>Welcome <strong>%s</strong>!</p>", htmlentities($user));

	$scan = scandir($userdir);
	$num = 1;
	foreach($scan as $file) {
		if (!is_dir($userdir."/".$file)) {
			printf("<p>%d: %s</p>", $num, $file);
			echo "<form action=\"download.php\" method=\"POST\">";
		  echo "<input type=\"submit\" name='file'.$num value=\"View\" />";
		  echo "</form>";
			echo "<form action=\"delete.php\" method=\"POST\">";
			echo "<input type=\"submit\" name='file'.$num value=\"Delete\" />";
			echo "</form>";
			$num++;
		}
	}

	echo '<form enctype="multipart/form-data" action="upload.php" method="POST">'
	echo '<p>'
	echo '<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />'
	echo '<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />'
	echo '</p>'
	echo '<p>'
	echo '<input type="submit" value="Upload File" />'
	echo '</p>'
	echo '</form>'

  echo "<form action=\"login.php\" method=\"POST\">";
  echo "<input type=\"submit\" value=\"Logout\" />";
  echo "</form>";
	?>
</body>
</html>
