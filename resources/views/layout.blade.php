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
        /* Styling Sidebar dengan Background Gradient */
        #sidebar {
            min-height: 100vh;
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            /* Efek gradasi warna biru dari atas ke bawah */
            background: linear-gradient(180deg, #1b4d8e 0%, #3a7bd5 50%, #4facfe 100%);
            color: #fff;
            transition: all 0.3s;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
        }
        #sidebar .sidebar-header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.1); /* Sedikit transparan agar menyatu dengan gradient */
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
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: 0.2s;
        }
        #sidebar ul li a:hover, #sidebar ul li.active a {
            color: #fff;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            margin: 0 10px;
        }
        /* Styling Konten Utama */
        #content {
            margin-left: 260px;
            width: calc(100% - 260px); /* Diperbaiki tanda minusnya */
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
                <a href="#">Peta Dan Rute</a>
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