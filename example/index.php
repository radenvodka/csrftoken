<?php
/**
 * @Author: Eka Syahwan
 * @Date:   2017-05-27 06:59:22
 * @Last Modified by:   Eka Syahwan
 * @Last Modified time: 2017-05-27 07:08:50
 */
require_once("class.csrftoken.php");
$CSRFToken = new CSRFToken;
session_start();
if(isset($_POST['username']) && isset($_POST['token']) && isset($_POST['password']) && isset($_POST['Submit'])){
	
	if($CSRFToken->validateToken($_POST['token'])){ // for validate token
		echo "<b>Session Validate Success</b>";
	}else{
		echo "<b>Session Validate Failed</b>";
	}
	
	$CSRFToken->generate_token(); // Regenerate token
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>example csrf token</title>
</head>
<body>
<form method="post">
	<input type="username" name="username">
	<input type="password" name="password">
	<?php echo $CSRFToken->show_tokenHTML(); // show token with html & name is token ?>
	<?php //echo $CSRFToken->generate_token(); // show token with text only ?>
	<input type="submit" name="Submit">
</form>
</body>
</html>
