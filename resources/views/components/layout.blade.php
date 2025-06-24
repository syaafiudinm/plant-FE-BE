<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Monitor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">

<!-- Navbar -->
<nav class="bg-blue-950 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <div class="text-xl font-bold tracking-wide">🌱 Plant Monitor</div>
        <div class="space-x-4">
            <a href="{{ route('detect.calibrate') }}" class="hover:text-blue-200 transition">Kalibrasi</a>
            <a href="{{ route('detect.form') }}" class="hover:text-blue-200 transition">Deteksi</a>
            <a href="{{ route('detect.history') }}" class="hover:text-blue-200 transition">Riwayat</a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="py-10 px-4 sm:px-6 lg:px-8">
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="text-center text-sm text-gray-500 py-4">
    &copy; {{ date('Y') }} Plant Monitor - Built with ❤️ by klp2
</footer>

</body>
</html>
