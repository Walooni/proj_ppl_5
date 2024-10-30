<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Gelombang IRS</title>
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
            flex: 1; /* Membuat container menyesuaikan tinggi halaman */
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
        /* Popup Modal */
        /* Tambahkan CSS untuk Modal Tanggal Pergantian */
        .modal-edit {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            display: none; /* Tersembunyi awalnya */
        }

        .modal-edit-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
        }

        .modal-edit h2 {
            margin-bottom: 20px;
        }

        .modal-edit input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .modal-edit button {
            padding: 10px 20px;
            background-color: #4aa3e0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-edit button:hover {
            background-color: #367bb3;
        }

        .button-blue {
            background-color: #0000FF;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }

        .button-green {
            background-color: #00ff00;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }

        form {
            margin-bottom: 30px;
        }

        form label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        form input, form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4aa3e0;
            color: white;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .edit-button {
            background-color: #4aa3e0;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 12px;
        }

        .delete-button {
            background-color: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 12px;
        }

        .save-button, .reset-button {
            padding: 10px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .save-button {
            background-color: #00ff00;
        }

        .reset-button {
            background-color: red;
            color: white;
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
                    <a href="/dashboard-dekan">Dashboard</a>
                    <a href="/usulanruang">Usulan Ruang Kuliah</a>
                    <a href="/usulanjadwal">Usulan Jadwal Kuliah</a>
                    <a href="/aturgelombang" class="active">Atur Gelombang IRS</a>
                </nav>
            </div>
            <button class="logout">Logout</button>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Form Content -->
            <div class="form-content" id="form-content">
                <h1>Atur Gelombang IRS</h1>
                <a href="#" class="button-blue">Tambah</a>

                <h3>Ganjil 2024/2025</h3>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Pergantian Gelombang</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2024/2025 Ganjil</td>
                            <td>2/7/2024</td>
                            <td>19/7/2024</td>
                            <td>11/8/2024</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="edit-button" data-id="1">Edit</a>
                                    <a href="#" class="delete-button">Batalkan</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2023/2024 Genap</td>
                            <td>31/12/2023</td>
                            <td>13/1/2024</td>
                            <td>21/1/2024</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="edit-button" data-id="2">Selesai</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>


    <!-- Modal untuk Mengatur Tanggal Pergantian -->
    <div class="modal-edit" id="editModal">
        <div class="modal-edit-content">
            <h2>Atur Tanggal Pergantian Gelombang</h2>
            <input type="date" id="editTanggalPergantian">
            <button id="saveEditBtn">Simpan</button>
        </div>
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

    <script>
        // Show modal on page load
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('yearModal');
            const continueBtn = document.getElementById('continueBtn');
            const selectTahunAjaran = document.getElementById('tahunAjaran');
            const formContent = document.getElementById('form-content');

            continueBtn.addEventListener('click', function () {
                const selectedYear = selectTahunAjaran.value;
                if (selectedYear) {
                    // Hide modal and show form content
                    modal.style.display = 'none';
                    formContent.classList.add('active');
                    document.body.classList.remove('modal-active');
                } else {
                    alert('Silakan pilih tahun ajaran terlebih dahulu!');
                }
            });

            // Edit Button Click Logic
            const editModal = document.getElementById('editModal');
            const editButtons = document.querySelectorAll('.edit-button');
            const saveEditBtn = document.getElementById('saveEditBtn');
            let currentRowId = null;

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    currentRowId = this.getAttribute('data-id');
                    editModal.style.display = 'flex';
                });
            });

            // Save the edited date
            saveEditBtn.addEventListener('click', function () {
                const editedDate = document.getElementById('editTanggalPergantian').value;
                if (editedDate) {
                    alert('Tanggal pergantian untuk row ID ' + currentRowId + ' disimpan: ' + editedDate);
                    editModal.style.display = 'none';
                } else {
                    alert('Silakan pilih tanggal terlebih dahulu!');
                }
            });
        });
    </script>



</body>
</html>
