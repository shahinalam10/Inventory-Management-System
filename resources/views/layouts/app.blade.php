<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
        }

        /* Sidebar styles with refined gradient and colors */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            background: linear-gradient(145deg, #1e3c72, #2a5298); /* Professional gradient */
            color: #ecf0f1;
            padding-top: 30px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, width 0.3s ease;
            z-index: 1000;
        }

        .sidebar .nav-item {
            width: 100%;
        }

        .sidebar .nav-link {
            color: #dcdde1;
            font-size: 17px;
            padding: 12px 25px;
            display: flex;
            align-items: center;
           
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: #213549;
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: rgb(19, 18, 18);
            color: #fff;
            font-weight: 600;
        }

        .sidebar .nav-link i {
            margin-right: 15px;
            font-size: 22px;
            color: #00f7d4; /* Highlighted icon color */
        }

        .sidebar .nav-link.active i {
            color: #ffffff; /* White icon for active links */
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        /* Mobile Responsiveness */
        @media (max-width: 992px) {
            .sidebar {
                width: 240px;
                transform: translateX(-260px);
            }

            .content {
                margin-left: 0;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .sidebar-toggle-btn {
                display: block;
                position: fixed;
                top: 20px;
                left: 20px;
                background-color: #3498db;
                color: white;
                border: none;
                padding: 10px;
                font-size: 20px;
                border-radius: 50%;
                cursor: pointer;
                z-index: 1100;
            }
        }

        @media (min-width: 993px) {
            .sidebar-toggle-btn {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}">
                    <i class="bi bi-house-door"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('brands.index') }}">
                    <i class="bi bi-box"></i> Brand
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('models.index') }}">
                    <i class="bi bi-gear"></i> Model
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('items.index') }}">
                    <i class="bi bi-clipboard-data"></i> Item
                </a>
            </li>
        </ul>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Sidebar Toggle Button -->
        <button class="sidebar-toggle-btn" id="toggleSidebarBtn">&#9776;</button>
        
        <div class="container">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
        const sidebar = document.querySelector('.sidebar');

        toggleSidebarBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 992) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>
</html>
