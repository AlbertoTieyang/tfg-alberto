<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss'])
    <title>Bar Restaurante Palacios</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include("components.header")
    @if(session('trespasser'))
        <div class="alert alert-warning">
            {{ session('trespasser') }}
        </div>
    @endif
    <main class="flex-grow-1">
        <h1 class="text-center bg-danger">Bar Restaurante Palacios</h1>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-center">Vísitanos en Federico Mayo 34</h3>
                </div>
            </div>
            <div class="row">
                    <div class="col-7">
                        <iframe src="https://share.google/r02iOyVWoJxP6xjBt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                <div class="col-3 text-start align-self-center">
                    <p>Visítanos en la calle de Federico Mayo, 34, Bajo Restaurante</p>
                </div>
            </div>
        </div>
    </main>
    @include("components.footer")
</body>

</html>