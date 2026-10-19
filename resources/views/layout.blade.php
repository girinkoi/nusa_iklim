<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nusa Iklim Dashboard')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
        }
        /* Styling Sidebar */
        #sidebar {
            min-height: 100vh;
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #212529;
            color: #fff;
            transition: all 0.3s;
        }
        #sidebar .sidebar-header {
            padding: 20px;
            background: #1a1d20;
            font-size: 1.25rem;
            font-weight: bold;
        }
        #sidebar ul.components {
            padding: 20px 0;
        }
        #sidebar ul li a {
            padding: 10px 20px;
            font-size: 1.1rem;
            display: block;
            color: #adb5bd;
            text-decoration: none;
            transition: 0.2s;
        }
        #sidebar ul li a:hover, #sidebar ul li.active a {
            color: #fff;
            background: #343a40;
        }
        /* Styling Konten Utama supaya geser ke kanan menyesuaikan sidebar */
        #content {
            margin-left: 260px;
            width: calc(100% - 260px);
            padding: 30px;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <nav id="sidebar">
        <div class="sidebar-header">
            🌱 Nusa Iklim
        </div>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="/">Dashboard</a>
            </li>
            <li>
                <a href="#">Peta Dan Rute </a>
            </li>
            <li>
                <a href="#">Prakiraan</a>
            </li>
            <li>
                <a href="#">Laporan</a>
            </li>
        </ul>
    </nav>

    <!-- KONTEN UTAMA -->
    <div id="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>