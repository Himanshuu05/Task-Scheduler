<?php
require_once 'functions.php';

// Handle Add Task
if (isset($_POST['task-name'])) {
	addTask(trim($_POST['task-name']));
	header("Location: index.php");
	exit();
}

// Handle Mark Complete/Incomplete
if (isset($_POST['toggle-task']) && isset($_POST['task-id'])) {
	markTaskAsCompleted($_POST['task-id'], $_POST['toggle-task'] === 'on');
	header("Location: index.php");
	exit();
}

// Handle Delete
if (isset($_POST['delete-task']) && isset($_POST['task-id'])) {
	deleteTask($_POST['task-id']);
	header("Location: index.php");
	exit();
}

// Handle Subscribe
if (isset($_POST['subscribe-email'])) {
	subscribeEmail(trim($_POST['subscribe-email']));
}

// Handle Verify
if (isset($_POST['verify-email']) && isset($_POST['verify-code'])) {
	verifySubscription(trim($_POST['verify-email']), trim($_POST['verify-code']));
}

// Handle Unsubscribe
if (isset($_POST['unsubscribe-email'])) {
	unsubscribeEmail(trim($_POST['unsubscribe-email']));
}

$tasks = getAllTasks();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task Scheduler</title>
</head>
<body>
	<h2>Add Task</h2>
	<form method="POST">
		<input type="text" name="task-name" id="task-name" placeholder="Enter new task" required>
		<button type="submit" id="add-task">Add Task</button>
	</form>

	<h2>Task List</h2>
	<ul id="tasks-list">
		<?php foreach ($tasks as $task): ?>
			<li class="task-item">
				<form method="POST" style="display:inline;">
					<input type="hidden" name="task-id" value="<?= $task['id'] ?>">
					<input type="checkbox" class="task-status" name="toggle-task" <?= $task['completed'] == '1' ? 'checked' : '' ?> onChange="this.form.submit()">
				</form>
				<?= htmlspecialchars($task['name']) ?>
				<form method="POST" style="display:inline;">
					<input type="hidden" name="task-id" value="<?= $task['id'] ?>">
					<button type="submit" name="delete-task" class="delete-task">Delete</button>
				</form>
			</li>
		<?php endforeach; ?>
	</ul>

	<h2>Subscribe</h2>
	<form method="POST">
		<input type="email" name="subscribe-email" placeholder="Enter your email" required>
		<button type="submit" id="submit-email">Subscribe</button>
	</form>

	<h2>Verify Subscription</h2>
	<form method="POST">
		<input type="email" name="verify-email" placeholder="Your email" required>
		<input type="text" name="verify-code" placeholder="Verification code" required>
		<button type="submit">Verify</button>
	</form>

	<h2>Unsubscribe</h2>
	<form method="POST">
		<input type="email" name="unsubscribe-email" placeholder="Your email" required>
		<button type="submit">Unsubscribe</button>
	</form>
</body>
</html>
