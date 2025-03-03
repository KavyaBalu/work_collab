<?php
require 'include/connect.php';

// Insert Team
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $team_name = $_POST['team_name'];
    $team_lead_id = $_POST['team_lead'];

    // Check if the Team Lead is already assigned
    $check_sql = "SELECT * FROM teams WHERE team_lead_id = '$team_lead_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "<script>alert('This Team Lead is already assigned to a team!');</script>";
    } else {
        $sql = "INSERT INTO teams (team_name, team_lead_id) VALUES ('$team_name', '$team_lead_id')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Team created successfully!'); window.location.href='team.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Retrieve Available Team Leads
$team_leads_sql = "SELECT user_id, username FROM users WHERE role = 'Team Lead' AND user_id NOT IN (SELECT team_lead_id FROM teams)";
$team_leads_result = $conn->query($team_leads_sql);

// Retrieve Existing Teams
$teams_sql = "SELECT teams.team_id, teams.team_name, users.username AS team_lead FROM teams 
              JOIN users ON teams.team_lead_id = users.user_id";
$teams_result = $conn->query($teams_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Create Team</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Team Name</label>
                <input type="text" class="form-control" name="team_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Select Team Lead</label>
                <select class="form-select" name="team_lead" required>
                    <?php while ($row = $team_leads_result->fetch_assoc()) {
                        echo "<option value='{$row['user_id']}'>{$row['username']}</option>";
                    } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Create Team</button>
        </form>

        <h3 class="mt-5">Teams List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Team ID</th>
                    <th>Team Name</th>
                    <th>Team Lead</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $teams_result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['team_id']}</td>
                        <td>{$row['team_name']}</td>
                        <td>{$row['team_lead']}</td>
                        <td>
                            <a href='add_members.php?team_id={$row['team_id']}' class='btn btn-success btn-sm'>Add Members</a>
                        </td>
                    </tr>";
                } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
