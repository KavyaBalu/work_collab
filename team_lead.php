<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Lead Portal</title>
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

        .section-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
            background: #ffffff;
        }

        .section-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .card-body {
            padding: 2rem;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #7f8c8d;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.25rem;
        }

        .card-title i {
            font-size: 1.75rem;
            padding: 10px;
            border-radius: 10px;
        }

        .card-text {
            color: #34495e;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .page-header {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 2.5rem;
            position: relative;
            padding-bottom: 1rem;
        }

        .page-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, #3498db, #2ecc71);
            border-radius: 2px;
        }

        .stats-container {
            background: linear-gradient(135deg, #3498db, #2ecc71);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            color: white;
        }

        .card-team { background: linear-gradient(45deg, #ffffff, #f8f9fa); }
        .card-meeting { background: linear-gradient(45deg, #ffffff, #fff8e1); }
        .card-discussion { background: linear-gradient(45deg, #ffffff, #e3f2fd); }
        .card-view { background: linear-gradient(45deg, #ffffff, #f5f5f5); }

        .icon-bg-blue { background-color: #e3f2fd; color: #3498db; }
        .icon-bg-green { background-color: #e8f5e9; color: #2ecc71; }
        .icon-bg-purple { background-color: #f3e5f5; color: #9c27b0; }
        .icon-bg-orange { background-color: #fff3e0; color: #ff9800; }

        .notification-dot {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 8px;
            height: 8px;
            background-color: #e74c3c;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-user-tie me-2"></i>Team Lead Portal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-bell me-1"></i>
                            <span class="notification-dot"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user me-1"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="page-header">Team Lead Dashboard</h2>

        <!-- Stats Overview -->
        <div class="stats-container mb-4">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="stat-number">12</div>
                    <div class="stat-label">Team Members</div>
                </div>
                <div class="col-md-3">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Active Projects</div>
                </div>
                <div class="col-md-3">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Pending Tasks</div>
                </div>
                <div class="col-md-3">
                    <div class="stat-number">89%</div>
                    <div class="stat-label">Team Efficiency</div>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Team Management -->
            <div class="col-md-6 col-lg-3">
                <div class="card section-card card-team">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-users icon-bg-blue"></i>
                            Team Management
                        </h5>
                        <p class="card-text">Manage team members, assign tasks, and track performance.</p>
                        <div class="d-grid">
                            <a href="team-management.html" class="btn btn-primary">
                                Access Dashboard
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Schedule Meeting -->
            <div class="col-md-6 col-lg-3">
                <div class="card section-card card-meeting">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-calendar-plus icon-bg-green"></i>
                            Schedule Meeting
                        </h5>
                        <p class="card-text">Plan and schedule team meetings and collaborative sessions.</p>
                        <div class="d-grid">
                            <a href="meeting_creation.php" class="btn btn-success">
                                Schedule Now
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Discussion -->
            <div class="col-md-6 col-lg-3">
                <div class="card section-card card-discussion">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-comments icon-bg-purple"></i>
                            Team Discussion
                        </h5>
                        <p class="card-text">Start or join team discussions and track ongoing conversations.</p>
                        <div class="d-grid">
                            <a href="discussion_page.php" class="btn btn-primary">
                                Join Discussion
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View Meetings -->
            <div class="col-md-6 col-lg-3">
                <div class="card section-card card-view">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-video icon-bg-orange"></i>
                            View Meetings
                        </h5>
                        <p class="card-text">Access scheduled meetings and past meeting records.</p>
                        <div class="d-grid">
                            <a href="view_meeting" class="btn btn-warning text-dark">
                                View Schedule
                                <i class="fas fa-arrow-right ms-2"></i>
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