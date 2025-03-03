<?php
session_start();
require_once 'include/connect.php';

// Check if user is logged in and is a team member
$user_id = $_SESSION['user_id'];
$team_id = $_SESSION['team_id'];

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
        .btn-join { background-color: #2196F3; color: white; border: none; }
        .btn-disabled { background-color: #ccc; color: #666; cursor: not-allowed; }
        .message { margin: 10px 0; padding: 10px; background-color: #f2f2f2; }
        .scheduled { color: #ff9800; }
        .started { color: #4CAF50; }
        .completed { color: #2196F3; }
        .cancelled { color: #f44336; }
    </style>
</head>
<body>
    <h1>Team Meetings</h1>
    
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Meeting Time</th>
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
                        <td class="<?php echo $meeting['status']; ?>"><?php echo ucfirst($meeting['status']); ?></td>
                        <td>
                            <?php if ($meeting['status'] === 'scheduled'): ?>
                                <!-- Disabled button for scheduled meetings -->
                                <span class="btn btn-disabled">Join Meeting</span>
                            <?php elseif ($meeting['status'] === 'started'): ?>
                                <!-- Active button for started meetings -->
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