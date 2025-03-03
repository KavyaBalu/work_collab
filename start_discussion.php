<?php
session_start();
include 'include/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $team_id = $_SESSION['team_id'];
    $created_by = $_SESSION['user_id'];
    $title = trim($_POST['title']);

    if (!empty($title)) {
        $stmt = $conn->prepare("INSERT INTO discussions (team_id, created_by, title) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $team_id, $created_by, $title);
        if ($stmt->execute()) {
            header("Location: discussion_page.php"); // Redirect back to discussion page
            exit();
        } else {
            echo "Error creating discussion.";
        }
    } else {
        echo "Title cannot be empty.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Discussion</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; text-align: center; }
        .form-container { width: 50%; margin: auto; }
        input, button { padding: 10px; width: 100%; margin-top: 10px; }
        button { background: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Start a New Discussion</h2>
    <form method="POST">
        <input type="text" name="title" placeholder="Enter Discussion Title" required>
        <button type="submit">Create Discussion</button>
    </form>
</div>

</body>
</html>
