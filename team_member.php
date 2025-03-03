<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Member Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #2c3e50;
        }

        .sidebar {
            background-color: #ffffff;
            height: calc(100vh - 56px);
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .nav-link {
            color: #34495e;
            padding: 0.8rem 1rem;
            transition: all 0.3s;
        }

        .nav-link:hover {
            background-color: #3498db;
            color: white;
        }

        .nav-link.active {
            background-color: #3498db;
            color: white;
        }

        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .team-member-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .status-online {
            background-color: #2ecc71;
        }

        .status-busy {
            background-color: #e74c3c;
        }

        .status-away {
            background-color: #f1c40f;
        }
    </style>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TeamCollab</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 d-none d-lg-block sidebar p-0">
                <div class="nav flex-column">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-users me-2"></i> Team Members
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-tasks me-2"></i> My Tasks
                    </a>
                    <a href="member_meeting.php" class="nav-link">
                        <i class="fas fa-calendar me-2"></i> View Meetings
                    </a>
                    <a href="discussion_page.php" class="nav-link">
                        <i class="fas fa-comments me-2"></i> Discussions
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-share-alt me-2"></i> File Share
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 col-12 p-4">
                <h2 class="mb-4">Team Members</h2>
                <div class="row g-4">
                    <!-- Team Member Card 1 -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <img src="/api/placeholder/100/100" alt="Team Member" class="team-member-img mb-3">
                                <h5 class="card-title">John Doe</h5>
                                <p class="card-text text-muted">Senior Developer</p>
                                <span class="status-indicator status-online"></span>
                                <small>Online</small>
                                <div class="mt-3">
                                    <button class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-envelope"></i> Message
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-user"></i> Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member Card 2 -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <img src="/api/placeholder/100/100" alt="Team Member" class="team-member-img mb-3">
                                <h5 class="card-title">Jane Smith</h5>
                                <p class="card-text text-muted">UI/UX Designer</p>
                                <span class="status-indicator status-busy"></span>
                                <small>In a meeting</small>
                                <div class="mt-3">
                                    <button class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-envelope"></i> Message
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-user"></i> Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member Card 3 -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <img src="/api/placeholder/100/100" alt="Team Member" class="team-member-img mb-3">
                                <h5 class="card-title">Mike Johnson</h5>
                                <p class="card-text text-muted">Project Manager</p>
                                <span class="status-indicator status-away"></span>
                                <small>Away</small>
                                <div class="mt-3">
                                    <button class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-envelope"></i> Message
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-user"></i> Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>