<?php

define("AKISMET_API_KEY", "2b0eecedacaa");
require_once('../../app/vendor/akismet/akismet.class.php');


if(isset($_POST['name'], $_POST['email'], $_POST['message'])) {

	$comment = array(
			'author' => $_POST['name'],
			'email' => $_POST['email'],
			'body' => $_POST['message'],
			'permalink' => 'http://'.$_SERVER['HTTP_HOST'],
	);

	$akismet = new Akismet('http://'.$_SERVER["HTTP_HOST"], AKISMET_API_KEY, $comment);

	if($akismet->errorsExist()) { // Returns true if any errors exist.
			if($akismet->isError('AKISMET_INVALID_KEY')) {
					// Do something. Log the error or email the user
					error_log('Akismet invalid key!', 0);
			} elseif($akismet->isError('AKISMET_RESPONSE_FAILED')) {
					// Do something.
					error_log('Akismet response failed', 0);
			} elseif($akismet->isError('AKISMET_SERVER_NOT_FOUND')) {
					// Do something.
					error_log('Akismet server not found!', 0);
			}
	} else {
			// No errors, check for spam.
			if ($akismet->isSpam()) { // Returns true if Akismet thinks the comment is spam.
					// Do something with the spam comment.
					echo 'SPAM!';
			} else {
					// Do something with the non-spam comment.
					email($_POST);
			}
	}
}

function email($array) {
	$to 		= 'info@vanpattenmedia.com';
	$name       = strip_tags( $array['name'] );
	$from 		= strip_tags( $array['email'] );
	$message 	= strip_tags( $array['message'] );

	$headers = 'From: '. $from . "\r\n" .
    'Reply-To: '. $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

	$subject = 'New submission from ' . $name;

	mail($to, $subject, $message, $headers);
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../app/views/head.php'; ?>
<body>
	<header class="header">
		<div class="logo">
<h1>Thank you</h1>
<p>Your message has been sent.</p>
<p><a href="/">Return to VanPattenMedia.com</a></p>
		</div>
	</header>
</body>
</html>
