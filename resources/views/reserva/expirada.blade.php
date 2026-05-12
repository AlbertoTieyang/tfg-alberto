<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expirada</title>
</head>
<body>
    @include('components.header')
    <h1>Se ha expirado el tiempo de confirmación, se ha cancelado la reserva</h1>
    <p><a href="{{ route('cuenta') }}">Volver a mi cuenta</a></p>
    @include('components.footer')
</body>
</html>