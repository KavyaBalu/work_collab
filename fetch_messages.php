<?php
session_start();
include 'include/connect.php';

header('Content-Type: application/json');

if (!isset($_GET['discussion_id'])) {
    echo json_encode([]);
    exit;
}

$discussion_id = intval($_GET['discussion_id']);

$stmt = $conn->prepare("SELECT m.message_id, m.user_id, m.sender, m.message, m.sent_at 
                        FROM discussion_messages m 
                        WHERE m.discussion_id = ? 
                        ORDER BY m.sent_at ASC");
$stmt->bind_param("i", $discussion_id);
$stmt->execute();
$result = $stmt->get_result();
$messages = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($messages);