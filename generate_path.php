<!DOCTYPE html>
<html>
<head><title>Blank</title></head>
<body>
  <?php
  session_start();
  function generate_path(){
    $user = $_SESSION['user'];
    $file = $_SESSION['file'];

    if( !preg_match('/^[\w_\.\-]+$/', $file) ){
    	echo "Invalid filename";
      echo '<form action="interface.php" method="POST">';
      echo '<p><input type="submit" value="Take me back" /></p>';
      echo '</form>';
    	exit;
    }
    
    $_SESSION['full_path'] = sprintf("/srv/uploads/%s/%s", $user, $file);
  }
  ?>
</body>
</html>
