<?php
session_start();
require 'include/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Prepare and execute query to get user data
    $stmt = $conn->prepare("SELECT u.user_id, u.username, u.email, u.role, u.password, 
                           CASE 
                               WHEN u.role = 'Team Lead' THEN t.team_id 
                               WHEN u.role = 'Team Member' THEN tm.team_id 
                               ELSE NULL 
                           END as team_id 
                           FROM users u 
                           LEFT JOIN teams t ON u.user_id = t.team_lead_id 
                           LEFT JOIN team_members tm ON u.user_id = tm.user_id 
                           WHERE u.email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            
            // Set team_id for Team Lead and Team Member
            if (($user['role'] === 'Team Lead' || $user['role'] === 'Team Member') && !is_null($user['team_id'])) {
                $_SESSION['team_id'] = $user['team_id'];
            }

            // Redirect based on role
            switch ($user['role']) {
                case 'HR':
                    header('Location: hr.php');
                    break;
                case 'Manager':
                    header('Location: manager.php');
                    break;
                case 'Team Lead':
                    header('Location: team_lead.php');
                    break;
                case 'Team Member':
                    header('Location: team_member.php');
                    break;
                default:
                    $_SESSION['error'] = 'Invalid role assigned';
                    header('Location: login.php');
                    break;
            }
            exit();
        } else {
            $_SESSION['error'] = 'Invalid password';
        }
    } else {
        $_SESSION['error'] = 'Email not found';
    }

    $stmt->close();
    header('Location: login.php');
    exit();
}
?>