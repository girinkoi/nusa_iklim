<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nusa Iklim Dashboard')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons untuk logo/ikon menu -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
        }
        /* Styling Sidebar dengan Background Gradient */
        #sidebar {
            min-height: 100vh;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #1b4d8e 0%, #3a7bd5 50%, #4facfe 100%);
            color: #fff;
            transition: all 0.3s;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Membuat bagian akun terdorong ke bawah */
        }
        #sidebar .sidebar-top {
            flex-grow: 1;
        }
        #sidebar .sidebar-header {
            padding: 20px 15px;
            background: rgba(0, 0, 0, 0.1);
            font-size: 1.15rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        #sidebar ul.components {
            padding: 15px 0;
        }
        /* Membuat tombol/menu sidebar lebih kecil, rapi, dan elegan */
        #sidebar ul li a {
            padding: 8px 15px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: 0.2s;
            border-radius: 6px;
            margin: 4px 12px;
        }
        #sidebar ul li a:hover, #sidebar ul li.active a {
            color: #fff;
            background: rgba(255, 255, 255, 0.15);
        }
        
        /* Styling Dummy Account di Bawah Sidebar */
        .sidebar-footer {
            padding: 15px;
            background: rgba(0, 0, 0, 0.15);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sidebar-footer .avatar {
            width: 40px;
            height: 40px;
            background-color: #3b82f6;
            color: #fff;
            font-weight: bold;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            flex-shrink: 0;
        }
        .sidebar-footer .user-info {
            overflow: hidden;
        }
        .sidebar-footer .user-name {
            font-size: 0.9rem;
            font-weight: bold;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .sidebar-footer .user-location {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.7);
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Styling Konten Utama menyesuaikan lebar sidebar (220px) */
        #content {
            margin-left: 220px;
            width: calc(100% - 220px);
            padding: 30px;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <nav id="sidebar">
        <div class="sidebar-top">
            <div class="sidebar-header">
                <i class="bi bi-cloud-sun-fill fs-4"></i> Nusa Iklim
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="/"><i class="bi bi-house-door"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="bi bi-map"></i> Peta Dan Rute</a>
                </li>
                <li>
                    <a href="#"><i class="bi bi-graph-up-arrow"></i> Prakiraan</a>
                </li>
                <li>
                    <a href="#"><i class="bi bi-file-earmark-text"></i> Laporan</a>
                </li>
            </ul>
        </div>

        <!-- DUMMY ACCOUNT (Paling Bawah) -->
        <div class="sidebar-footer">
            <div class="avatar">
                MH
            </div>
            <div class="user-info">
                <p class="user-name">muhammad hijri</p>
                <p class="user-location">bekasi, Indonesia</p>
            </div>
        </div>
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