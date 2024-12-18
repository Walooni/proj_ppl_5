<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>SISKARA Dashboard Doswal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
       .flex-container {
            display: flex;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .sidebar {
            width: 250px;
            transition: all 0.3s ease;
            background-color: #0284c7;
            color: white;
            overflow: hidden;
            
        }
        .sidebar-open {
            width: 250px;
            transition: width 0.75s ease; /* Lebih lambat saat dibuka */
        }

        .sidebar-closed {
            width: 0;
            padding: 0;
            transform: translateX(-100%); 
            transition: width 1s ease;
        }

        .main-content {
            flex: 1;
            padding: 2rem;
            background-color: #f3f4f6;
            transition: margin 0.3s ease;
            /* margin-left: 0; Default tanpa sidebar */
        }

        .toggle-btn {
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    @php
    $menus = [
        (object) [
            "title" => "Dasboard",
            "path" => "dashboard-doswal",
        ],
        (object) [
            "title" => "Persetujuan IRS",
            "path" => "persetujuanIRS-doswal",
        ],
        (object) [
            "title" => "Rekap Mahasiswa",
            "path" => "rekap-doswal",
        ],

    ];
@endphp

    <!-- Header -->
    <header class="bg-gradient-to-r from-sky-500 to-blue-600 text-white p-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <!-- Tombol menu untuk membuka sidebar -->
            <button onclick="toggleSidebar()" class="toogle-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <!-- Logo dan judul aplikasi -->
            <h1 class="text-xl font-bold">SISKARA</h1>
        </div>
        <nav class="space-x-4">
            <a href="{{ url('/') }}" class="hover:underline">Home</a>
            <a href="{{ url('/about') }}" class="hover:underline">About</a>
        </nav>
    </header>

    <div class="flex-container">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar p-4 bg-sky-500 text-white">
            <!-- profil -->
            <div class="p-3 pb-1 bg-gray-300 rounded-3xl text-center mb-6">
                <div class="w-24 h-24 mx-auto bg-gray-400 rounded-full mb-3 bg-center bg-contain bg-no-repeat"
                     style="background-image: url({{asset('img/fsm.jpg')}})">
                </div>
                <h2 class="text-lg text-black font-bold">{{$dosen->nama}}</h2>
                <p class="text-xs text-gray-800">NIDN {{$dosen->nidn}}</p>
                <p class="text-sm bg-sky-700 rounded-full px-3 py-1 mt-2 font-semibold">Dosen</p>
                <a href="{{ route('login') }}" class="text-sm w-full bg-red-700 py-1 rounded-full mb-4 mt-2 text-center block font-semibold hover:bg-opacity-70">Logout</a>
            </div>
            <nav class="space-y-4">
                @foreach ($menus as $menu)
                <a href="{{ url($menu->path) }}"
                   class="flex items-center space-x-2 p-2 {{ Str::startsWith(request()->path(), $menu->path) ? 'bg-sky-800 rounded-xl text-white hover:bg-opacity-70' : 'bg-gray-300 rounded-xl text-gray-700 hover:bg-gray-700 hover:text-white' }}">
                    <span>{{$menu->title}}</span>
                </a>
                @endforeach
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-5xl font-bold">Persetujuan IRS</h1>
                <div class="relative">
                    <!-- search bar -->
                    <input type="text" placeholder="Search"
                           class="pl-4 pr-10 py-2 rounded-full bg-gray-200 text-gray-700 focus:outline-none">
                    <svg class="absolute right-3 top-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M12.9 14.32A8 8 0 112 8a8 8 0 0110.9 6.32l5.4 5.38-1.5 1.5-5.4-5.38zM8 14a6 6 0 100-12 6 6 0 000 12z"
                              clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>

            <!-- Year Info -->
            <div class="mb-6">
                <div class="p-4 bg-gray-200 rounded-lg text-gray-700">
                    <p class="text-lg">Tahun Ajaran</p>
                    {{-- <p class="text-2xl font-semibold">{{$tahun->tahun_ajaran}}</p> --}}
                    <p class="text-2xl font-semibold">Semester Ganjil 2024/2025</p>
                </div>
            </div>

            <!-- Info Waktu -->
            <div class="mb-6">
                <div class="flex gap-3 p-2 w-max text-center bg-gray-200 rounded-lg text-gray-700">
                    <p class="text-lg">Status Pengisian IRS: </p>
                    <p id="time-status" class="text-lg font-semibold"></p>
                </div>
            </div>

            <!-- Tabel Persetujuan -->
            <div class="container overflow-y-auto h-2/3">
                <table class="table-auto min-w-full bg-white border border-gray-200">
                    <!-- Table Header (sticky) -->
                    <thead class="bg-gray-300 sticky top-0">
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 text-center text-sm font-semibold text-gray-700">
                                No
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-center text-sm font-semibold text-gray-700">
                                Nama
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-center text-sm font-semibold text-gray-700">
                                NIM
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-center text-sm font-semibold text-gray-700">
                                Semester
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-center text-sm font-semibold text-gray-700">
                                Aksi
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-center text-sm font-semibold text-gray-700">
                                Keterangan
                            </th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        <!-- Row-->
                        @foreach ($mhs_filter as $mahasiswa)
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-800 text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-800 text-center">{{ $mahasiswa->nama }}</td>
                            <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-600 text-center">{{ $mahasiswa->nim }}</td>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-600 text-center">{{ $mahasiswa->semester }}</td>
                            {{-- <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-600 text-center">
                                <div class="inline-flex">
                                    <form action="{{ route('irs.approve', $mahasiswa->nim) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="text-white bg-sky-500 hover:bg-sky-700 active:bg-sky-400 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">
                                            Setuju
                                        </button>
                                    </form>
                                    <form action="{{ route('irs.izin', $mahasiswa->nim) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                        class="text-white bg-amber-400 hover:bg-yellow-600 active:bg-yellow-400 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">
                                        Izinkan Ubah IRS</button>
                                    </form>
                                </div>
                            </td> --}}
                            <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-600 text-center">
                                <div class="inline-flex">
                                    <form action="{{ route('irs.approve', $mahasiswa->nim) }}" method="POST" id="approve-form-{{$mahasiswa->nim}}">
                                        @csrf
                                        <button type="submit" id="approve-btn-{{$mahasiswa->nim}}"
                                            class="text-white bg-sky-500 hover:bg-sky-700 active:bg-sky-400 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">
                                            Setuju
                                        </button>
                                    </form>
                                    <form action="{{ route('irs.izin', $mahasiswa->nim) }}" method="POST" id="izin-form-{{$mahasiswa->nim}}">
                                        @csrf
                                        <button type="submit" id="izin-btn-{{$mahasiswa->nim}}"
                                            class="text-white bg-amber-400 hover:bg-yellow-600 active:bg-yellow-400 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">
                                            Izinkan Ubah IRS
                                        </button>
                                    </form>
                                </div>
                            </td>

                            <td class="px-6 py-4 border-b border-gray-200 text-center text-sm">
                                <a href="{{ route('rekap-doswal.informasi-irs-fromPersetujuan', ['nim' => $mahasiswa->nim]) }}" class="font-medium text-blue-600 dark:text-blue-700 hover:underline">
                                    Lihat IRS
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @if (session('success'))
                        <div id="irs-setuju-notification" class="bg-green-100 border border-green-400 text-green-700 mb-4 px-4 py-3 rounded relative">
                        {{ session('success') }}
                        </div>
                        {{-- <div id="irs-izin-notification" class="bg-green-100 border border-green-400 text-green-700 mb-4 px-4 py-3 rounded relative">
                        {{ session('success') }}
                        </div> --}}

                        @endif

                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-sky-500 to-blue-600 text-white text-center p-4 absolute w-full">
        <hr>
        <p class="text-sm text-center">&copy; Siskara Inc. All rights reserved.</p>
    </footer>

    <!-- Script untuk toggle sidebar -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
    
            // Toggle class sidebar-open dan sidebar-closed
            if (sidebar.classList.contains('sidebar-closed')) {
                sidebar.classList.remove('sidebar-closed');
                sidebar.classList.add('sidebar-open');
            } else {
                sidebar.classList.remove('sidebar-open');
                sidebar.classList.add('sidebar-closed');
            }
    
            // Main content menyesuaikan
            mainContent.classList.toggle('full');
        }

        document.addEventListener('DOMContentLoaded', function () {
        const setuju = document.getElementById('irs-setuju-notification');

        if (setuju) {
            setTimeout(() => {
                setuju.style.display = 'none';
            }, 3000); // Hilangkan pesan setelah 3 detik
        }
        });

        // Time Config
        let serverDate = new Date('2025-01-30')

        let fillingStartDate = new Date('2024-11-01')
        let fillingEndDate = new Date('2024-12-17')

        let twoWeeksAfterEnd = new Date(fillingEndDate.getTime() + (14*24*60*60*1000))
        let fourWeeksAfterEnd = new Date(fillingEndDate.getTime() + (28*24*60*60*1000))

        document.addEventListener('DOMContentLoaded', function () {
            // const serverDate = new Date();
            // const fillingEndDate = new Date('2024-12-17'); // Tanggal terakhir pengisian IRS
            // const fourWeeksAfterEnd = new Date(fillingEndDate.getTime() + (28 * 24 * 60 * 60 * 1000)); // 4 minggu setelah tanggal terakhir

            // Menghitung selisih waktu dalam milidetik
            const timeDiff = fillingEndDate - serverDate; // Hasil dalam milidetik
            const diffDays = Math.floor(timeDiff / (1000 * 60 * 60 * 24)); // Menghitung hari tersisa atau terlewat

            // Memperbarui status di UI
            const timeStatus = document.getElementById('time-status');
            if (diffDays > 0) {
                timeStatus.textContent = `${diffDays} hari tersisa`;
            } else if (diffDays < 0) {
                timeStatus.textContent = `${Math.abs(diffDays)} hari terlewat`;
            } else {
                timeStatus.textContent = 'Hari ini adalah hari terakhir pengisian IRS';
            }

            // Jika lebih dari 4 minggu setelah batas tanggal, disable tombol
            if (serverDate > fourWeeksAfterEnd) {
                const approveBtns = document.querySelectorAll('[id^="approve-btn-"]');
                const izinBtns = document.querySelectorAll('[id^="izin-btn-"]');

                approveBtns.forEach(button => {
                    button.disabled = true;  // Disable tombol Setuju
                    button.classList.add('opacity-50');  // Ubah warnanya menjadi pudar
                    button.classList.remove('hover:bg-sky-700');
                });

                izinBtns.forEach(button => {
                    button.disabled = true;  // Disable tombol Izinkan Ubah IRS
                    button.classList.add('opacity-50');  // Ubah warnanya menjadi pudar
                    button.classList.remove('hover:bg-yellow-600');
                });

                timeStatus.textContent = 'Periode telah berakhir silahkan kembali lagi di semester berikutnya';
            }
        });

    </script>

</body>

</html>
