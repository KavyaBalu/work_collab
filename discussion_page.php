<?php
session_start();
include 'include/connect.php'; // Include your DB connection file

// Fetch discussions for the user's team
$team_id = $_SESSION['team_id'];
$stmt = $conn->prepare("SELECT discussion_id, title, created_at FROM discussions WHERE team_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $team_id);
$stmt->execute();
$result = $stmt->get_result();
$discussions = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Discussions</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .discussion-container { width: 50%; margin: auto; }
        .discussion-item { padding: 10px; margin: 10px 0; border: 1px solid #ddd; cursor: pointer; background: #f9f9f9; }
        .start-btn { padding: 10px; background: #28a745; color: white; border: none; cursor: pointer; }
        .start-btn:hover { background: #218838; }
    </style>
</head>
<body>

<div class="discussion-container">
    <h2>Team Discussions</h2>
    <button class="start-btn" onclick="window.location.href='start_discussion.php'">Start New Discussion</button>

    <h3>Previous Discussions:</h3>
    <?php if (!empty($discussions)): ?>
        <?php foreach ($discussions as $discussion): ?>
            <div class="discussion-item" onclick="window.location.href='chat_page.php?discussion_id=<?= $discussion['discussion_id'] ?>'">
                <strong><?= htmlspecialchars($discussion['title']) ?></strong><br>
                <small>Created at: <?= $discussion['created_at'] ?></small>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No discussions yet.</p>
    <?php endif; ?>
</div>

</body>
</html>
