<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #2c3e50;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
        }

        .nav-link {
            color: #ffffff;
            padding: 15px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: #3498db !important;
        }

        .nav-link i {
            margin-right: 10px;
        }

        .section-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
        }

        .section-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            font-size: 1.5rem;
        }

        .card-text {
            color: #34495e;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .notification-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #e74c3c;
            border-radius: 50%;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        .page-header {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 1rem;
        }

        .page-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 4px;
            background-color: #3498db;
            border-radius: 2px;
        }

        /* Custom card colors */
        .card-project { border-top: 4px solid #3498db; }
        .card-team { border-top: 4px solid #2ecc71; }
        .card-discussion { border-top: 4px solid #9b59b6; }
        .card-file { border-top: 4px solid #f1c40f; }
        .card-verification { border-top: 4px solid #e74c3c; }
        .card-reports { border-top: 4px solid #34495e; }

        /* Loading animation */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .loading {
            animation: pulse 1.5s infinite;
        }
    </style>
</head>
<body>
    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-cube me-2"></i>Manager Portal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-bell"></i> Notifications
                            <span class="notification-badge">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="page-header">Management Dashboard</h2>
        
        <div class="row g-4">
            <!-- Project Management -->
            <div class="col-md-6 col-lg-4">
                <div class="card section-card card-project">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-project-diagram text-primary"></i>
                            Project Management
                        </h5>
                        <p class="card-text">Track and manage all ongoing projects. Monitor progress, assign resources, and ensure timely delivery.</p>
                        <div class="d-grid">
                            <a href="projects.html" class="btn btn-primary">
                                <i class="fas fa-arrow-right me-2"></i>Go to Projects
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Management -->
            <div class="col-md-6 col-lg-4">
                <div class="card section-card card-team">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-users text-success"></i>
                            Team Management
                        </h5>
                        <p class="card-text">Oversee team performance, manage assignments, and coordinate team activities effectively.</p>
                        <div class="d-grid">
                            <a href="teams.html" class="btn btn-success">
                                <i class="fas fa-arrow-right me-2"></i>Go to Teams
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--view meeting -->
            <div class="col-md-6 col-lg-3">
                <div class="card section-card card-view">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-video icon-bg-orange"></i>
                            View Meetings
                        </h5>
                        <p class="card-text">Access scheduled meetings and past meeting records.</p>
                        <div class="d-grid">
                            <a href="manager_meeting.php" class="btn btn-warning text-dark">
                                View Schedule
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Discussions -->
            <div class="col-md-6 col-lg-4">
                <div class="card section-card card-discussion">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-comments" style="color: #9b59b6"></i>
                            Team Discussions
                        </h5>
                        <p class="card-text">Join and moderate team discussions. Foster collaboration and problem-solving.</p>
                        <div class="d-grid">
                            <a href="discussions.html" class="btn btn-primary" style="background-color: #9b59b6; border-color: #9b59b6;">
                                <i class="fas fa-arrow-right me-2"></i>View Discussions
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- File Center -->
            <div class="col-md-6 col-lg-4">
                <div class="card section-card card-file">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-file-alt text-warning"></i>
                            File Center
                        </h5>
                        <p class="card-text">Centralized file management system. Access, share, and maintain project documentation.</p>
                        <div class="d-grid">
                            <a href="files.html" class="btn btn-warning text-dark">
                                <i class="fas fa-arrow-right me-2"></i>Open File Center
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Verification -->
            <div class="col-md-6 col-lg-4">
                <div class="card section-card card-verification">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-check-circle text-danger"></i>
                            Project Verification
                        </h5>
                        <p class="card-text">Review and verify completed projects. Ensure quality standards are met.</p>
                        <div class="d-grid">
                            <a href="verification.html" class="btn btn-danger">
                                <i class="fas fa-arrow-right me-2"></i>Go to Verification
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reports -->
            <div class="col-md-6 col-lg-4">
                <div class="card section-card card-reports">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-chart-bar text-secondary"></i>
                            Reports & Analytics
                        </h5>
                        <p class="card-text">Generate comprehensive reports and analyze team performance metrics.</p>
                        <div class="d-grid">
                            <a href="reports.html" class="btn btn-secondary">
                                <i class="fas fa-arrow-right me-2"></i>View Reports
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>