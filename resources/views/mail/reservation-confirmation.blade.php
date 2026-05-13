<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Confirmación</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('components.header')
    <div class="container">
        <div class="col justify-content-center">
            <div class="col">
                <h1>Confirma tu reserva</h1>
                <p>Para hacer válida tu reserva, tienes que confirmar.</p>
                <p>Fecha: {{ $booking->date }}</p>
                <p>Personas: {{ $booking->people }}</p>
                <p></p>
                <p>
                    <a href="{{ route('reserva.confirm', $booking->confirmation_token) }}">Confirmar reserva</a>
                </p>
                <p>Este enlace caduca en 1 hora.</p>
            </div>
        </div>
    </div>
    @include('components.footer')
</body>
</html>