<?php
$from = $_POST['email'] . $_POST['m-email'];//'noreply@rowdyhacks.org';

$text = $_POST['text'];
$to = 'team@rowdyhacks.org';//'acm.utsa@gmail.com';
//$subject = $_POST['subject'] . $_POST['m-subject'];
$sender = $_POST['name'] . $_POST['m-email'];

if(strlen($text) <= 1 || strlen($sender) <= 1 || strlen($from) <= 1){
	var_dump($_POST);
	die('Please complete all fields of the contact form.');
}

$body = 'Sent by ' . htmlentities($sender) . '<br /><br />Email: ' . htmlentities($_POST['email']) . '<br /><br />' . htmlentities($text);

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: " . $from . "\r\n"."X-Mailer: php";

$stat = '';
if(mail($to, 'Message from RowdyHacks Website', $body, $headers)){
	$stat = 'Your message has successfully been sent';
}
else{
	$stat = 'Error: message failed to send';
}

?>
<!DOCTYPE html>
<html>
	<head>
		<?php
			require('common/head-includes.php');
		?>
		<title>
			RowdyHacks
		</title>
	</head>
	<body>
		<?php
			require('common/menu.php');
		?>
		<div id="content" class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="row section-container">
						<div class="col-sm-12">
							<h1>
								Contact
							</h1>
							<p>
								<?php
									echo(htmlentities($stat));
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			require('common/footer.php');
		?>
	</body>
</html>
