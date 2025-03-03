<?php
session_start();
require_once 'include/connect.php';

// Check if user is logged in and is a team lead
$team_id = $_SESSION['team_id'];
$message = '';

// Handle starting a meeting
if (isset($_POST['start_meeting'])) {
    $meeting_id = $_POST['meeting_id'];
    
    $sql = "UPDATE team_meetings SET status = 'started' WHERE meeting_id = ? AND team_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $meeting_id, $team_id);
    
    if ($stmt->execute()) {
        $message = "Meeting started successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}

// Get all meetings for this team
$sql = "SELECT * FROM team_meetings WHERE team_id = ? ORDER BY meeting_time DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $team_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team Meetings</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .btn { padding: 6px 12px; text-decoration: none; display: inline-block; border-radius: 4px; cursor: pointer; }
        .btn-start { background-color: #4CAF50; color: white; border: none; }
        .btn-join { background-color: #2196F3; color: white; border: none; }
        .btn-disabled { background-color: #ccc; color: #666; cursor: not-allowed; }
        .message { margin: 10px 0; padding: 10px; background-color: #f2f2f2; }
        .scheduled { color: #ff9800; }
        .started { color: #4CAF50; }
        .completed { color: #2196F3; }
        .cancelled { color: #f44336; }
        .create-btn { margin-bottom: 20px; padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; text-decoration: none; display: inline-block; }
    </style>
</head>
<body>
    <h1>Team Meetings</h1>
    
    <?php if ($message): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
    
    <a href="meeting_creation.php" class="create-btn">Schedule New Meeting</a>
    
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Meeting Time</th>
                    <th>Manager Required</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($meeting = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($meeting['title']); ?></td>
                        <td><?php echo htmlspecialchars($meeting['description']); ?></td>
                        <td><?php echo date('M d, Y H:i', strtotime($meeting['meeting_time'])); ?></td>
                        <td><?php echo $meeting['manager_required'] ? 'Yes' : 'No'; ?></td>
                        <td class="<?php echo $meeting['status']; ?>"><?php echo ucfirst($meeting['status']); ?></td>
                        <td>
                            <?php if ($meeting['status'] === 'scheduled'): ?>
                                <form method="post" style="display: inline;">
                                    <input type="hidden" name="meeting_id" value="<?php echo $meeting['meeting_id']; ?>">
                                    <button type="submit" name="start_meeting" class="btn btn-start">Start Meeting</button>
                                </form>
                            <?php elseif ($meeting['status'] === 'started'): ?>
                                <!-- Modified to open the meeting link directly in a new tab -->
                                <a href="<?php echo htmlspecialchars($meeting['meeting_link']); ?>" target="_blank" class="btn btn-join">Join Meeting</a>
                            <?php else: ?>
                                <span class="btn btn-disabled">No Action</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No meetings scheduled yet.</p>
    <?php endif; ?>
</body>
</html>