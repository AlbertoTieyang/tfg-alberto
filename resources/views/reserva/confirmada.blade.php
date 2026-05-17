<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss'])
    <title>Confirmación</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('components.header')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>Reserva confirmada</h1>
                <p><a href="{{ route('cuenta') }}">Volver a mi cuenta</a></p>
            </div>
        </div>
    </div>
    @include('components.footer')
</body>
</html>