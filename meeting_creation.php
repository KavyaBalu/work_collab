<?php
session_start();
require_once 'include/connect.php';

// Check if user is logged in and is a team lead
$team_id = $_SESSION['team_id'];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $meeting_time = $_POST['meeting_time'];
    $meeting_link = trim($_POST['meeting_link']); // Get meeting link from the form
    $manager_required = isset($_POST['manager_required']) ? 1 : 0;
    
    // Validate meeting link
    if (empty($meeting_link)) {
        $message = "Error: Meeting link is required";
    } else {
        $sql = "INSERT INTO team_meetings (team_id, created_by, title, description, meeting_time, manager_required, status, meeting_link) 
                VALUES (?, ?, ?, ?, ?, ?, 'scheduled', ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iisssis', $team_id, $_SESSION['user_id'], $title, $description, $meeting_time, $manager_required, $meeting_link);
        
        if ($stmt->execute()) {
            $message = "Meeting scheduled successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Schedule Team Meeting</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], textarea, input[type="datetime-local"] { width: 100%; padding: 8px; }
        button { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        .message { margin: 10px 0; padding: 10px; background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Schedule Team Meeting</h1>
    
    <?php if ($message): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
    
    <form method="post">
        <div class="form-group">
            <label for="title">Meeting Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4"></textarea>
        </div>
        
        <div class="form-group">
            <label for="meeting_time">Meeting Time:</label>
            <input type="datetime-local" id="meeting_time" name="meeting_time" required>
        </div>
        
        <div class="form-group">
            <label for="meeting_link">Google Meet Link:</label>
            <input type="text" id="meeting_link" name="meeting_link" required placeholder="https://meet.google.com/xxx-xxxx-xxx">
        </div>
        
        <div class="form-group">
            <label>
                <input type="checkbox" name="manager_required"> Manager Required
            </label>
        </div>
        
        <button type="submit">Schedule Meeting</button>
    </form>
</body>
</html>