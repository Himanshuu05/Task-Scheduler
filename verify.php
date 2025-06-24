<?php
require_once 'functions.php';

// TODO: Implement verification logic.
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['verify-email']) && isset($_POST['verify-code'])) {
    $email = trim($_POST['verify-email']);
    $code = trim($_POST['verify-code']);

    if (verifySubscription($email, $code)) {
        $message = "Subscription verified successfully!";
    } else {
        $message = "Verification failed. Please check your code and try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Implement Header ! -->
	<title>Verify Subscription</title>
</head>
<body>
	<!-- Do not modify the ID of the heading -->
	<h2 id="verification-heading">Subscription Verification</h2>
	
	<!-- Implemention body -->
	<form method="POST">
		<input type="email" name="verify-email" placeholder="Your email" required>
		<input type="text" name="verify-code" placeholder="Verification code" required>
		<button type="submit">Verify</button>
	</form>

	<?php if ($message): ?>
		<p><?= htmlspecialchars($message) ?></p>
	<?php endif; ?>
</body>
</html>
