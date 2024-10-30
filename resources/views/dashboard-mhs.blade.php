<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .sidebar {
      height: 100vh;
      background-color: #4F9AC3;
      color: white;
    }
    .profile-img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
    }
    .nav-link {
      color: black;
    }
    .academic-card {
      background-color: #3366FF;
      color: white;
    }
    footer {
      text-align: center;
      padding: 20px;
      background-color: #53BAF3;
      color: white;
    }
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom" style="background-color: #53BAF3;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">SISKARA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3">
        <div class="text-center">
          <img src="profile.jpg" alt="Profile" class="profile-img mb-3">
          <h2>Budi Setiawan</h2>
          <p>NIM 24060122100102</p>
          <button class="btn btn-light btn-sm w-100 mb-2">Mahasiswa</button>
          <button class="btn btn-outline-light btn-sm w-100">Logout</button>
        </div>
        <ul class="nav flex-column mt-4">
          <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Her Registrasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pengisian IRS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">IRS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">KHS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Transkrip</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Konsultasi</a>
          </li>
        </ul>
      </nav>

      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- Status Akademik -->
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Status Akademik</h3>
                <p>Dosen Wali: Adit Saputra, S.Kom, M.Kom (NIP: 122341431414143415)</p>
                <p>Semester Akademik Sekarang: 2024/2025 Ganjil</p>
                <p>Semester Studi: 4</p>
                <p>Status: -</p>
            </div>
            <div class="col-md-6">
                <h3>Prestasi Akademik</h3>
                <div class="row">
                    <div class="col-md-6">
                      <h3>IPK</h3>
                      <p class="display-5">3.81</p>
                    </div>
                    <div class="col-md-6">
                      <h3>SKSk</h3>
                      <p class="display-5">85</p>
                    </div>
                  </div>
            </div>
        </div>

        <!-- Informasi Perubahan Jadwal -->
        <div class="mt-4">
          <h3>Informasi Perubahan Jadwal Mata Kuliah</h3>
          <table class="table table-bordered mt-2">
            <thead>
              <tr>
                <th>No</th>
                <th>Mata Kuliah</th>
                <th>Pertemuan</th>
                <th>Jadwal Pengganti</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Teori Bahasa dan Otomata</td>
                <td>2</td>
                <td>Jumat, 30 Agustus 2024, 15:30 - 18:50, A103</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Jadwal Kuliah -->
        <div class="mt-4">
          <h3>Jadwal Kuliah - September 2024</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Senin</th>
                <th>Selasa</th>
                <th>Rabu</th>
                <th>Kamis</th>
                <th>Jumat</th>
                <th>Sabtu</th>
                <th>Minggu</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>13:00 Teori Bah...</td>
                <td>09:40 Pembelaj...</td>
                <td>09:40 Pembelaj...</td>
                <td>15:40 Komputas...</td>
                <td>07:00 Sistem In...</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>13:00 Teori Bah...</td>
                <td>09:40 Pembelaj...</td>
                <td>09:40 Pembelaj...</td>
                <td>15:40 Komputas...</td>
                <td>07:00 Sistem In...</td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <footer>
    <p>©2024 SISKARA - Don't Forget To Follow Diponegoro University Social Media!</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
