<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Expirada</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('components.header')
    <div class="container">
        <idv class="row justify-content-center">
            <div class="col-6">
                <h1>Se ha expirado el tiempo de confirmación, se ha cancelado la reserva</h1>
                <p><a href="{{ route('cuenta') }}">Volver a mi cuenta</a></p>
            </div>
        </idv>
    </div>
    @include('components.footer')
</body>
</html>