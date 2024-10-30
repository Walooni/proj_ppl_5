<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SISKARA - Isian Rencana Semester (IRS)</title>
  <style>
    /* Resetting some default styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
    }

    .container {
      display: flex;
    }

    /* Sidebar styling */
    .sidebar {
      background-color: #3a86ff;
      color: white;
      width: 250px;
      height: 100vh;
      padding: 20px;
      position: fixed;
      transition: transform 0.3s ease;
    }

    .sidebar.hidden {
      transform: translateX(-100%);
    }

    .sidebar h2 {
      font-size: 24px;
      margin-bottom: 40px;
    }

    .sidebar {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 40px;
    }

    .profile {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      margin-bottom: 30px;
    }

    .profile-pic {
      width: 70px;
      height: 70px;
      background-color: #cfcfcf;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    .profile-info h3 {
      margin-bottom: 5px;
    }

    .role {
      background-color: #6ca0ff;
      padding: 5px 10px;
      border-radius: 15px;
      font-size: 12px;
    }

    .logout {
      background-color: #ffffff;
      color: #4285f4;
      border: none;
      padding: 8px 16px;
      border-radius: 20px;
      cursor: pointer;
      margin-top: 15px;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar ul li {
      margin: 20px 0;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: white;
      font-size: 16px;
      display: block;
      padding: 10px;
      border-radius: 5px;
    }

    .sidebar ul li a.active,
    .sidebar ul li a:hover {
      background-color: #3278cc;
    }

    /* Content styling */
    .content {
      margin-left: 270px;
      padding: 40px;
      width: 100%;
      transition: margin-left 0.3s ease;
    }

    .content.expanded {
      margin-left: 70px;
    }

    .content h1 {
      font-size: 28px;
      color: #333;
      margin-bottom: 20px;
    }

    .semester-card {
      background-color: #f1f1f1;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 18px;
    }

    .semester-card button {
      padding: 8px 16px;
      background-color: #3a86ff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .footer {
      background-color: #3a86ff;
      color: white;
      text-align: center;
      padding: 10px;
      position: fixed;
      bottom: 0;
      width: 100%;
      left: 0;
    }

    /* Modal styling */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      width: 80%;
      max-width: 800px;
    }

    .close-btn, .print-btn {
      background-color: #3a86ff;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      float: right;
    }

    /* Toggle button for sidebar */
    .toggle-btn {
      position: fixed;
      top: 20px;
      left: 20px;
      font-size: 24px;
      cursor: pointer;
      z-index: 1000;
    }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
</head>
<body>

<div class="container">
  <!-- Sidebar -->
  <div class="sidebar hidden" id="sidebar">
    <h2>SISKARA</h2>
    <div class="profile">
      <div class="profile-pic"></div>
      <div class="profile-info">
        <h3>Budi Setiawan</h3>
        <p>NIM 24060122100102</p>
        <p class="role">Mahasiswa</p>
      </div>
      <button class="logout">Logout</button>
    </div>
    <ul>
      <li><a href="#">Dashboard</a></li>
      {{-- <li><a href="#">Her Registrasi</a></li> --}}
      <li><a href="pengisianirs-mhs">Pengisian IRS</a></li>
      <li><a href="#" class="active">IRS</a></li>
      {{-- <li><a href="#">KHS</a></li>
      <li><a href="#">Transkrip</a></li>
      <li><a href="#">Konsultasi</a></li> --}}
    </ul>
  </div>

  <!-- Content -->
  <div class="content expanded" id="content">
    <span class="toggle-btn" onclick="toggleSidebar()">&#9776;</span>
    <h1>Isian Rencana Semester (IRS)</h1>
    <div class="semester-card">
      <p>Semester 4 <br> Tahun Ajaran 2023/2024 Genap</p>
      <button onclick="showModal()">Lihat Detail IRS</button>
    </div>
  </div>
</div>

<!-- Modal for IRS Detail -->
<div class="modal" id="modal">
  <div class="modal-content">
    <button class="close-btn" onclick="closeModal()">Tutup</button>
    <h2>Isian Rencana Semester 4</h2>
    <table border="1" width="100%" cellpadding="10" cellspacing="0">
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Mata Kuliah</th>
        <th>Waktu</th>
        <th>Kelas</th>
        <th>SKS</th>
        <th>Ruang</th>
        <th>Status</th>
        <th>Nama Dosen</th>
      </tr>
      <tr>
        <td>1</td>
        <td>PAIK6401</td>
        <td>Pemrograman Berorientasi Objek</td>
        <td>Selasa, 13:00-15:30</td>
        <td>D</td>
        <td>3</td>
        <td>E101</td>
        <td>Baru</td>
        <td>Dr. Budi Prasetyo, S.T., M.T.</td>
      </tr>
      <!-- Tambahkan baris lainnya sesuai dengan gambar -->
    </table>
    <button class="print-btn" onclick="printPDF()">Cetak IRS</button>
  </div>
</div>

<!-- Footer -->
<div class="footer">
  <p>&copy;2024 SISKARA</p>
  <p>Don’t Forget To Follow Diponegoro University Social Media!</p>
</div>

<script>
  function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const content = document.getElementById("content");
    sidebar.classList.toggle("hidden");
    content.classList.toggle("expanded");
  }

  function showModal() {
    document.getElementById("modal").style.display = "flex";
  }

  function closeModal() {
    document.getElementById("modal").style.display = "none";
  }

  function printPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Tambahkan header PDF
    doc.setFontSize(12);
    doc.text("Semester 4", 10, 10);
    doc.text("Tahun Ajaran 2023/2024 Genap", 10, 16);
    doc.text("Jumlah SKS: 21", 160, 10, null, null, "right");
    doc.setLineWidth(0.5);
    doc.line(10, 21, 200, 21); // Garis horizontal di bawah judul
    
    doc.setFontSize(10);
    doc.text("Nama: Zikry Alfahri", 10, 26);
    doc.text("NIM: 24060122100102", 10, 32);
    doc.text("Status: Belum Disetujui Pembimbing Akademik", 10, 38);

    // Tambahkan judul untuk tabel
    doc.setFontSize(12);
    doc.text("Isian Rencana Semester 4", 10, 46);
    

    // Gunakan autoTable untuk memasukkan tabel
    doc.autoTable({
      startY: 52,
      html: ".modal-content table", // pastikan ini merujuk ke tabel dalam modal
      styles: { fontSize: 10 }
    });

    // Simpan PDF
    doc.save("IRS_Semester_4.pdf");
  }
</script>

</body>
</html>
