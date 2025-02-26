<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar dengan Ikon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .sidebar {
            background-color: black;
            /* Warna latar sidebar */
            padding: 15px;
            /* Jarak dalam sidebar */
            height: 100vh;
            /* Tinggi sidebar penuh (100% viewport height) */
            width: 250px;
            /* Lebar sidebar */
        }

        .nav {
            list-style: none;
            padding: 0;
        }

        .nav-item {
            margin: 10px 0;
        }

        .nav-link {
            color: white;
            /* Warna teks putih */
            text-decoration: none;
            /* Menghilangkan garis bawah */
            display: flex;
            /* Membuat ikon dan teks sejajar */
            align-items: center;
            /* Menengahkan teks dan ikon */
            padding: 10px;
            /* Ruang dalam setiap menu */
            border-radius: 5px;
            /* Membuat sudut menu sedikit melengkung */
            transition: 0.3s;
            /* Efek transisi saat hover */
        }

        .nav-link:hover {
            background-color: #333;
        }

        .menu-icon {
            font-size: 20px;
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <nav class="sidebar sidebar-offcanvas">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fa-solid fa-tachometer-alt menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fa-solid fa-user-shield menu-icon"></i>
                    <span class="menu-title">Akun Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="akun_mall.php">
                    <i class="fa-solid fa-store menu-icon"></i>
                    <span class="menu-title">Akun Mall</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="jadwal_film.php">
                    <i class="fa-solid fa-film menu-icon"></i>
                    <span class="menu-title">Jadwal Film</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_film.php">
                    <i class="fa-solid fa-video menu-icon"></i>
                    <span class="menu-title">Data Film</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="history.php">
                    <i class="fa-solid fa-receipt menu-icon"></i>
                    <span class="menu-title">History Pembelian</span>
                </a>
            </li>
        </ul>
    </nav>

</body>

</html>