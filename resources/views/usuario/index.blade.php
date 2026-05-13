<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bar Restaurante Palacios</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include("components.header")
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-6 align-self-center">
                    <h3>Tus reservas</h3>
                    @if ($bookings->isNotEmpty())
                        @foreach ($bookings as $booking)
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="mb-1"><strong>Fecha:</strong> {{ $booking->date }}</p>
                                <p class="mb-0"><strong>Tipo:</strong> {{ $booking->type }}</p>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>No tienes reservas todavia.</p>
                    @endif
                    @foreach ($allBookings as $book)
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="mb-1"><strong>Fecha:</strong> {{ $book->date }}</p>
                                <p class="mb-0"><strong>Tipo:</strong> {{ $book->type }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    @include('components.footer')
</body>
</html>
