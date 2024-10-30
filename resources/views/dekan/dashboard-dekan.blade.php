<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISKARA Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 25%;
            background-color: #4aa3e0;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .profile {
            display: flex;
            align-items: center;
            margin-bottom: 50px;
        }

        .profile img {
            width: 60px;
            height: 60px;
            background-color: #ddd;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile h2 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .profile p {
            font-size: 12px;
        }

        .profile button {
            margin-top: 10px;
            background-color: #b3e3ff;
            color: #004680;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px 0;
            margin-bottom: 10px;
            background-color: #888;
            border-radius: 5px;
            text-align: center;
        }

        .menu a.active {
            background-color: #666;
        }

        .logout {
            background-color: white;
            color: #4aa3e0;
            border: none;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Main Content */
        .main-content {
            width: 75%;
            padding: 40px;
            background-color: #fff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 24px;
        }

        .header nav a {
            margin-left: 20px;
            color: #666;
            text-decoration: none;
        }

        .academic-year {
            background-color: #eee;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .academic-year h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .academic-year p {
            font-size: 24px;
            font-weight: bold;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .stats-card {
            background-color: #eee;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .stats-card h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .stats-card p {
            font-size: 36px;
            font-weight: bold;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #4aa3e0;
            color: white;
            position: relative;
        }

        footer p {
            margin-bottom: 10px;
        }

        footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div>
                <div class="profile">
                    <img src="img/user.png" alt="Profile Image">
                    <div>
                        <h2>Budi, S.Kom</h2>
                        <p>NIP: 123431431431415</p>
                        <button>Dekan</button>
                    </div>
                </div>
                <nav class="menu">
                    <a href="/dashboard-dekan" class="active">Dashboard</a>
                    <a href="/usulanruang">Usulan Ruang Kuliah</a>
                    <a href="/usulanjadwal">Usulan Jadwal Kuliah</a>
                    <a href="/aturgelombang">Atur Gelombang IRS</a>
                </nav>
            </div>
            <button class="logout">Logout</button>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <h1>Dashboard</h1>
                <nav>
                    <a href="/dashboard">Home</a>
                    <a href="#">About</a>
                    <a href="#">Profile</a>
                </nav>
            </header>

            <!-- Academic Year Section -->
            <section class="academic-year">
                <h2>Tahun Ajaran</h2>
                <p>2024/2025 Ganjil</p>
            </section>

            <!-- Stats Section -->
            <section class="stats-grid">
                <div class="stats-card">
                    <h2>Status Usulan Ruang Kuliah</h2>
                    <p>Menunggu Persetujuan</p>
                </div>
                <div class="stats-card">
                    <h2>Jumlah Usulan</h2>
                    <p>2</p>
                </div>
                <div class="stats-card">
                    <h2>Status Usulan Jadwal Kuliah</h2>
                    <p>Sudah Disetujui</p>
                </div>
                <div class="stats-card">
                    <h2>Jumlah Usulan</h2>
                    <p>1</p>
                </div>
            </section>
        </main>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 SISKARA</p>
        <p>Don't Forget To Follow Diponegoro University Social Media!</p>
        <div>
            <a href="#">Facebook</a>
            <a href="#">YouTube</a>
            <a href="#">Instagram</a>
        </div>
    </footer>

</body>
</html>
