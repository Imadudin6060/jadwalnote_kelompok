<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>JadwalNote | Aplikasi Catatan & Jadwal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <nav class="flex justify-between items-center p-6 bg-blue-600 text-white shadow">
        <h1 class="text-2xl font-bold">JadwalNote</h1>
        <div>
            <a href="{{ route('login') }}" class="mr-4 hover:underline">Login</a>
            <a href="{{ route('register') }}" class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-100 transition">Register</a>
        </div>
    </nav>

    <!-- Hero -->
    <section class="text-center py-20 px-6 bg-gradient-to-r from-blue-100 to-white">
        <h2 class="text-4xl font-extrabold mb-4 text-blue-700">Atur Jadwal & Catatanmu Lebih Mudah</h2>
        <p class="text-lg mb-6 text-gray-600">Aplikasi digital yang bantu kamu tetap produktif dan terorganisir.</p>
        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">Mulai Sekarang</a>
    </section>

    <!-- Fitur -->
    <section class="py-12 px-6 text-center">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-2">Buat Jadwal</h3>
                <p class="text-gray-500">Tentukan waktu dan kegiatanmu dengan mudah.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-2">Tulis Catatan</h3>
                <p class="text-gray-500">Simpan semua ide dan keperluan kuliahmu.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-2">Akses Kapan Saja</h3>
                <p class="text-gray-500">Dari laptop atau HP, tetap produktif di mana pun.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-6 bg-gray-100 text-gray-500 text-sm">
        © 2025 JadwalNote. All rights reserved.
    </footer>

</body>
</html>
