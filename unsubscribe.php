<?php
require_once 'functions.php';

// TODO: Implement the unsubscription logic.
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['unsubscribe-email'])) {
    $email = trim($_POST['unsubscribe-email']);
    if (unsubscribeEmail($email)) {
        $message = "Successfully unsubscribed.";
    } else {
        $message = "Unsubscription failed. Email not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Implement Header ! -->
	<title>Unsubscribe</title>
</head>
<body>
	<!-- Do not modify the ID of the heading -->
	<h2 id="unsubscription-heading">Unsubscribe from Task Updates</h2>

	<!-- Implemention body -->
	<form method="POST">
		<input type="email" name="unsubscribe-email" placeholder="Your email" required>
		<button type="submit">Unsubscribe</button>
	</form>

	<?php if ($message): ?>
		<p><?= htmlspecialchars($message) ?></p>
	<?php endif; ?>
</body>
</html>

