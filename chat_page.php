<?php
session_start();
include 'include/connect.php';

if (!isset($_GET['discussion_id'])) {
    die("Discussion ID is missing.");
}

$discussion_id = intval($_GET['discussion_id']);
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Handle message submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $message = trim($_POST['message']);
    if (!empty($message)) {
        // Insert new message using your existing messages table
        $stmt = $conn->prepare("INSERT INTO messages (discussion_id, sender_id, message) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $discussion_id, $user_id, $message);
        $stmt->execute();
    }
    // Redirect to prevent form resubmission
    header("Location: chat_page.php?discussion_id=" . $discussion_id);
    exit;
}

// Fetch discussion title
$stmt = $conn->prepare("SELECT title FROM discussions WHERE discussion_id = ?");
$stmt->bind_param("i", $discussion_id);
$stmt->execute();
$result = $stmt->get_result();
$discussion = $result->fetch_assoc();

if (!$discussion) {
    die("Discussion not found.");
}

$title = $discussion['title'];

// Fetch all messages for this discussion
// Join with users table to get the sender's username
$stmt = $conn->prepare("SELECT m.message_id, m.message, m.sent_at, u.username 
                        FROM messages m 
                        JOIN users u ON m.sender_id = u.user_id
                        WHERE m.discussion_id = ? 
                        ORDER BY m.sent_at ASC");
$stmt->bind_param("i", $discussion_id);
$stmt->execute();
$result = $stmt->get_result();
$messages = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Discussion</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; text-align: center; }
        .chat-container { width: 50%; margin: auto; border: 1px solid #ddd; padding: 10px; background: #f9f9f9; }
        .message-box { height: 300px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px; background: white; text-align: left; }
        .input-box { display: flex; margin-top: 10px; }
        input { flex: 1; padding: 10px; }
        button { padding: 10px; background: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background: #218838; }
        .back-btn { padding: 10px; background: #6c757d; color: white; border: none; cursor: pointer; margin-bottom: 10px; }
        .message { margin-bottom: 8px; }
        .refresh-btn { padding: 5px 10px; background: #007bff; color: white; border: none; cursor: pointer; margin-top: 5px; }
    </style>
</head>
<body>

<div class="chat-container">
    <button class="back-btn" onclick="window.location.href='discussion_page.php'">Back to Discussions</button>
    <h2><?= htmlspecialchars($title) ?></h2>
    
    <div class="message-box" id="messages">
        <?php if(count($messages) > 0): ?>
            <?php foreach($messages as $msg): ?>
                <div class="message">
                    <strong><?= htmlspecialchars($msg['username']) ?>:</strong> 
                    <?= htmlspecialchars($msg['message']) ?> 
                    <small>(<?= $msg['sent_at'] ?>)</small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No messages yet. Start the conversation!</p>
        <?php endif; ?>
    </div>
    
    <button class="refresh-btn" onclick="location.reload()">Refresh Messages</button>
    
    <form method="post" action="" class="input-box">
        <input type="text" name="message" placeholder="Type a message..." required>
        <button type="submit">Send</button>
    </form>
</div>

<script>
    // Auto-scroll to bottom of messages on page load
    window.onload = function() {
        var messageBox = document.getElementById('messages');
        messageBox.scrollTop = messageBox.scrollHeight;
    };
</script>

</body>
</html>