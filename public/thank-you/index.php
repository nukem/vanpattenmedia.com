<?php

if(isset($_POST['name'], $_POST['email'], $_POST['message'])) {
	email($_POST);
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

include '../../app/views/message.php';
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
