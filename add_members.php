<?php
require 'include/connect.php';

$team_id = $_GET['team_id'] ?? null;

if (!$team_id) {
    echo "<script>alert('Invalid team ID!'); window.location.href='team_creation.php';</script>";
    exit;
}

// Fetch Team Name
$team_sql = "SELECT team_name FROM teams WHERE team_id = $team_id";
$team_result = $conn->query($team_sql);
$team = $team_result->fetch_assoc();

// Fetch Available Members (Exclude Leads)
$members_sql = "SELECT user_id, username FROM users WHERE role = 'Team Member' 
                AND user_id NOT IN (SELECT user_id FROM team_members WHERE team_id = $team_id)";
$members_result = $conn->query($members_sql);

// Insert Member into Team
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_member'])) {
    $user_id = $_POST['user_id'];
    $insert_sql = "INSERT INTO team_members (team_id, user_id) VALUES ('$team_id', '$user_id')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>alert('Member added successfully!'); window.location.href='add_members.php?team_id=$team_id';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Remove Member from Team
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_member'])) {
    $user_id = $_POST['user_id'];
    $delete_sql = "DELETE FROM team_members WHERE team_id = '$team_id' AND user_id = '$user_id'";

    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Member removed successfully!'); window.location.href='add_members.php?team_id=$team_id';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch Current Members
$current_members_sql = "SELECT users.user_id, users.username FROM team_members 
                        JOIN users ON team_members.user_id = users.user_id 
                        WHERE team_members.team_id = $team_id";
$current_members_result = $conn->query($current_members_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Remove Team Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Add Members to <?php echo $team['team_name']; ?></h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Select Member</label>
                <select class="form-select" name="user_id" required>
                    <?php while ($row = $members_result->fetch_assoc()) {
                        echo "<option value='{$row['user_id']}'>{$row['username']}</option>";
                    } ?>
                </select>
            </div>
            <button type="submit" name="add_member" class="btn btn-primary w-100">Add Member</button>
        </form>

        <h3 class="mt-5">Current Members</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $current_members_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                <button type="submit" name="remove_member" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="team_creation.php" class="btn btn-secondary">Back to Teams</a>
    </div>
</body>
</html>
