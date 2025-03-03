<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Dashboard - WorkCollab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 280px;
            --primary-color: #2A4365;
            --secondary-color: #3182CE;
            --accent-color: #4299E1;
            --success-color: #48BB78;
            --warning-color: #ECC94B;
            --danger-color: #F56565;
            --text-primary: #2D3748;
            --text-secondary: #4A5568;
            --bg-light: #F7FAFC;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Inter', -apple-system, sans-serif;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--primary-color);
            color: white;
            z-index: 1000;
            padding-top: 1.5rem;
        }

        .sidebar-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .sidebar-link.active {
            background: var(--secondary-color);
            color: white;
            border-left: 4px solid white;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
        }

        /* Header */
        .top-header {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
            margin: -2rem -2rem 2rem -2rem;
        }

        /* Cards */
        .feature-card {
            background: white;
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
            transition: all 0.3s ease;
            cursor: pointer;
            overflow: hidden;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .card-header-custom {
            background: var(--primary-color);
            color: white;
            padding: 1rem;
            border-radius: 10px 10px 0 0;
        }

        .stat-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        /* Custom Button */
        .btn-custom {
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
        }

        /* Utilities */
        .text-primary-dark {
            color: var(--primary-color);
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }

        /* Search Bar */
        .search-bar {
            max-width: 400px;
            position: relative;
        }

        .search-bar input {
            padding-left: 2.5rem;
            border-radius: 8px;
            border: 1px solid #E2E8F0;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="px-4 mb-4">
            <h4 class="mb-0">WorkCollab</h4>
            <small class="text-white-50">HR Management Portal</small>
        </div>
        <div class="mt-4">
            <a href="#" class="sidebar-link active">
                <i class="fas fa-home me-3"></i> Dashboard
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-users me-3"></i> Employees
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-user-plus me-3"></i> Recruitment
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-chart-line me-3"></i> Analytics
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-cog me-3"></i> Settings
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Header -->
        <div class="top-header d-flex justify-content-between align-items-center">
            <div class="search-bar">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="form-control" placeholder="Search...">
            </div>
            <div class="d-flex align-items-center">
                <div class="me-4">
                    <i class="fas fa-bell text-muted"></i>
                </div>
                <div class="d-flex align-items-center">
                    <img src="/api/placeholder/40/40" class="rounded-circle me-2" alt="Profile">
                    <div>
                        <small class="text-muted d-block">Welcome back,</small>
                        <span class="fw-medium">HR Admin</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="stat-card p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <h3 class="h2 mb-1">124</h3>
                            <span class="text-muted">Total Employees</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div>
                            <h3 class="h2 mb-1">12</h3>
                            <span class="text-muted">Active Teams</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div>
                            <h3 class="h2 mb-1">28</h3>
                            <span class="text-muted">Active Projects</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-danger bg-opacity-10 text-danger me-3">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div>
                            <h3 class="h2 mb-1">87%</h3>
                            <span class="text-muted">Completion Rate</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Actions -->
        <h5 class="mb-4">Quick Actions</h5>
        <div class="row g-4">
            <!-- User Creation -->
            <div class="col-md-6 col-xl-3">
                <div class="feature-card h-100">
                    <div class="card-header-custom">
                        <i class="fas fa-user-plus mb-2"></i>
                        <h5 class="mb-0">Create User</h5>
                    </div>
                    <div class="p-4">
                        <p class="text-muted mb-4">Add new employees to the system with role assignments</p>
                        <a href="user_creation.php" class="btn btn-primary btn-custom w-100">

                            Create New User
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            

            <!-- Team Creation -->
            <div class="col-md-6 col-xl-3">
                <div class="feature-card h-100">
                    <div class="card-header-custom bg-success">
                        <i class="fas fa-users mb-2"></i>
                        <h5 class="mb-0">Team Creation</h5>
                    </div>
                    <div class="p-4">
                        <p class="text-muted mb-4">Form new teams and manage team structures</p>
                        <a href="team_creation.php" class="btn btn-success btn-custom w-100">
                    
                            Create New Team
                            <i class="fas fa-arrow-right ms-2"></i>
                       
                    </a>
                    </div>
                </div>
            </div>

            <!-- Team Performance -->
            <div class="col-md-6 col-xl-3">
                <div class="feature-card h-100">
                    <div class="card-header-custom bg-warning">
                        <i class="fas fa-chart-line mb-2"></i>
                        <h5 class="mb-0">Team Performance</h5>
                    </div>
                    <div class="p-4">
                        <p class="text-muted mb-4">Track and analyze team metrics and KPIs</p>
                        <button class="btn btn-warning btn-custom w-100 text-white">
                            View Analytics
                            <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Individual Performance -->
            <div class="col-md-6 col-xl-3">
                <div class="feature-card h-100">
                    <div class="card-header-custom bg-info">
                        <i class="fas fa-user-check mb-2"></i>
                        <h5 class="mb-0">Individual Performance</h5>
                    </div>
                    <div class="p-4">
                        <p class="text-muted mb-4">Monitor individual employee progress</p>
                        <button class="btn btn-info btn-custom w-100 text-white">
                            View Details
                            <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>