<?php
session_start();
include 'include/connect.php';

header('Content-Type: application/json');

if (!isset($_POST['discussion_id']) || !isset($_POST['message'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    exit;
}

$discussion_id = intval($_POST['discussion_id']);
$message = trim($_POST['message']);
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

if (empty($message)) {
    echo json_encode(['status' => 'error', 'message' => 'Message cannot be empty']);
    exit;
}

try {
    $stmt = $conn->prepare("INSERT INTO discussion_messages (discussion_id, user_id, sender, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $discussion_id, $user_id, $username, $message);
    $success = $stmt->execute();
    
    if ($success) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save message']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}