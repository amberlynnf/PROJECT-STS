<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bucket List</title>
    {{-- CDN Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- asset : memanggil file yg ada di folder public biasanya untuk css,js atau gambar/file tambahan --}}
    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
    
    @stack('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">BUCKET LIST</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        {{-- panggil lewat path href="/path" --}}
                        <a class="nav-link {{ Route::is('welcome') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        {{-- panggil lewat name href="{{ route('name_routenya') }}" --}}
                        <a class="nav-link {{ Route::is('bucket_list') ? 'active' : '' }}" href="{{ route('bucket_list.data') }}">List</a>
                    </li>
                    <li class="nav-item">
                        {{-- panggil lewat name href="{{ route('name_routenya') }}" --}}
                        <a class="nav-link {{ Route::is('user') ? 'active' : '' }}" href="{{ route('kelola_akun.user') }}">Manage Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>   

    {{-- yield : mengisi bagian content dinamis/bagian yg akan berubah-ubah di tiap halamannya --}}
    @yield('content-dinamis')

    <footer></footer>

    {{-- CDN Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    {{-- stack : tidak wajib diisi oleh view yg extends nya (optional), kalau yield wajib diisi oleh view extends nya --}}
    @stack('script')
</body>

</html>