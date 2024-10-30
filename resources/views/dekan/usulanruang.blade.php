<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usulan Ruang Kuliah</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            flex: 1;
        }

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

        .content h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .usulan-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .usulan {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .usulan-left {
            display: flex;
            gap: 20px;
        }

        .usulan-right {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .usulan-right button {
            background: none;
            border: none;
            cursor: pointer;
        }

        .usulan-right button.edit {
            color: red;
        }

        .usulan-right button.apply {
            color: blue;
        }

        .usulan-status {
            display: flex;
            align-items: center;
            gap: 10px;
            color: gray;
        }

        .approved {
            color: green;
        }

        .pending {
            color: gray;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #4aa3e0;
            color: white;
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
                    <a href="/dashboard-dekan">Dashboard</a>
                    <a href="/usulanruang" class="active">Usulan Ruang Kuliah</a>
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
                <h1>Usulan Ruang Kuliah</h1>
                <nav>
                    <a href="/dashboard-dekan">Home</a>
                    <a href="#">About</a>
                    <a href="#">Profile</a>
                </nav>
            </header>

            <div class="usulan-container">
                <!-- Usulan Semester Genap -->
                <div class="usulan">
                    <div class="usulan-left">
                        <h3>Genap 2023/2024</h3>
                    </div>
                    <div class="usulan-right">
                        <button>👁 Lihat</button>
                        <button>✗ Batalkan</button>
                        <div class="usulan-status approved">✓ Sudah disetujui</div>
                    </div>
                </div>

                <!-- Usulan Semester Ganjil -->
                <div class="usulan">
                    <div class="usulan-left">
                        <h3>Ganjil 2024/2025</h3>
                    </div>
                    <div class="usulan-right">
                        <button>👁 Lihat</button>
                        <button class="edit">✓ Setujui</button>
                        <button class="apply">✗ Tolak</button>
                        <div class="usulan-status pending">⏳ Menunggu Persetujuan</div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <footer>
        <p>©2024 SISKARA</p>
        <p>Don't Forget To Follow Diponegoro University Social Media!</p>
        <a href="#">Facebook</a>
        <a href="#">YouTube</a>
        <a href="#">Instagram</a>
    </footer>
</body>
</html>
