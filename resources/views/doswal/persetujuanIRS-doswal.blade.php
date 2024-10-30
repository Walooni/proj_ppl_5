<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>SISKARA Dashboard Doswal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <!-- Sidebar -->
    <div class="flex">
        <aside class="w-1/5 bg-blue-500 h-screen p-4 text-white">
            <!-- profil -->
            <div class="p-3 pb-1 bg-gray-300 rounded-3xl text-center mb-6">
                <div class="w-24 h-24 mx-auto bg-gray-400 rounded-full mb-3"></div>
                <h2 class="text-lg text-black font-bold">Ucok, S.Kom</h2>
                <p class="text-xs text-gray-800">NIP 123456789</p>
                <p class="text-sm bg-blue-600 rounded-full px-3 py-1 mt-2">Dosen</p>
                <button class="text-sm w-full bg-red-700 py-1 rounded-full mb-4 mt-2">Logout</button>
            </div>
            <nav class="space-y-4">
                <a href="{{ url('/dashboard-doswal') }}" class="flex items-center space-x-2 p-2 bg-gray-300 rounded-xl text-gray-700">
                    <span>Dashboard</span>
                </a>
                <a href="{{ url('/persetujuanIRS-doswal') }}" class="flex items-center space-x-2 p-2 bg-gray-700 rounded-xl text-white">
                    <span>Persetujuan IRS</span>
                </a>
                <a href="{{ url('/rekap-doswal') }}" class="flex items-center space-x-2 p-2 bg-gray-300 rounded-xl text-gray-700">
                    <span>Rekap Mahasiswa</span>
                </a>
                <a href="{{ url('/nilai-doswal') }}" class="flex items-center space-x-2 p-2 bg-gray-300 rounded-xl text-gray-700">
                    <span>Nilai</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="w-3/4 p-8">
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
                    <p class="text-2xl font-semibold">2024/2025 Ganjil</p>
                </div>
            </div>

            
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-700 text-white text-center p-4">
        <p>&copy;2024 SISKARA</p>
        <div class="flex justify-center space-x-4 mt-2">
            <a href="#" class="text-white">Facebook</a>
            <a href="#" class="text-white">Instagram</a>
            <a href="#" class="text-white">Twitter</a>
        </div>
    </footer>

</body>

</html>